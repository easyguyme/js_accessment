@extends('layouts.app')
@section('main')
    <!-- Filter Component -->
    <x-website.candidate.candidate-filter  :new_candidates="$new_candidates"  :categories="$categories" :visas="$visas" />
<div class="candidate-content">
    <div class="container">
        <div class="row">
            <div class="" id="togglclass1">

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane  show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        @if ($new_candidates->count() > 0)
                            <div class="row">
                                @foreach ($new_candidates as $candidate)
                                    <div
                                        class="@if (request('location') || request('age') || request('experience') || request('visas')) col-md-6 fade-in-bottom  condition_class rt-mb-24 @else col-md-6 fade-in-bottom  condition_class rt-mb-24 col-xl-4 @endif">
                                        <a href="{{route('website.candidate.details',$candidate->jobseeker_id)}}"
                                           class="card jobcardStyle1 body-24 ">
                                            <div class="card-body">
                                                <div class="rt-single-icon-box icb-clmn-lg tw-reltaive">
                                                    <div class="icon-thumb tw-relative">
                                                        <div class="profile-image">
                                                            <img src="{{ asset('assets/images/default.png') }}" alt="{{ __('candidate_image') }}">
                                                        </div>
                                                        <div class="tw-absolute tw-top-0 tw-left-1">

                                                            <div class="tw-inline-flex">
                                                                <svg width="14" height="14" viewBox="0 0 14 14"
                                                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="7" cy="7" r="6"
                                                                            fill="#2ecc71" stroke="white" stroke-width="2">
                                                                    </circle>
                                                                </svg>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="iconbox-content !tw-m-0">
                                                        <div class="job-mini-title">

                                                        <span>
                                                            {{ $candidate->full_name }}
                                                        </span>

                                                        </div>
                                                        <span class="loacton text-gray-500 ">
                                                    {{ $candidate->location}}
                                                </span>
                                                        @if($candidate->desired_salary_cleaned!="")
                                                            <span class="body-font-4 mt-1 text-gray-900 d-block">
                                                         SGD {{ $candidate->desired_salary_cleaned}}
                                                    </span>
                                                        @else
                                                            <span class="body-font-4 mt-1 text-gray-900 d-block">
                                                         Not disclosed
                                                    </span>
                                                        @endif

                                                        <div class="bottom-link mt-1">

                                                        <span class="body-font-4 text-primary-500">{{ __('View Profile') }}
                                                            <x-svg.arrow-right-icon />
                                                        </span>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="col-md-12">
                                <div class="card text-center">
                                    <x-not-found message="{{ __('No data found!') }}" />
                                </div>
                            </div>
                        @endif

                        @if (request('perpage') != 'all' && $new_candidates->total() > $new_candidates->count())
                            <div class="rt-pt-30">
                                <nav>
                                    {{ $new_candidates->links('vendor.pagination.frontend') }}
                                </nav>
                            </div>
                        @endif
                    </div>
                    <!-- For List -->

                    <x-website.candidate.candidate-view-list :candidates="$new_candidates" />
                </div>
            </div>
        </div>
    </div>

</div>
    <div class="rt-spacer-100 rt-spacer-md-50"></div>



    {{-- Candidate Filter Modal --}}
    <x-website.modals.candidate-filters-modal :visas="$visas" />

@endsection

@section('script')
    <script>
        // filter function
        function Filter() {
            $('#form').submit();
        }
        // sorting
        $('#sortby').on('change', function() {
            $('#form').submit();
        })
        // perpage
        $('#perpage').on('change', function() {
            $('#form').submit();
        })
        // filter close
        function FilterClose(name) {
            $('[name="' + name + '"]').val('');
            $('#form').submit();
        }



        // capitalize
        function capitalizeFirstLetter(string) {
            return string[0].toUpperCase() + string.slice(1);
        }
        //tooltip
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        //  skilss select2 design
        $('#skills').select2({
            theme: 'bootstrap4',
            tags: true,
            placeholder: 'Select Skill'
        });

    </script>
@endsection
