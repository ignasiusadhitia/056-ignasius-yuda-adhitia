@props(['id', 'name', 'value' => '', 'label', 'required' => false])

<div class="field-wrapper">
    <label for="{{ $id }}">{{ $label }}</label>
    <input type="text" id="{{ $id }}" name="{{ $name }}" value="{{ old($name, $value) }}"
        {{ $required ? 'required' : '' }}>
</div>
