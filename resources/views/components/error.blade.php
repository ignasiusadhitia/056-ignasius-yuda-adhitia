@props(['field'])

@error($field)
    <div class="error-message">
        <span>{{ $message }}</span>
    </div>
@enderror

<style>
    .error-message {
        color: red;
        font-size: 0.875rem;
    }
</style>
