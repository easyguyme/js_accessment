
<header class="header rt-fixed-top">
    <div class="n-header">
        <div class="n-header--top relative">

            <div class="container tw-px-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="n-header--top__left main-menu">
                        <div
                            class="mbl-top d-flex align-items-center justify-content-between container position-relative d-lg-none">
                            <div class="d-flex align-items-center">
                                <a href="{{route('website.job')}}" class="brand-logo">
                                    <img src="https://dev-jobshine.s3.ap-southeast-1.amazonaws.com/public/img/home-logo.png" alt="logo">
                                </a>
                            </div>

                            <div class="">
                                <div class="d-flex align-items-center ">
                                    <div class="search-icon d-lg-none tw-text-white">
                                        <svg id="mblSearchIcon" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M20.9999 21L16.6499 16.65" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="mblTogglesearch bg-primary-500 rounded">
                                        <form action="{{ route('website.job') }}" method="GET" id="search-form"
                                            class="shadow px-md-5 py-md-3 p-3 !tw-bg-white rounded w-sm-75 w-100">
                                            <div class="form-item">
                                                <input name="keyword" class="search-input w-100" type="text"
                                                    placeholder="{{ __('Name, Email') }}"
                                                    value="{{ request('keyword') }}" id="mobile_search_input">
                                            </div>
                                        </form>
                                    </div>



                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="#"
                                                    class="btn btn-primary text-white"
                                                    style="padding:12px 24px !important;">{{ __('Post Job') }}
                                                </a>
                                            </li>
                                        </ul>

                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="n-header--top__right d-flex align-items-center tw-px-3">

                            <div class="contact-info xs:tw-inline-flex tw-hidden">
                                <a class="text-gray-900" href="tel:+254729790289">
                                    <x-svg.telephone2-icon />
                                    +254729790289
                                </a>
                            </div>



                            <div class="dropdown xs:tw-inline-flex tw-hidden">
                                <button class="btn 0 ? 'dropdown-toggle' : '' }}"
                                    type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    SGD
                                </button>

                            </div>


                            <form action="#" method="GET" id="search-form"
                                class="mx-width-300 xs:tw-inline-flex tw-hidden">
                                <div class="d-flex">

                                    <div class="">
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle" type="button" id=""
                                                data-bs-toggle="dropdown" aria-expanded="false">

                                                    Singapore

                                            </button>


                                        </div>
                                    </div>
                                </div>
                            </form>

                    </div>
                    <div class="mobile-menu">
                        <div class="menu-click tw-pe-3">
                            <button class="effect1">
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header top -->
        <div class="n-header--bottom">
            <div class="container position-relative">
                <div class="d-flex flex-wrap  tw-gap-2 tw-items-center">
                    <div class="n-header--bottom__left d-flex align-items-center">
                        <a href="{{ route('website.job') }}" class="brand-logo">
                            <img src="https://dev-jobshine.s3.ap-southeast-1.amazonaws.com/public/img/home-logo.png" alt="logo">
                        </a>
                        <form action="{{ route('website.job') }}" method="GET" id="search-form"
                            class="mx-width-300 header-search-form d-lg-block d-none">
                            <div class="search-box">
                                <select id="headerSearch" onchange="changeSearchSelection()" class="form-select"
                                    aria-label="Default select example">
                                    <option  value="new">{{ __('New') }}</option>
                                    <option @selected(session('header_search_role') == 'existing') value="existing">{{ __('Existing') }}
                                    </option>

                                </select>
                                <div class="d-flex flex-column flex-md-row align-items-center tw-ps-3">
                                    <svg class="searcbox-searchicon" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                                            stroke="#0A65CC" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M21 20.9999L16.65 16.6499" stroke="#0A65CC" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <input name="keyword" class="search-input" type="text"
                                        placeholder="{{ __('Candidate name,email') }}" value="{{ request('keyword') }}"
                                        id="global_search">
                                </div>

                                <span id="autocomplete_job_results"></span>
                            </div>
                        </form>
                    </div>

                    <div class="n-header--bottom__right">
                        <div class="d-flex align-items-center ">
                            <div class="search-icon tw-ml-2 d-lg-none !tw-cursor-pointer">
                                <span>
                                    <svg id="searchIcon" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                                            stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M20.9999 21L16.6499 16.65" stroke="#FFFFFF" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                            <div class="togglesearch">
                                <form action="{{ route('website.job') }}" method="GET" id="search-form"
                                    class="shadow px-md-5 py-md-3 p-3 !tw-bg-white rounded w-sm-75 w-100">

                                    <div class="search-box form-item position-relative">
                                        <svg class="" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                                                stroke="#0A65CC" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M21 20.9999L16.65 16.6499" stroke="#0A65CC" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <input name="keyword" class="search-input w-100" type="text"
                                            placeholder="{{ __('job_title_keyword') }}"
                                            value="{{ request('keyword') }}" id="search_input">

                                    </div>
                                </form>
                            </div>


                                <ul class="list-unstyled tw-flex tw-flex-wrap tw-gap-3 tw-items-center tw-justify-between">
                                    <li>
                                        <a href="#"
                                            class="btn btn-outline-light">{{ __('Sign In') }}</a>
                                    </li>
                                    <li class="d-none d-sm-block">
                                        <a href="#"
                                            class="btn btn-light">{{ __('Post Job') }}
                                        </a>
                                    </li>
                                </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rt-mobile-menu-overlay"></div>
        <div class="sidebar-overlay"></div>
    </div>
</header>

@push('script')
    <script>
        function changeSearchSelection() {
            var new_search_url = "{{ route('website.job') }}";
            var past_search_url = "{{ route('website.past') }}";

            var search_selection = $("#headerSearch").val();

            if (search_selection == 'new') {
                $(".header-search-form").attr('action', new_search_url);
            } else if (search_selection == 'existing') {
                $(".header-search-form").attr('action', past_search_url);
            }
        }
    </script>
@endpush
