@extends('layouts.app')

@section('content')
    <div class="container">
        <div class='row'>
            <div class='offset-4 col-4 offset-4 mt-5'>
                <h1 style='text-align:center'>Créer un compte</h1>
                <hr />
                <form method="POST" action="{{ route('auth.store') }}" enctype="multipart/form-data">
                    @csrf
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                    <!-- Name -->
                    <div class='form-group'>
                        <label for="name">{{ __('Name') }}</label>
                        <input id="name" class="form-control" type="text" placeholder='Enter name'
                            name="name" value="{{ old('name') }}" required />
                        <span class="mt-2 text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <!-- Email Address -->
                    <div class='form-group'>
                        <label for="email">{{ __('Email') }}</label>
                        <input id="email" class="form-control" type="email" placeholder='Enter email'
                            name="email" value="{{ old('email') }}" required />
                        <span class="mt-2 text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" class="form-control" placeholder='Enter password' type="password"
                            name="password" required />
                        <span class="mt-2 text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <!-- Confirmation -->
                    <div class="form-group">
                        <label for="password_confirmation">{{ __('Confirmation') }}</label>
                        <input id="password_confirmation" class="form-control" placeholder='Enter confirmation'
                            type="password" name="password_confirmation" required />
                        <span class="mt-2 text-danger">
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <!-- UserPhoto -->
                    <div class="form-group">
                        <label for="userphoto" class="col-sm-3 col-form-label">Photo</label>
                        <div class="col-sm-9">
                          <input type="file" class="form-control" id="userphoto" name="userphoto" @error('userphoto') is-invalid @enderror>
                        </div>
                        @error('userphoto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button class="btn btn-outline-success">
                            {{ __('Créer mon compte') }}
                        </button>
                    </div>
                    <br />
                    <a href="{{ route('auth.login') }}"> Se connecter</a>
                </form>
            </div>
        </div>
    </div>
@endsection