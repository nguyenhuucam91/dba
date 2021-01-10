@extends('layouts.app-mongo')

@section('content')
    <h1>Students</h1>
    <div>
        <a href="/student-mongo/create" class="btn btn-primary">Create</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#searchModal">
            Search
        </button>

        <!-- Modal -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <form action="/student-mongo" method="GET">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label>Student name</label>
                        <input type="text" name="name" class="form-control"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

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
