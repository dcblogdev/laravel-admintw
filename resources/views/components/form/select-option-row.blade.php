@props([
    'level'    => 0,
    'data'     => null,
    'id'       => 'id',
    'label'    => 'title',
    'value'    => '',
    'selected' => ''
])

@php
if ($data->$id !='') {
    $value = $data->$id;
}
@endphp

<option value="{{ $value }}" @if($selected == $value) selected=selected @endif>@if ($level > 0) {!! str_repeat("&nbsp;&nbsp;", $level) !!} @endif {{ $data->$label }}</option>
@foreach ($data->children as $child)
    <x-form.select-option-row :data="$child" :level="$level+1" :id="$id" :label="$label"/>
@endforeach
