@props(['type', 'id', 'name', 'value' => '', 'label', 'disabled' => false])

<div class="field-wrapper">
    <label for="{{ $id }}">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" value="{{ old($name, $value) }}"
        {{ $disabled ? 'disabled' : '' }} />
</div>
