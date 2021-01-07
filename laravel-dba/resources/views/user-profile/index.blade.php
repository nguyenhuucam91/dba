@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User profile</div>

                <div class="card-body">
                    <form method="POST" action="/user-profile">
                        @csrf

                        <div class="form-group row">
                            <label for="full_name" class="col-md-4 col-form-label text-md-right">Full name</label>

                            <div class="col-md-6">

                                {{-- The same as 2 other fields --}}
                                @if (old('full_name'))
                                    <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" required
                                    value="{{ old('full_name') }}" />
                                @elseif(array_key_exists('full_name', $user))
                                    <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" required
                                    value="{{ $user['full_name'] }}" />
                                @else
                                    <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" required
                                    value="" />
                                @endif

                                @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">Date of birth</label>

                            <div class="col-md-6">
                                @if (old('dob'))
                                    <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" required
                                    value="{{ old('dob') }}" />
                                @elseif(array_key_exists('dob', $user))
                                    <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" required
                                    value="{{ $user['dob'] }}" />
                                @else
                                    <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" required
                                    value="" />
                                @endif

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                @if (old('address'))
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="current-password"
                                    value="{{ old('address') }}" />
                                @elseif(array_key_exists('address', $user))
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="current-password"
                                    value="{{ $user['address'] }}" />
                                @else
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="current-password"
                                    value="" />
                                @endif

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update profile
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
