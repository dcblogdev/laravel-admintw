@props([
    'level'    => 0,
    'data'     => null,
    'wireName' => null,
    'id'       => 'id',
    'label'    => 'title'
])
<input type="checkbox" wire:model.live="{{ $wireName.'.'.$data->$id }}" value="{{ $data->$id }}">@if ($level > 0) {!! str_repeat("&nbsp;&nbsp;", $level) !!} @endif {{ $data->$label }}<br>
@foreach ($data->children as $child)
    <x-form.checkbox-row :data="$child" :level="$level+1" :id="$id" :label="$label" :wireName="$wireName"/>
@endforeach
