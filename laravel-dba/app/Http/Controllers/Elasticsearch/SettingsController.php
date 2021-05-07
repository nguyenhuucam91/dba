<?php

namespace App\Http\Controllers\Elasticsearch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //Show UI
    public function index()
    {
        return view('elasticsearch.settings.index');
    }

    //Perform syncing
    public function sync(Request $request)
    {
        $model = $request->input('model');
        //create an instance of selected model
        $modelInstance = app()->make("App\\Models\\Elasticsearch\\$model");

        $modelInstance->addAllToIndex();

        return redirect()->action([SettingsController::class, 'index'])->with('success', 'Synced successfully');
    }
}
