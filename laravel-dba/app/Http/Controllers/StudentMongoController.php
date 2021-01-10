<?php

namespace App\Http\Controllers;

use App\StudentMongo;
use Illuminate\Http\Request;

class StudentMongoController extends Controller
{
    /**
     * Show all record in ES
     *
     * @return void
     */
    public function index(Request $request)
    {
        $students = null;
        // nếu name xuất hiện trên querystring url
        //: ở đây: http://laravel-dba.test/student-mongo?name=sample
        //tiến hành truy vấn
        if ($request->query('name')) {
            $students = StudentMongo::searchByQuery([
                'multi_match' => [
                    'query' => $request->query('name'),
                    'fields' => ["first_name", "last_name"]
                ]
            ]);
        }
        // nếu không có query string url thì lấy hết ra
        else {
            $students = StudentMongo::all();
        }

        return view('student-mongo.index', compact('students'));
    }

    /**
     * Create document
     *
     * @return void
     */
    public function create()
    {
        return view('student-mongo.create', ['student' => new StudentMongo()]);
    }

    /**
     * Store document
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $studentMongo = StudentMongo::create($request->input());
        $studentMongo->addToIndex();

        return redirect()->action([StudentMongoController::class, 'index']);
    }

    /**
     * Show view edit
     *
     * @param StudentMongo $student
     * @return void
     */
    public function edit($_id)
    {
        $student = StudentMongo::find($_id);
        return view('student-mongo.edit', compact('student'));
    }

    /**
     * Show view update
     *
     * @param Request $request
     * @param StudentMongo $student
     * @return void
     */
    public function update(Request $request, $_id)
    {
        $studentMongo = StudentMongo::find($_id);

        $studentMongo->update($request->input());
        $studentMongo->updateIndex();

        return redirect()->action([StudentMongoController::class, 'index']);
    }

    /**
     * Remove student
     *
     * @param StudentMongo $student
     * @return void
     */
    public function destroy($_id)
    {
        $studentMongo = StudentMongo::find($_id);
        $studentMongo->delete();
        $studentMongo->deleteIndex();
        return redirect()->action([StudentMongoController::class, 'index']);
    }
}
