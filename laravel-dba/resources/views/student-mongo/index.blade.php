@extends('layouts.app-mongo')

@section('content')
    <h1>Students</h1>
    <p><a href="/student-mongo/create" class="btn btn-primary">Create new student</a></p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Student Address</th>
                <th>Student Dob</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {{-- Foreach: loop through each element in collection|array, then get field from these attribute --}}
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->_id }}</td>
                    <td>{{ $student->first_name . ' ' . $student->last_name }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->dob }}</td>
                    <td>
                        <a href="/student-mongo/{{ $student->_id }}/edit">Edit</a>
                        <a href="javascript:void(0)" onclick="return confirm('Are you sure') ?
                        document.getElementById('student-delete-form-{{ $student->_id }}').submit() : null">Delete</a>
                        <form action="/student-mongo/{{ $student->_id }}" id="student-delete-form-{{ $student->_id }}" method="POST">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
