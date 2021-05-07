@extends('layouts.elasticsearch.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Sync index</h2>
    </div>

    {{ $success }}

    <form
        method="POST"
        action="{{ action([App\Http\Controllers\Elasticsearch\SettingsController::class, 'index']) }}"
    >
        @csrf
        <div class="form-group">
            <label>Choose table to sync to elasticsearch</label>
            <select class="form-control" name="model">
                <option value="Film">Film</option>
            </select>
        </div>
        <button class="btn btn-primary" type="submit">Sync</button>
    </form>
@endsection
