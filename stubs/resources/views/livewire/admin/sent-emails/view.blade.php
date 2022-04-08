@if (isset($emailKeys->id))
{{--<div class="flex items-center px-5 py-4 justify-between bg-gray-100 border-b">
    <div class="flex items-center">

        <button>
            <span class="leading-normal">
                <i class="fas fa-reply h-5 w-5 text-2xl fill-current text-gray-600 "></i>
            </span>
        </button>

        <button class="ml-6">
            <span class="leading-normal">
                <i class="fas fa-tag h-5 w-5 text-2xl fill-current text-gray-600 "></i>
            </span>
        </button>

        <button class="ml-6">
            <span class="leading-normal">
                <i class="far fa-user-circle h-5 w-5 text-2xl fill-current text-gray-600 "></i>
            </span>
        </button>

        <button class="ml-6">
            <span class="leading-normal">
                <i class="fas fa-file-download text-2xl fill-current text-gray-600 "></i>
            </span>
        </button>

        <button class="ml-4">
            <span class="leading-normal">
                <i class="fas fa-ellipsis-h h-5 w-5 text-2xl fill-current text-gray-600 "></i>
            </span>
        </button>

    </div>
</div>--}}

<div class="relative shadow-md">
    <div class="flex items-center justify-between px-5 py-3 bg-white">
        <div class="text-xl text-gray-900 truncate">{{ $emailKeys->subject }}</div>
        <div class="ml-4 flex-shrink-0">
            <span>#{{ $emailKeys->id }}</span>
        </div>
    </div>
</div>
<div class="p-3 flex-1 overflow-y-auto">

    <article class="px-10 pt-6 pb-8 bg-white rounded-lg shadow">
        <div class="flex items-center justify-between">
            <p class="text-lg font-semibold">
                <span class="text-gray-900 text-sm">
                    From: {{ $emailKeys->from }}<br>
                    To: {{ $emailKeys->to }}<br>
                    @if ($emailKeys->cc !='')CC: {{ $emailKeys->cc }}<br>@endif
                    @if ($emailKeys->bcc !='')BCC: {{ $emailKeys->bcc }}<br>@endif
                </span>
            </p>
            <div class="flex items-center">
                <span class="text-xs text-gray-600">{{ date('F jS Y H:i A', strtotime($emailKeys->created_at)) }}</span>
            </div>
        </div>
        <div class="mt-6 text-gray-800 text-sm">
            <iframe src="{{ route('admin.settings.sent-emails.body', ['id' => $emailKeys->id]) }}" width="100%" height="600px"></iframe>
        </div>
    </article>

</div>
@endif