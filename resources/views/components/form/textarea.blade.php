{{-- Componente de textarea reutilizable --}}
@props(['name', 'label', 'value' => null, 'rows' => 3, 'required' => false])

<div class="form__group">
    @if($label)
        <label for="{{ $name }}" class="form__label">{{ $label }}
            {{-- - Accesibilidad (WCAG) --}}
            @if($required)
                {{-- - Accesibilidad (WCAG) --}}
                <abbr class="form__required" title="Campo obligatorio" aria-hidden="true">*</abbr>
            @endif
        </label>

    @endif

    <textarea 
        name="{{ $name }}" 
        id="{{ $name }}"
        rows="{{ $rows }}"
        {{ $required ? 'required' : "" }}
        {{ $attributes->merge(['class' => 'form__textarea']) }}
        {{-- - Accesibilidad (WCAG) --}}
        @error($name) aria-invalid="true" aria-describedby="{{ $name }}-error" @enderror
    >{{ old($name, $value) }}</textarea>

    @error($name)
        {{-- - Accesibilidad (WCAG) --}}
        <div id="{{ $name }}-error" class="form__error">{{ $message }}</div>
    @enderror
</div>