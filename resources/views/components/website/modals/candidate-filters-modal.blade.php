@props(['visas'])
<div class="modal fade" id="candidateFiltersModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <form id="form" action="{{ route('website.candidate') }}" method="GET">
        <div
            class="modal-dialog modal-wrapper tw-mx-0 md:tw-max-w-[352px] tw-w-[90%] tw-my-0 tw-absolute tw-top-0 tw-bootom-0 tw-left-0">
            <div class="modal-content tw-rounded-none tw-relative tw-min-h-screen tw-max-h-screen">
                <div class="tw-h-screen tw-overflow-x-hidden tw-overflow-y-auto tw-pb-24">
                    <div class="tw-px-5 tw-pt-5">
                        <div class="tw-flex tw-justify-between items-center">
                            <h2 class="tw-text-[#18191C] tw-text-xl tw-font-medium tw-mb-0">{{ __('Filter') }}</h2>
                            <button type="button" class="tw-p-0 tw-border-0 tw-bg-transparent" data-bs-dismiss="modal"
                                aria-label="Close">
                                <x-svg.close-icon />
                            </button>
                        </div>
                    </div>
                    <div class="tw-p-5">
                        <h2 class="tw-text-sm tw-text-[#0A65CC] tw-mb-2 tw-font-medium">{{ __('Visa Type') }}</h2>
                        <div class="">
                            <select class="rt-selectactive candidate-profession" name="visa">
                                <option value="" class="d-none">{{ __('Select Visa type') }}</option>
                                @foreach ($visas as $visa)
                                    <option {{ $visa->id == request('visa') ? 'selected' : '' }}
                                            value="{{ $visa->id }}">
                                        {{ $visa->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr class="tw-bg-[#E4E5E8] tw-m-0">
                    <div class="tw-p-5">
                        <h2 class="tw-text-sm tw-text-[#0A65CC] tw-mb-2 tw-font-medium">{{ __('Min Salary') }}</h2>
                        <div class="tw-flex tw-gap-2 tw-items-center ">
                            <input type="number" name="min_salary" value="" id="min_salary" class="">

                        </div>

                    </div>

                    <div class="tw-p-5">
                        <h2 class="tw-text-sm tw-text-[#0A65CC] tw-mb-2 tw-font-medium">{{ __('Max Salary') }}</h2>
                        <div class="tw-flex tw-gap-2 tw-items-center ">
                            <input type="number" name="max_salary" value="" id="max_salary" class="">

                        </div>

                    </div>
                    <hr class="tw-bg-[#E4E5E8] tw-m-0">
                    <hr class="tw-bg-[#E4E5E8] tw-m-0">
                    <div class="tw-p-5">
                        <h2 class="tw-text-sm tw-text-[#0A65CC] tw-mb-2 tw-font-medium">{{ __('Min Age') }}</h2>
                        <div class="tw-flex tw-gap-2 tw-items-center ">
                            <input type="number" name="min_age" value="" id="min_age" class="">

                        </div>

                    </div>

                    <div class="tw-p-5">
                        <h2 class="tw-text-sm tw-text-[#0A65CC] tw-mb-2 tw-font-medium">{{ __('Max Age') }}</h2>
                        <div class="tw-flex tw-gap-2 tw-items-center ">
                            <input type="number" name="max_age" value="" id="max_age" class="">

                        </div>

                    </div>
                </div>
                <div
                    class="tw-absolute tw-bottom-0 tw-left-0 tw-right-0 tw-p-5 tw-bg-white tw-z-50 tw-flex tw-flex-wrap tw-gap-3 tw-justify-between tw-items-center tw-mt-3">

                    <div>
                        <button type="submit"
                            class="btn btn-primary tw-inline-block">{{ __('Apply filter') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
