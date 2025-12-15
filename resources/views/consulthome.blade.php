@extends('layouts.app')

@section('content')  
<header>
    <div class="d-flex justify-content-end">
        <a href="/profile" class="m-3 btn btn-outline-secondary">profile</a>
        <a href="/" class="m-3 btn btn-outline-secondary">logout</a>
    </div>  <br/>
    <nav class="m-3 p-3 row navbar navbar-light bg-light">
        <label for="spe">Choisir une spécialité: </label><br/>
        <select id="spe" class="col form-select">
            <option>--specialité--</option>
            @foreach($consultant as $consult)
            <option>{{ $consult->specialite }}</option>
            @endforeach
        </select>
        <span class="col"><a class="right btn btn-outline-success">Search</a></span>
      </nav>
    
</header><br/><br/>
<div class="container">
    @foreach($consultant as $consult)
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $consult->image) }}" class="rounded-circle" alt="Consultant Photo" style="max-width: 90%;">
                        </div>
                        <div class="col-md-8">
                            <h3>{{ $consult->name }}</h3>
                            <h5>{{ $consult->specialite}}</h5>
                            <h5>{{ $consult->prix }} MAD/h</h5>
                            <p>{{ $consult->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div><br/>
    @endforeach

</div>

@endsection

