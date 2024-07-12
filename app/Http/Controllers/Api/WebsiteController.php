<?php

namespace App\Http\Controllers\Api;

use App\Models\JobCategory;
use App\Models\NewCandidate;
use App\Models\PastCandidate;
use App\Models\VisaType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class WebsiteController extends Controller
{
    public function past_candidates(Request $request)
    {
        try {
            $data = $this->getexCandidates($request);

            return response()->json($data, 200);
        } catch (\Exception $e) {

            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

    public function new_candidates(Request $request)
    {
        try {
            $data= $this->getnewCandidates($request);
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }


    private function getnewCandidates($request)
    {
        $query = NewCandidate::query();

        // keyword
        if ($request->has('keyword') && $request->keyword != null) {
            $query->where(function ($q) use ($request) {
                $q->where('full_name', 'LIKE', "%$request->keyword%")
                    ->orWhere('email', 'LIKE', "%$request->keyword%");
            });
        }

        // visa
        if ($request->has('visa') && $request->visa != null) {
            $visa = VisaType::where('id', $request->visa)->first();
            $query->where($visa->nickname, true);
        }

        // location
        if ($request->has('location') && $request->location != null) {
            $query->where('location', 'LIKE', "%$request->location%");
        }

        // profession
        if ($request->has('profession') && $request->profession != null) {
            $cat = JobCategory::where('id', $request->profession)->first();
            $query->where($cat->nickname, true);
        }

        // salary
        if ($request->has('min_salary') && $request->min_salary != null) {
            $query->where('desired_salary_cleaned', '>=', $request->min_salary);
        }

        if ($request->has('max_salary') && $request->max_salary != null) {
            $query->where('desired_salary_cleaned', '<=', $request->max_salary);
        }

        // age
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

        // keyword
        if ($request->has('keyword') && $request->keyword != null) {
            $query->where(function ($q) use ($request) {
                $q->where('full_name', 'LIKE', "%$request->keyword%")
                    ->orWhere('email', 'LIKE', "%$request->keyword%");
            });
        }

        // visa
        if ($request->has('visa') && $request->visa != null) {
            $visa = VisaType::where('id', $request->visa)->first();
            $query->where($visa->nickname, true);
        }

        // location
        if ($request->has('location') && $request->location != null) {
            $query->where('location', 'LIKE', "%$request->location%");
        }

        // profession
        if ($request->has('profession') && $request->profession != null) {
            $cat = JobCategory::where('id', $request->profession)->first();
            $query->where($cat->nickname, true);
        }

        // salary
        if ($request->has('min_salary') && $request->min_salary != null) {
            $query->where('desired_salary_cleaned', '>=', $request->min_salary);
        }

        if ($request->has('max_salary') && $request->max_salary != null) {
            $query->where('desired_salary_cleaned', '<=', $request->max_salary);
        }

        // age
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


    public function NewCandidateDetails(Request $request, $id)
    {
        try {
            $candidate = NewCandidate::where('jobseeker_id', $id)->firstOrFail();

            return response()->json(['candidate' => $candidate], 200);
        } catch (\Exception $e) {

            return response()->json(['error' => 'An error occurred: '. $e->getMessage()], 500);
        }
    }


    public function PastCandidateDetails(Request $request, $id)
    {
        try {
            $candidate = PastCandidate::where('jobseeker_id', $id)->firstOrFail();

            return response()->json(['candidate' => $candidate], 200);
        } catch (\Exception $e) {

            return response()->json(['error' => 'An error occurred: '. $e->getMessage()], 500);
        }
    }


    public function visas(Request $request)
    {
        try {
            $visas = VisaType::all();

            return response()->json(['visas' => $visas], 200);
        } catch (\Exception $e) {

            return response()->json(['error' => 'An error occurred: '. $e->getMessage()], 500);
        }
    }

    public function categories(Request $request)
    {
        try {
            $categories = JobCategory::all();

            return response()->json(['categories' => $categories], 200);
        } catch (\Exception $e) {

            return response()->json(['error' => 'An error occurred: '. $e->getMessage()], 500);
        }
    }
}
