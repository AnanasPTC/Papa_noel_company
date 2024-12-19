<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function index(Request $request): View
    {

        $profilesDB = User::where('profile_status', 1);

        if (!empty($request->hobby)) {
            $hobbies_user_id = DB::table('hobbies_users')
                ->where('hobby_id', '=', $request->hobby)
                ->pluck('user_id')
                ->all();
            $profilesDB->whereIn('id', $hobbies_user_id);
        }

        if ($request->min_age && $request->max_age) {
            $minDate = Carbon::today()->subYears($request->max_age);
            $maxDate = Carbon::today()->subYears($request->min_age)->endOfDay();
            $profilesDB->whereBetween('birthdate', [ $minDate , $maxDate]);
        }

        $profiles = $profilesDB->paginate(10);
        $hobbies = Hobby::all();
        return view('pages.search.index', compact('profiles','hobbies'));
    }
}
