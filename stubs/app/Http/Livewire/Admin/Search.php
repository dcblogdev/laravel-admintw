<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Base;
use App\Models\User;
use Illuminate\Contracts\View\View;

use function add_user_log;
use function view;

class Search extends Base
{
    public string $query         = '';
    public array  $models        = [
        User::class
    ];
    public array  $searchResults = [];

    public function render(): View
    {
        $this->searchResults = [];

        if (strlen($this->query) > 2) {
            foreach ($this->models as $model) {
                $query   = new $model();
                $fields  = $query->getModel()->searchable;
                $fields  = implode(',', $fields);
                $search  = str_replace('@', '', $this->query);
                $results = $query->selectRaw('*, MATCH ('.$fields.') AGAINST (? IN BOOLEAN MODE)', ['*'.$search.'*'])
                    ->whereRaw('MATCH ('.$fields.') AGAINST (? IN BOOLEAN MODE)', ['*'.$search.'*'])
                    ->take(10)
                    ->get();

                foreach ($results as $result) {
                    $this->searchResults[] = [
                        'label'   => $result[$query->getModel()->label],
                        'route'   => $query->getModel()->route($result->id),
                        'section' => $result->section
                    ];
                }
            }

            add_user_log([
                'title'        => "Searched: ".$this->query,
                'link'         => route('admin.settings'),
                'reference_id' => auth()->id(),
                'section'      => 'Search',
                'type'         => 'Search'
            ]);
        }

        return view('livewire.admin.search');
    }
}
