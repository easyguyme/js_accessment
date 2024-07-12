@props(['categories','visas'])

<form id="candidate_search_form" action="{{ route('website.candidate') }}" method="GET">
    <div class="breadcrumbs style-two">
        <div class="container">
            <div class="row align-items-center ">
                <div class="col-12 position-relative">
                    <div class="breadcrumb-menu">
                        <h6 class="f-size-18 m-0">{{ __('Find candidates') }}</h6>
                        <ul>
                            <li><a href="{{ route('website.candidate') }}">{{ __('Home') }}</a></li>
                            <li>/</li>
                            <li>{{ __('candidates') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="jobsearchBox tw-my-6 bg-gray-10 input-transparent height-auto-lg">
                <div class="top-content d-flex flex-column flex-lg-row align-items-center leaflet-map-results">
                    <div class="flex-grow-1 flex-grow-1 fromGroup has-icon banner-select">
                        <select class="rt-selectactive candidate-profession" name="profession">
                            <option value="" class="d-none">{{ __('Select Category') }}</option>
                            @foreach ($categories as $profession)
                                <option {{ $profession->id == request('profession') ? 'selected' : '' }}
                                    value="{{ $profession->id }}">
                                    {{ $profession->title }}
                                </option>
                            @endforeach
                        </select>
                        <div class="icon-badge category-icon">
                            <x-svg.layer-icon stroke="var(--primary-500)" width="24" height="24" />
                        </div>
                    </div>


                    <input type="hidden" name="location" id="location" value="">



                        <div class="inputbox_2 flex-grow-1 fromGroup has-icon">
                            <input type="text" id="leaflet_search" placeholder="{{ __('Enter location') }}"
                                name="location" value="{{ request('location') }}" class="tw-border-0"
                                autocomplete="off" />

                            <div class="icon-badge">

                            </div>
                        </div>

                    <div class="tw-flex tw-flex-wrap tw-gap-3 tw-items-center">
                        <div>
                            <button type="button"
                                class="btn tw-inline-flex gap-3 tw-items-center hover:tw-bg-[#F1F2F4] tw-bg-[#F1F2F4] hover:tw-text-[#18191C] tw-text-[#18191C] tw-border-0"
                                data-bs-toggle="modal" data-bs-target="#candidateFiltersModal">
                                <span class="">
                                    <x-svg.filters-icon />
                                </span>
                                <span>{{ __('Filter') }}</span>
                            </button>
                        </div>
                        <div class="flex-grow-0">
                            <button
                                class="btn btn-primary d-block d-md-inline-block ">{{ __('Search Candidates') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tw-flex tw-flex-wrap tw-items-center tw-gap-2 tw-mb-6 tw-mx-1.5 sm:tw-mx-0">
                        <p class="tw-text-[#767F8C] tw-text-sm tw-mb-0">{{ __('Popular Profession') }}:</p>
                        <ul class="tw-popular-search tw-flex-wrap">
                            @if (is_string(request('profession')))
                                <input type="hidden" value="{{ request('profession') }}" name="profession">
                            @endif
                            @foreach ($categories->take(10) as $profession)
                                <li onclick="professionFilter('{{ $profession->title }}')" class="tw-text-bold">
                                    <a href="#">{{ $profession->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-12">

                    <div class="tw-flex tw-justify-between tw-items-center tw-py-3 tw-mb-6"
                        style="border-top: 1px solid #E4E5E8; border-bottom: 1px solid #E4E5E8;">
                        <div class="tw-flex tw-gap-2 tw-items-center">
                            @if (request('keyword') ||
                                    request('location') ||
                                    request('sortby') ||
                                    request('profession') ||
                                    request('visa') ||
                                    request('age') ||
                                    request('salary') )
                                <h2 class="tw-text-sm tw-text-[#767F8C] tw-whitespace-nowrap tw-mb-0">
                                    {{ __('Active Filter') }}:</h2>
                                <div class="d-flex w-100-p">
                                    @if (Request::get('keyword'))
                                        <div class="rt-mr-2 icon-badge">
                                            <x-website.candidate.filter-data-component title="{{ __('keyword') }}"
                                                filter="{{ request('keyword') }}" />
                                        </div>
                                    @endif
                                        @if (Request::get('age'))
                                            <div class="rt-mr-2 icon-badge">
                                                <x-website.candidate.filter-data-component title="{{ __('age') }}"
                                                                                           filter="{{ request('age') }}" />
                                            </div>
                                        @endif
                                    @if (Request::get('location'))
                                        <div class="rt-mr-2 icon-badge">
                                            <x-website.candidate.filter-data-component title="{{ __('location') }}"
                                                filter="{{ request('location') }}" />
                                        </div>
                                    @endif
                                    @if (Request::get('sortby') && Request::get('sortby') != 'latest')
                                        <div class="rt-mr-2 icon-badge">
                                            <x-website.candidate.filter-data-component title="{{ __('sortby') }}"
                                                filter="{{ request('sortby') }}" />
                                        </div>
                                    @endif
                                    @if (Request::get('profession') && Request::get('profession') != null)
                                        <div class="rt-mr-2 icon-badge">
                                            <x-website.candidate.filter-data-component title="{{ __('profession') }}"
                                                filter="{{ $categories->where('id', request('profession'))->first()->title ?? '-' }}" />
                                        </div>
                                    @endif

                                        @if (Request::get('visa') && Request::get('visa') != null)
                                            <div class="rt-mr-2 icon-badge">
                                                <x-website.candidate.filter-data-component title="{{ __('visa') }}"
                                                                                           filter="{{ $visas->where('id', request('visa'))->first()->name ?? '-' }}" />
                                            </div>
                                        @endif
                                    @if (Request::get('min_salary') && Request::get('min_salary') != 'all')
                                        <div class="rt-mr-2 icon-badge">
                                            <x-website.candidate.filter-data-component title="{{ __('salary') }}"
                                                filter="{{ request('min_salary') }}" />
                                        </div>
                                    @endif
                                        @if (Request::get('max_salary') && Request::get('max_salary') != 'all')
                                            <div class="rt-mr-2 icon-badge">
                                                <x-website.candidate.filter-data-component title="{{ __('salary') }}"
                                                                                           filter="{{ request('max_salary') }}" />
                                            </div>
                                        @endif



                                </div>
                            @endif
                        </div>
                        <div class="tw-flex tw-justify-end tw-items-center">
                            <div class="joblist-fliter-gorup !tw-min-w-max">
                                <div class="right-content !tw-mt-0">
                                    <nav>
                                        <div class="nav" id="nav-tab" role="tablist">
                                            <button onclick="styleSwitch('box')" class="nav-link active "
                                                id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                                                type="button" role="tab" aria-controls="nav-home"
                                                aria-selected="true">
                                                <x-svg.box-icon />
                                            </button>
                                            <button onclick="styleSwitch('list')" class="nav-link"
                                                id="nav-profile-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-profile" type="button" role="tab"
                                                aria-controls="nav-profile" aria-selected="false">
                                                <x-svg.list-icon />
                                            </button>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</form>

@section('frontend_links')
{{--    @include('map::links')--}}

    <style>
        .candidate-profession+.select2-container--default .select2-selection--single {
            border: none !important;
        }
    </style>
@endsection

@section('frontend_scripts')


    <script>
        function professionFilter(profession) {
            console.log(profession);
            $('input[name=profession]').val(profession)
            $('#candidate_search_form').submit();
        }
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });

    </script>

@endsection
