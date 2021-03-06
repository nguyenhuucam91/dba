<?php

namespace App\Http\Controllers;

use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = null;
        //if key exists, then get data from Redis key
        if (Redis::exists('user_profile:' . Auth::user()->id)) {
            $user = Redis::hgetall('user_profile:' . Auth::user()->id);
        }
        // if key is not exist, we try to find user_information associated with authenticated user id
        else {
            $user = UserProfile::where(['user_id' => Auth::user()->id])->first();
            //if there is no user profile, we create a new object and cast to array,
            //since redis result returns array
            if ($user === null) {
                $user = new UserProfile;
            } else {
                //fire cache to prevent access to database
                Redis::hmset(
                    'user_profile:' . Auth::user()->id,
                    $user->toArray()
                );
            }
        }
        //push all data to view
        return view('user-profile.index', compact('user'));
    }

    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        //merge form data which user inputs with authenticated user_id to update
        $dataToUpdate = array_merge($request->except(['_token']), ['user_id' => $userId]);
        //find whether user exist inside database or not
        $userProfile = UserProfile::where(['user_id' => $userId])->first();
        // if userProfile exist, then we update db
        if ($userProfile !== null) {
            $userProfile->update($dataToUpdate);
        }
        // if not exist, then we create new profile for that user
        else {
            $userProfile = UserProfile::create($dataToUpdate);
        }
        //If key exists, then delete that key, let index page handle caching
        if (Redis::exists($this->userProfileCacheKey . $userId)) {
            Redis::del($this->userProfileCacheKey . $userId);
        }

        return \redirect()->action([UserProfileController::class, 'index']);
    }
}
