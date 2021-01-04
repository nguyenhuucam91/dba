@extends('layouts.app')

@section('content')
    <h1>Students</h1>
    <p><a href="/students/create" class="btn btn-primary">Create new student</a></p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Student Dob</th>
                <th>Student Phone number</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {{-- Foreach: loop through each element in collection|array, then get field from these attribute --}}
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->dob }}</td>
                    <td>{{ $student->phone_number }}</td>
                    <td>
                        <a href="/students/{{ $student->id }}/edit">Edit</a>
                        <a href="javascript:void(0)" onclick="confirm('Are you sure') ? document.getElementById('student-delete-form-{{ $student->id }}').submit() : null">Delete</a>
                        <form action="/students/{{ $student->id }}" id="student-delete-form-{{ $student->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
