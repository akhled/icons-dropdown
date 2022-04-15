@if ($showLabel && $showField)
    @if ($options['wrapper'] !== false)
        <div {!! $options['wrapperAttrs'] !!}>
    @endif
@endif

@if ($showLabel && $options['label'] !== false && $options['label_show'])
    {!! Form::customLabel($name, $options['label'], $options['label_attr']) !!}
@endif

@if ($showField)
    @php
        // $emptyVal = $options['empty_value'] ? ['' => $options['empty_value']] : null;
    @endphp

    @livewire('icons-dropdown')
    {{-- @include(helpBlockPath()) --}}
@endif

{{-- @include(errorBlockPath()) --}}

@if ($showLabel && $showField)
    @if ($options['wrapper'] !== false)
        </div>
    @endif
@endif
