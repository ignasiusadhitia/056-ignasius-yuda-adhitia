@props(['id', 'name', 'value' => '', 'label'])

<div class="field-wrapper">
    <label for="{{ $id }}">{{ $label }}</label>
    <input type="text" id="{{ $id }}" name="{{ $name }}" value="{{ old($name, $value) }}">
</div>
