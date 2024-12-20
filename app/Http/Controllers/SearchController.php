<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use App\Models\Like;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SearchController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

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
            $profilesDB->whereBetween('birthdate', [$minDate, $maxDate]);
        }

        if ($request->filter) {
            switch ($request->filter) {
                case 'age_desc':
                    $profilesDB->orderBy('birthdate', 'ASC');
                    break;
                case 'age_asc':
                    $profilesDB->orderBy('birthdate', 'DESC');
                    break;
                case 'created_asc':
                    $profilesDB->orderBy('created_at', 'ASC');
                    break;
            }
        }

        $userReceiverLike = Like::where('receiver_id',$request->user()->id)->get();
        $userLike = Like::where('sender_id', $request->user()->id)->get();
        $match = [];

            foreach ($userReceiverLike as $likeReceiver) {
                foreach ($userLike as $like) {
                    if ($like->receiver_id == $likeReceiver->sender_id) {
                        $match[] = $likeReceiver->sender_id;
                    }
                }
            }

        $profiles = $profilesDB->whereNotIn('id', $match)->paginate(10);
        $hobbies = Hobby::all();

        return view('pages.search.index', compact('profiles', 'hobbies'));
    }
}
