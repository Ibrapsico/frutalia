{{-- Componente de input reutilizable --}}
@props(['name', 'label', 'type' => 'text', 'value' => null, 'required' => false])

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

    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        {{-- - UX (no tienen que volver a completar los campos otra vez de nuevo...): --}}
        value="{{ old($name, $value) }}"
        {{ $required ? 'required' : "" }}
        {{-- - Evitamos perder nuestros atributos: --}}
        {{ $attributes->merge(['class' => 'form__input']) }}
        {{-- - Accesibilidad (WCAG) --}}
        @error($name) aria-invalid="true" aria-describedby="{{ $name }}-error" @enderror
    >

    @error($name)
        {{-- - Accesibilidad (WCAG) --}}
        <div id="{{ $name }}-error" class="form__error">{{ $message }}</div>
    @enderror
</div>
