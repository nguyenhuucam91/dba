@extends('layouts.elasticsearch.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Films</h2>
    </div>

    <form method="GET" action="{{ action([App\Http\Controllers\Elasticsearch\FilmController::class,'index']) }}" onsubmit="this.form.submit()">
        <div class="form-group">
            <input type="text" class="form-control" name="search" placeholder="Search by title"/>
        </div>
    </form>

    <table class="table table-striped">
        <tr>
            <td>Id</td>
            <td>Title</td>
            <td>Description</td>
        </tr>

        @foreach ($films as $film)
        <tr>
            <td>{{ $film->film_id }}</td>
            <td>{{ $film->title }}</td>
            <td>{{ $film->description }}</td>
        </tr>
        @endforeach
    </table>

@endsection
