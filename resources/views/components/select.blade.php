@props(['id', 'name', 'label', 'options' => []])

<div class="field-wrapper">
    <label for="{{ $id }}">{{ $label }}</label>
    <select id="{{ $id }}" name="{{ $name }}">
        @foreach ($options as $option)
            <option value="{{ $option['value'] }}" {{ $option['selected'] ? 'selected' : '' }}>
                {{ $option['label'] }}
            </option>
        @endforeach
    </select>
</div>
