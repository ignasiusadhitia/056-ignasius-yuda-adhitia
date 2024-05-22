@props(['id', 'name', 'label', 'options' => []])

<div class="field-wrapper">
    <label for="{{ $id }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $id }}">
        @foreach ($options as $option)
            <option value="{{ $option['value'] }}">{{ $option['label'] }}</option>
        @endforeach
    </select>
</div>
