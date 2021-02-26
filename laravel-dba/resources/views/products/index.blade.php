@extends('layouts.app')

@section('content')
<h1>Products</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <a href="/products/{{ $product->id }}">View</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<h1>Recent products</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($recentProducts as $recentProduct)
            <tr>
                <td>{{ $recentProduct->id }}</td>
                <td>{{ $recentProduct->name }}</td>
                <td>{{ $recentProduct->description }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
