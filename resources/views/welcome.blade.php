@extends('layouts.app')

@section('content')
<header class="p-3">
    <div class="d-flex justify-content-end bg-light rounded">
        <a href="/login" class="m-3 btn btn-outline-success">se connecter au tant qu'utilisateur</a>
        <a href="/consultlogin" class="m-3 btn btn-outline-success">se connecter au tant que consultant</a>
    </div>
</header>

<div class="text-center">
    <h2 class="text-success"> Qui somme nous ?</h2>
    <p>une compagne marocaine spécialisé en consultation en ligne dans divers domaines <br/> Marketing digitale, entrepreneuriat, developpement personel...</p>
</div><br/><hr/><br/>

<div class="text-center">
    <h2 class="text-success"> comment ça march ?</h2>
    <a>Créer votre compte</a><br/>
    <a>Choizissez votre consultat</a><br/>
    <a>Faire une demande de consultation</a><br/>
    <a>Se présenter au consultation en ligne</a>
</div><br/><hr/><br/>


<h3 class="text-center text-success">Nos Consultants experts</h3>
    <div class="d-flex">
        @foreach ($consultant as $consult)
            <section class="border border-secondary rounded-3 m-3">
                <div class="m-3" style="width: 250px;height:250px;">
                    <img src="{{ asset('storage/' . $consult->image) }}" class="img-fluid"
                    alt="Consultant Photo" style="width: 100%;height:100%;" >
                </div>
                <h5 class="text-center">{{ $consult->name }}</h6>
                <p class="text-center">{{ $consult->specialite}}</p>
            </section>
            @endforeach
    </div>
<div><br/><hr/><br/>

<div>
    <h3 class="text-center text-success">Nos Domaines de Consultation</h3>
    <div class="row">
        <div class="col">
            <img {{-- src="{{ asset('storage/' . $consultant->photo) }}" --}} alt="Consultant Photo" style="max-width: 100%;">
            <h6 >{{-- {{ $consultant->name }} --}} marketing digitale</h6>
            <p>{{-- {{ $consultant->specialite }} --}} c'est la description du domaine</p>
        </div>
    </div>
</div><br/><br/><hr/>


@endsection
