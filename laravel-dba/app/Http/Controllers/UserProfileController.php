<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = null;
        //if key exists, then get data from REdis key
        if (Redis::exists('user_profile:'.Auth::user()->id)) {
            $user = Redis::hgetall('user_profile:'.Auth::user()->id);
        }
        // if key is not exist, we try to find user_information associated with authenticated user id
        else {
            $user = UserProfile::where(['user_id' => Auth::user()->id])->first();
            //if there is no user profile, we create a new object and cast to array,
            //since redis result returns array
            if ($user === null) {
                $user = new UserProfile;
            }
            //if user exist, we set cache for user data for next acccess
            else {
                $user = Redis::hmset('user_profile:'. Auth::user()->id, $user->toArray());
            }
            $user = $user->toArray();
        }
        //push all data to view
        return view('user-profile.index', compact('user'));
    }

    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        //merge form data which user inputs with authenticated user_id to update
        $dataToUpdate = array_merge($request->all(), ['user_id' => $userId]);
        //perform update and create in the database
        $userProfile = UserProfile::updateOrCreate(['user_id' => $userId], $dataToUpdate);
        //delete existing cache if has
        Redis::exists('user_profile:'.Auth::user()->id) ?? Redis::hdel('user_profile:'.Auth::user()->id);
        return \redirect()->action('UserProfileController@index');
    }
}
