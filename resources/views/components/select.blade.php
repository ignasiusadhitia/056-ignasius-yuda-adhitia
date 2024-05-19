<div class="field-wrapper">
    <label for="{{ $id }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $id }}" required>
        @foreach ($options as $option)
            <option value="{{ $option->id }}" @if ($selectedValue === $option->id) selected @endif>{{ $option->name }}
            </option>
        @endforeach
    </select>
</div>
