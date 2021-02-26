<?php

namespace App\Http\Controllers;

use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class UserProfileController extends Controller
{
    private $userProfileCacheKey = "user_profile:";

    public function index()
    {
        $userProfile = null;
        //if key exists, then get data from Redis key
        if (Redis::exists($this->userProfileCacheKey . Auth::user()->id)) {
            $userProfile = unserialize(Redis::get($this->userProfileCacheKey . Auth::user()->id));
        }
        // if key is not exist, we try to find user_information associated with authenticated user id
        else {
            $userProfile = UserProfile::where(['user_id' => Auth::user()->id])->first();
            //if there is no user profile, we create a new object and cast to array,
            if ($userProfile === null) {
                $userProfile = new UserProfile;
            } else {
                //fire cache to prevent access to database again
                Redis::set($this->userProfileCacheKey . Auth::user()->id, serialize($userProfile));
            }
        }
        //push all data to view
        return view('user-profile.index', ['user' => $userProfile]);
    }

    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        //merge form data which user inputs with authenticated user_id to update
        $dataToUpdate = array_merge($request->except(['_token']), ['user_id' => $userId]);

        $userProfile = UserProfile::updateOrCreate([
            'user_id' => $userId
        ], $dataToUpdate);

        //copy this data to cache for later retrieval
        Redis::set($this->userProfileCacheKey . $userId, serialize($userProfile));

        return \redirect()->action([UserProfileController::class, 'index']);
    }
}
