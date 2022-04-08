<?php

declare(strict_types=1);

namespace App\Http\Livewire\Admin\SentEmails;

use App\Http\Livewire\Base;
use App\Models\SentEmail;
use DateTime;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Livewire\WithPagination;
use Maatwebsite\Excel\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

use function abort_if_cannot;
use function now;
use function view;

class SentEmails extends Base
{
    use WithPagination;

    public $paginate   = '';
    public $to         = '';
    public $cc         = '';
    public $bcc        = '';
    public $subject    = '';
    public $created_at = '';
    public $emailKeys  = null;
    public $openFilter = false;

    public function mount(): void
    {
        parent::mount();

        $email           = SentEmail::orderby('id', 'desc')->first();
        $this->emailKeys = $email;
    }

    public function render(): View
    {
        abort_if_cannot('view_sent_emails');

        return view('livewire.admin.sent-emails.index');
    }

    public function builder()
    {
        return SentEmail::orderBy('id', 'desc');
    }

    public function emails()
    {
        $query = $this->builder();

        if ($this->to) {
            $query->where('to', 'like', '%'.$this->to.'%');
        }

        if ($this->cc) {
            $query->where('cc', 'like', '%'.$this->cc.'%');
        }

        if ($this->bcc) {
            $query->where('bcc', 'like', '%'.$this->bcc.'%');
        }

        if ($this->subject) {
            $query->where('subject', 'like', '%'.$this->subject.'%');
        }

        if ($this->created_at) {
            $this->openFilter = true;
            $parts            = explode(' to ', $this->created_at);
            if (isset($parts[1])) {
                $from = Carbon::parse($parts[0])->format('Y-m-d');
                $to   = Carbon::parse($parts[1])->format('Y-m-d');
                $query->whereBetween('created_at', [$from, $to]);
            }
        }

        return $query->paginate($this->paginate);
    }

    public function export($format, DateTime $timestamp = null): bool|BinaryFileResponse
    {
        $params = [
            'to'         => $this->to,
            'created_at' => $this->created_at
        ];

        if ($timestamp === null) {
            $timestamp = now();
        }

        if ($format === 'xlsx') {
            return (new SentEmailsExport($params))->download("sent-emails-".$timestamp->format('d-m-Y-h-i-s').".xlsx");
        }

        if ($format === 'csv') {
            return (new SentEmailsExport($params))->download("sent-emails-".$timestamp->format('d-m-Y-h-i-s').".csv",
                Excel::CSV);
        }

        if ($format === 'pdf') {
            return (new SentEmailsExport($params))->download("sent-emails-".$timestamp->format('d-m-Y-h-i-s').".pdf",
                Excel::DOMPDF);
        }

        return true;
    }

    public function view(int $id): void
    {
        $email           = SentEmail::findOrFail($id);
        $this->emailKeys = $email;
    }
}
