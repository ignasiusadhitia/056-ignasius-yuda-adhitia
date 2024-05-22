@props(['id', 'name', 'label', 'required' => false, 'options' => []])

<div class="field-wrapper">
    <label for="{{ $id }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $id }}" {{ $required ? 'required' : '' }}>
        @foreach ($options as $option)
            <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
        @endforeach
    </select>
</div>
