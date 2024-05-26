@props(['field'])

@error($field)
    <div class="error-message">
        <span>{{ $message }}</span>
    </div>
@enderror
