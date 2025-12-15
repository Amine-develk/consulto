@extends('layouts.app')

@section('content')
    <div class="container">
        <div class='row'>
            <div class='offset-4 col-4 offset-4 mt-5'>
                <h1 style='text-align:center'>Créer un compte</h1>
                <hr />
                <form method="POST" action="{{ route('auth.consultstore') }}" enctype="multipart/form-data">
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
                            @error('name')
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

                     <!-- Adresse -->
                     <div class='form-group'>
                        <label for="adresse">{{ __('Adresse') }}</label>
                        <input id="adresse" class="form-control" type="text" placeholder='Enter adresse'
                            name="adresse" value="{{ old('adresse') }}" required />
                        <span class="mt-2 text-danger">
                            @error('adresse')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                     <!-- Description -->
                     <div class='form-group'>
                        <label for="description">{{ __('Description') }}</label>
                        <input id="description" class="form-control" type="text" placeholder='Enter description'
                            name="description" value="{{ old('description') }}" required />
                        <span class="mt-2 text-danger">
                            @error('description')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <!-- Prix -->
                    <div class='form-group'>
                        <label for="prix">{{ __('Prix') }}</label>
                        <input id="prix" class="form-control" type="text" placeholder='Enter price'
                            name="prix" value="{{ old('prix') }}" required />
                        <span class="mt-2 text-danger">
                            @error('prix')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <!-- Specialite -->
                    <div class='form-group'>
                        <label for="specialite">{{ __('specialite') }}</label>
                        <input id="specialite" class="form-control" type="text" placeholder='Enter specialite'
                            name="specialite" value="{{ old('specialite') }}" required />
                        <span class="mt-2 text-danger">
                            @error('specialite')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>


                    <!-- Photo -->
                    <div class="form-group">
                        <label for="Photo" class="col-sm-3 col-form-label">Photo</label>
                        <div class="col-sm-9">
                          <input type="file" class="form-control" name="Photo" id="Photo" @error('Photo') is-invalid @enderror>
                        </div>
                        @error('Photo')
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
                    <a href="{{ route('auth.consultlogin') }}">Se connecter</a>
                </form>
            </div>
        </div>
    </div>
@endsection