<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\NewCandidate;
use App\Models\PastCandidate;
use App\Models\JobCategory;
use App\Models\VisaType;


class WebsiteController extends Controller
{
    public function candidates(Request $request)
    {


        try {
            $data['new_candidates'] =$this->getnewCandidates($request);

            $data['categories'] =JobCategory::all();
            $data['visas'] =VisaType::all();
            return view('welcome', $data);
        } catch (\Exception $e) {
            $this->flashError('An error occurred: '.$e->getMessage());

            return back();
        }
    }



    public function past_candidates(Request $request){
        try {
            $data['new_candidates'] =$this->getexCandidates($request);

            $data['categories'] =JobCategory::all();
            $data['visas'] =VisaType::all();
            return view('welcome', $data);
        } catch (\Exception $e) {
            $this->flashError('An error occurred: '.$e->getMessage());

            return back();
        }
    }

    public function new_candidates(Request $request){
        try {
            $data['new_candidates'] =$this->getnewCandidates($request);

            $data['categories'] =JobCategory::all();
            $data['visas'] =VisaType::all();
            return view('welcome', $data);
        } catch (\Exception $e) {
            $this->flashError('An error occurred: '.$e->getMessage());

            return back();
        }
    }

    private function getnewCandidates($request)
    {

            $query = NewCandidate::query();



//
//        // keyword
        if ($request->has('keyword') && $request->keyword != null) {
            session(['header_search_role' => 'new']);
            $query->where(function ($q) use ($request) {
                $q->where('full_name', 'LIKE', "%$request->keyword%")
                    ->orWhere('email', 'LIKE', "%$request->keyword%");
            });
        }
//
        //        // visa
        if ($request->has('visa') && $request->visa != null) {
            $visa = VisaType::where('id', $request->visa)->first();
            $query->where($visa->nickname, true);
        }
//        // location
        if ($request->has('location') && $request->location != null) {

            $query->where('location', 'LIKE', "%$request->location%");
        }
//
//        // profession
        if ($request->has('profession') && $request->profession != null) {
            $cat = JobCategory::where('id', $request->profession)->first();
            $query->where($cat->nickname, true);
        }

//
        // salary
        if ($request->has('min_salary') && $request->min_salary!= null) {
            $query->where('desired_salary_cleaned', '>=', $request->min_salary);
        }

        if ($request->has('max_salary') && $request->max_salary!= null) {
            $query->where('desired_salary_cleaned', '<=', $request->max_salary);
        }
//
//        // age
        if ($request->has('min_age') && $request->min_age != null) {
            $min_birth_date = Carbon::now()->subYears($request->min_age);
            $query->where('year_of_birth', '<=', $min_birth_date);
        }

        if ($request->has('max_age') && $request->max_age != null) {
            $max_birth_date = Carbon::now()->subYears($request->max_age);
            $query->where('year_of_birth', '>=', $max_birth_date);
        }

        // perpage
        $candidates = $query->latest();

        return $candidates->paginate(12)->withQueryString();
    }

    private function getexCandidates($request)
    {

        $query = PastCandidate::query();


//
//        // keyword
        if ($request->has('keyword') && $request->keyword != null) {
            session(['header_search_role' => 'new']);
            $query->where(function ($q) use ($request) {
                $q->where('full_name', 'LIKE', "%$request->keyword%")
                    ->orWhere('email', 'LIKE', "%$request->keyword%");
            });
        }
//
        //        // visa
        if ($request->has('visa') && $request->visa != null) {
            $visa = VisaType::where('id', $request->visa)->first();
            $query->where($visa->nickname, true);
        }
//        // location
        if ($request->has('location') && $request->location != null) {

            $query->where('location', 'LIKE', "%$request->location%");
        }
//
//        // profession
        if ($request->has('profession') && $request->profession != null) {
            $cat = JobCategory::where('id', $request->profession)->first();
            $query->where($cat->nickname, true);
        }

//
        // salary
        if ($request->has('min_salary') && $request->min_salary!= null) {
            $query->where('desired_salary_cleaned', '>=', $request->min_salary);
        }

        if ($request->has('max_salary') && $request->max_salary!= null) {
            $query->where('desired_salary_cleaned', '<=', $request->max_salary);
        }
//
//        // age
        if ($request->has('min_age') && $request->min_age != null) {
            $min_birth_date = Carbon::now()->subYears($request->min_age);
            $query->where('year_of_birth', '<=', $min_birth_date);
        }

        if ($request->has('max_age') && $request->max_age != null) {
            $max_birth_date = Carbon::now()->subYears($request->max_age);
            $query->where('year_of_birth', '>=', $max_birth_date);
        }

        // perpage
        $candidates = $query->latest();

        return $candidates->paginate(12)->withQueryString();
    }


    public function candidateDetails(Request $request, $id)
    {

        try {
            $candidate = NewCandidate::where('jobseeker_id', $id)->firstOrFail();


            return view('candidate-details', compact('candidate'));
        } catch (\Exception $e) {
            $this->flashError('An error occurred: '.$e->getMessage());

            return back();
        }


    }

    function flashError(?string $message = null)
    {
        if (! $message) {
            $message = __('something_went_wrong');
        }

        return session()->flash('error', $message);
    }
}
