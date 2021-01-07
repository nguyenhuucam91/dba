@extends('layouts.app')

@section('content')
    <h1>Update student</h1>
    <form action="/students/{{ $student->id }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" id="name" name="name" value="{{ $student->name }}"/>
        </div>
        <div class="form-group">
            <label for="dob">Dob</label>
            <input class="form-control" id="dob" name="dob" type="date" value="{{ $student->dob }}"/>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone number</label>
            <input class="form-control" id="phone_number" name="phone_number" value="{{ $student->phone_number }}"/>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <button type="button" onclick="history.back()" class="btn btn-default">Back</button>
    </form>
@endsection
