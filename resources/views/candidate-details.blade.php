@extends('layouts.app')



@section('main')
    <div class="breadcrumbs breadcrumbs-height">
        <div class="container">
            <div class="breadcrumb-menu">
                <h6 class="f-size-18 m-0">{{ $candidate->full_name }}</h6>
                <ul>
                    <li><a href="{{ route('website.job') }}">{{ __('Home') }}</a></li>
                    <li>/</li>
                    <li>{{ $candidate->full_name}}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="single-page-banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="pgae-bg bgprefix-cover page-bg-radius"
                        style="background-image: url({{ asset($candidate->candidate ? $candidate->candidate->photo : $candidate->image) }});">
                    </div>
                    <div
                        class="card jobcardStyle1 hover:bg-transparent hover-shadow:none body-24 hover:border-transparent border border-gray-50">
                        <div class="card-body">
                            <div class="rt-single-icon-box flex-column flex-lg-row">
                                <div class="icon-thumb rt-mb-lg-20">
                                    <img src="{{ asset('assets/images/default.png') }}"
                                        alt="photo" draggable="false" class="object-fit-contain">
                                </div>
                                <div class="iconbox-content">
                                    <div class="post-info2">
                                        <div class="post-main-title2">
                                            <a href="{{ route('website.candidate.details', $candidate->jobseeker_id) }}">
                                                {{ $candidate->full_name }}
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="iconbox-extra align-self-start align-self-lg-center rt-pt-lg-20 flex-md-row flex-column">

                                    @if ($candidate->resume_url)
                                        <div class="max-311">
                                            <a href="{{$candidate->resume_url}}" target="_blank" class="btn btn-primary btn-lg d-block">
                                                <span class="button-content-wrapper ">
                                                    <span class="button-icon align-icon-right">
                                                        <i class="ph-cloud-arrow-down f-size-24"></i>
                                                    </span>
                                                    <span class="button-text">
                                                        {{ __('Download Cv') }}
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Single job content Area-->
    <div class="single-job-content rt-pt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 rt-mb-lg-30">
                    <div class="body-font-1 ft-wt-5 rt-mb-20">{{ __('Biography') }}</div>
                    <div class="body-font-3 text-gray-500">
                       {{$candidate->personal_summary}}
                    </div>
                    <div class="share-job rt-pt-50">
                        <ul class="rt-list gap-8">
                            <li class="d-inline-block body-font-3">
                                {{ __('Share this profile') }}:
                            </li>

                            <li class="d-inline-block ms-3">
                                <a href="{{ socialMediaShareLinks(url()->current(), 'facebook') }}">
                                    <button class="btn btn-outline-plain hover-fb">
                                        <span class="f-size-18 text-primary-500">
                                            <x-svg.facebook-icon width="1em" height="1em" />
                                        </span>
                                        <span class="text-primary-500">{{ __('facebook') }}</span>
                                    </button>
                                </a>
                            </li>
                            <li class="d-inline-block">
                                <a href="{{ socialMediaShareLinks(url()->current(), 'twitter') }}">
                                    <button class="btn btn-outline-plain hover-tw">
                                        <span class="f-size-18 text-twitter">
                                            <x-svg.twitter-icon width="1em" height="1em" />
                                        </span>
                                        <span class="text-twitter">{{ __('twitter') }}</span>
                                    </button>
                                </a>
                            </li>
                            <li class="d-inline-block">
                                <a href="{{ socialMediaShareLinks(url()->current(), 'pinterest') }}">
                                    <button class="btn btn-outline-plain hover-pin">
                                        <span class="f-size-18 text-pinterest me-1">
                                            <x-svg.pinterest-icon />
                                        </span>
                                        <span class="text-pinterest">{{ __('pinterest') }}</span>
                                    </button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="cadidate-details-sidebar">
                        <div class="sidebar-widget">
                            <div class="row">
                                @if ($candidate->year_of_birth)
                                    <div class="col-sm-4">
                                        <div class="icon-box">
                                            <div class="icon-img">
                                                <x-svg.birth-date-icon />
                                            </div>
                                            <h3 class="sub-title">{{ __('Date of birth') }}</h3>
                                            <h2 class="title">
                                                {{ $candidate->year_of_birth }}
                                            </h2>
                                        </div>
                                    </div>
                                @endif
                                @if ($candidate->location)
                                    <div class="col-sm-4">
                                        <div class="icon-box">
                                            <div class="icon-img">
                                                <x-svg.fold-icon />
                                            </div>
                                            <h3 class="sub-title">{{ __('Location') }}</h3>
                                            <h2 class="title">{{ $candidate->location }}
                                            </h2>
                                        </div>
                                    </div>
                                @endif
                                @if ($candidate?->candidate?->marital_status)
                                    <div class="col-sm-4">
                                        <div class="icon-box">
                                            <div class="icon-img">
                                                <x-svg.board-icon />
                                            </div>
                                            <h3 class="sub-title">{{ __('marital_status') }}</h3>
                                            <h2 class="title">
                                                {{ ucfirst($candidate->candidate->marital_status) }}
                                            </h2>
                                        </div>
                                    </div>
                                @endif
                                @if ($candidate?->candidate?->gender)
                                    <div class="col-sm-4">
                                        <div class="icon-box">
                                            <div class="icon-img">
                                                <x-svg.gender />
                                            </div>
                                            <h3 class="sub-title">{{ __('gender') }}</h3>
                                            <h2 class="title">
                                                {{ $candidate->candidate ? ucfirst($candidate->candidate->gender) : '' }}
                                            </h2>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-sm-4">
                                    <div class="icon-box">
                                        <div class="icon-img">
                                            <i class="ph-suitcase-simple f-size-24 text-primary-500"></i>
                                        </div>
                                        <h3 class="sub-title">{{ __('Years of experience') }}</h3>
                                        <h2 class="title">
                                            {{ $candidate?->experience?? '0' }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <div class="contact">
                                <h2 class="title">{{ __('Contact information') }}</h2>

                                <div class="devider"></div>
                                <div class="contact-icon-box">
                                    <div class="icon-img">
                                        <x-svg.location2-icon />
                                    </div>
                                    <div class="info">
                                        <h3 class="subtitle">{{ __('Location') }}</h3>
                                        <h2 class="title">
                                            {{ $candidate->location }}
                                        </h2>
                                    </div>
                                </div>

                                @if ($candidate->phone_cleaned )
                                    <div class="devider"></div>
                                    <div class="contact-icon-box">
                                        <div class="icon-img">
                                            <x-svg.telephone-icon />
                                        </div>
                                        <div class="info">
                                            @if ($candidate->phone_cleaned)
                                                <h3 class="subtitle">{{ __('Phone') }}</h3>
                                                <h2 class="title">{{ $candidate->phone_cleaned }}</h2>
                                            @endif

                                        </div>
                                    </div>
                                @endif
                                @if ($candidate?->email)
                                    <div class="devider"></div>
                                    <div class="contact-icon-box">
                                        <div class="icon-img">
                                            <x-svg.envelope-icon height="32" width="32" />
                                        </div>
                                        <div class="info">
                                            <h3 class="subtitle">{{ __('Email address') }}</h3>
                                            <h2 class="title">{{ $candidate->email }}</h2>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                       </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rt-spacer-100 rt-spacer-md-50"></div>
@endsection
