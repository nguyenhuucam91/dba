@extends('layouts.app-mongo')

@section('content')
    <h2>Sync</h2>
    <form action="{{ action('SettingController@syncIndex') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Sync Elasticsearch</button>
    </form>
@endsection
