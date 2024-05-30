@props(['id', 'name', 'label', 'options' => [], 'selected' => null, 'error' => null])

@php
    $selectedOption = collect($options)->firstWhere('value', old($name, $selected));
@endphp

<div class="field-wrapper">
    @if ($label)
        <label for="{{ $id }}">{{ $label }}</label>
    @endif
    <div class="select-wrapper">
        <div class="select" id="{{ $id }}" tabindex="0">
            <div class="select-trigger">
                <span>{{ $selectedOption['label'] ?? 'Select an option' }}</span>
            </div>
            <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
            </svg>
            <div class="options">
                @foreach ($options as $option)
                    <span class="option" data-value="{{ $option['value'] }}"
                        {{ $option['value'] == old($name, $selected) ? 'selected' : '' }}>
                        {{ $option['label'] }}
                    </span>
                @endforeach
            </div>
        </div>
        <input type="hidden" name="{{ $name }}" value="{{ old($name, $selected) }}">
    </div>
    @if ($error)
        <p class="error">{{ $error }}</p>
    @endif
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const select = document.getElementById('{{ $id }}');
            const options = select.querySelectorAll('.option');

            select.addEventListener('click', function() {
                select.classList.toggle('open');
            });

            options.forEach(option => {
                option.addEventListener('click', function() {
                    const value = option.getAttribute('data-value');
                    const label = option.textContent;
                    select.querySelector('.select-trigger span').textContent = label;
                    select.querySelector('input[type="hidden"]').value = value;
                    select.classList.remove('open');
                });
            });

            // Client-side validation
            const hiddenInput = select.querySelector('input[type="hidden"]');
            const errorMessage = '{{ $label }} is required';

            select.addEventListener('focusout', function() {
                if (!hiddenInput.value) {
                    select.classList.add('error');
                    select.insertAdjacentHTML('beforeend', `<p class="error">${errorMessage}</p>`);
                } else {
                    select.classList.remove('error');
                    const error = select.querySelector('.error');
                    if (error) {
                        error.remove();
                    }
                }
            });
        });
    </script>
@endpush
