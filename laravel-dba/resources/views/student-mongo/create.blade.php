@extends('layouts.app-mongo')

@section('content')
    <h2>Create new student</h2>
    <form action="{{ action([App\Http\Controllers\StudentMongoController::class, 'store']) }}" method="POST">
        @include('student-mongo._form')
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

@endsection
