<div class="field-wrapper">
    <label for="{{ $id }}">{{ $label }}</label>
    <input type="text" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}"
        @if ($required) required @endif>
</div>
