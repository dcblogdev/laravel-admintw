@props([
    'data' => [],
    'required' => '',
    'name' => '',
    'id' => '',
    'placeholder' => '',
    'label' => ''
])

@if ($label === 'none')

@elseif ($label === '')
    @php
        //remove underscores from name
        $label = str_replace('_', ' ', $name);
        //detect subsequent letters starting with a capital
        $label = preg_split('/(?=[A-Z])/', $label);
        //display capital words with a space
        $label = implode(' ', $label);
        //uppercase first letter and lower the rest of a word
        $label = ucwords(strtolower($label));
    @endphp
@endif

<div class="mb-5">
    @if ($label !='none')
        <label for='{{ $name }}' class='block mb-2 font-bold text-sm mb-2 text-gray-600 dark:text-gray-200'>{{ $label }} @if ($required != '') <span aria-hidden="true" class="error">*</span>@endif</label>
    @endif
    <select
        name='{{ $name }}'
        id='{{ $name }}'
        {{ $required }}
        {{ $attributes->merge([
            'class' => implode(' ', [
                'block w-full bg-white dark:bg-gray-500 dark:text-gray-200 dark:placeholder-gray-200 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm',
                $errors->has($name) ? 'border-red-500' : 'border-gray-300',
            ])
        ]) }}
        @if(isset($errors))
            @error($name)
                aria-invalid="true"
                aria-description="{{ $message }}"
            @enderror
        @endif
        {{ $attributes }}
    >
        @if ($placeholder != '')
           <option value=''>{{ $placeholder }}</option>
        @endif
        @if (count($data) > 0)
            @foreach($data as $item)
                <option value="{{ $item['id'] }}">{{ $item['value'] }}</option>
            @endforeach
        @endif
        {{ $slot }}
    </select>
    @error($name)
        <p class="error" aria-live="assertive">{{ $message }}</p>
    @enderror
</div>
