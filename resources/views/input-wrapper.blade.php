@aware(['label', 'id', 'name', 'inputGroup', 'help', 'required', 'error'])

<div {{ $attributes }}>
    @if ($label->hasActualContent() || ! empty(array_filter(Arr::except($label->attributes->getAttributes(), ['class']))))
    <label {{ $label->attributes->merge(['for' => $id]) }}>{{ $label }}@if($required)@include('blade-forms::snippets.required-label')@endif</label>
    @endif
    <div {{ $inputGroup->attributes }}>
        {{ $slot }}
    </div>
    <div id="{{ $id }}_feedback">
        @if ($errors->has($name) || $error)
        <div class="form-error">{{ $error ?: $errors->first($name) }}</div>
        @endif
        @if ($help->hasActualContent())
        <div {{ $help->attributes }}>{{ $help }}</div>
        @endif
    </div>
</div>
