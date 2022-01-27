@if (count($breadcrumbs))
    <a class="{{ config('laravel-components.views-namespace')."-breadcrumbs-previous-link ".config('laravel-components.default-classes.layouts.breadcrumbs.previous-link') }}" href="{{ url()->previous() }}">Back</a>
    <span class="{{ config('laravel-components.views-namespace')."-breadcrumbs-previous-chevron-container ".config('laravel-components.default-classes.layouts.breadcrumbs.previous-chevron-container') }}">
        <i class="{{ config('laravel-components.views-namespace')."-breadcrumbs-previous-chevron-item ".config('laravel-components.default-classes.layouts.breadcrumbs.previous-chevron-item') }}"></i>
    </span>
    @foreach ($breadcrumbs as $breadcrumb)
        @if (!$loop->last)
            <a class="{{ config('laravel-components.views-namespace')."-breadcrumbs-breadcrumb-link ".config('laravel-components.default-classes.layouts.breadcrumbs.breadcrumb-link') }}" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
            <span class="{{ config('laravel-components.views-namespace')."-breadcrumbs-breadcrumb-chevron-container ".config('laravel-components.default-classes.layouts.breadcrumbs.breadcrumb-chevron-container') }}">
                <i class="{{ config('laravel-components.views-namespace')."-breadcrumbs-breadcrumb-chevron-item ".config('laravel-components.default-classes.layouts.breadcrumbs.breadcrumb-chevron-item') }}"></i>
            </span>
        @else
            <a class="{{ config('laravel-components.views-namespace')."-breadcrumbs-breadcrumb-link ".config('laravel-components.default-classes.layouts.breadcrumbs.breadcrumb-link') }}" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
        @endif
    @endforeach
@endif
