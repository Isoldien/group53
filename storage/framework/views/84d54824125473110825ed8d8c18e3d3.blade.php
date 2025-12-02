@php
/** @var \Laravel\Boost\Install\GuidelineAssist $assist */
@endphp
## Inertia + React Forms

@if($assist->inertia()->hasFormComponent())
___BOOST_SNIPPET_0___
@endif

@if($assist->inertia()->hasFormComponent() === false)
{{-- Inertia 2.0.x, not 2.1.0 or higher. So they still need to use 'useForm' --}}
___BOOST_SNIPPET_1___
@endif
