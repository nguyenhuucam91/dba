<?php

namespace App\Http\Controllers;

use App\StudentMongo;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function showSyncIndexView()
    {
        return view('setting.show-sync-index');
    }

    /**
     * Sync index
     *
     * @return void
     */
    public function syncIndex()
    {
        StudentMongo::addAllToIndex();
        return redirect()->action('SettingController@showSyncIndexView');
    }
}
