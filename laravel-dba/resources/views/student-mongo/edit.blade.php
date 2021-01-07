@extends('layouts.app-mongo')

@section('content')
    <form action="{{ url('/student-mongo', ['id' => $student->_id]) }}" method="POST">
        @method('PUT')
        @include('student-mongo._form')

        <button type="submit">Update</button>
    </form>

@endsection
