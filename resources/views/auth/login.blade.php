@extends('layouts.app')

@section('content')
<div class="container">
    <div class='row'>
        <div class='offset-4 col-4 offset-4 mt-5'>
            <h1 style='text-align:center'>Se Connecter</h1>
            <hr />
            <form method="POST" action="{{ route('auth.create') }}">
                @csrf
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
                <!-- Email Address -->
                <div class='form-group'>
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" class="form-control" type="email" placeholder='Enter email'
                        name="email" value="{{ old('email') }}" required />
                    <span class="mt-2">
                        @error('email')
                            {{ $errors->get('email') }}
                        @enderror
                    </span>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" class="form-control" placeholder='Enter password' type="password"
                        name="password" required />
                    <span class="mt-2">
                        @error('password')
                            {{ $errors->get('password') }}
                        @enderror
                    </span>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button class="btn btn-outline-success">
                        {{ __('Se connecter') }}
                    </button>
                </div><br />
                <a href="{{ route('auth.register') }}">Nouveau utilisateur! Créer un compte</a>
            </form>
        </div>
    </div>
</div>

@endsection