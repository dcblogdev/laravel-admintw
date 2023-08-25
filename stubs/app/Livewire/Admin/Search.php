<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use Livewire\Component;

class Search extends Component
{
    public string $query = '';

    public array $models = [];

    public array $searchResults = [];

    public function render()
    {
        $this->searchResults = [];

        if (strlen($this->query) > 2) {
            foreach ($this->models as $model) {
                $query = new $model();
                $fields = $query->getModel()->searchable;
                $fields = implode(',', $fields);
                $search = str_replace('@', '', $this->query);
                $results = $query->selectRaw('*, MATCH ('.$fields.') AGAINST (? IN BOOLEAN MODE)', ['*'.$search.'*'])
                    ->whereRaw('MATCH ('.$fields.') AGAINST (? IN BOOLEAN MODE)', ['*'.$search.'*'])
                    ->take(10)
                    ->get();

                foreach ($results as $result) {
                    $this->searchResults[] = [
                        'label' => $result[$query->getModel()->label],
                        'route' => $query->getModel()->route($result->id),
                        'section' => $result->section,
                    ];
                }
            }
        }

        return view('livewire.admin.search');
    }
}
