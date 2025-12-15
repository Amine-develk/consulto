@extends('layouts.app')

@section('content')
    <br/>

    <header>
        <a href="/consulthome" class="btn btn-outline-secondary">home</a>
    </header>
    <br/><br/>

    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Accepter la demander :</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="acceptForm" action="{{ route('accept.consultation.request') }}" method="post">
                    @csrf
                    <input type="hidden" name="userId" id="userId" value="">
                    <div class="modal-body">
                        <label for="msg">Saisir un rendez-vous : </label><br/><br/>
                        <input type="datetime-local" id="date" name="date" value="2017-06-01" /><br/><br/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" onclick="submitForm()" class="btn btn-primary">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-18">
                <div class="card">
                    <div class="navbar rounded card-header">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $consultant->image) }}" alt="Consultant Photo" class="rounded" style="max-width: 100%;">
                        </div>
                        <div class="col-md-8">
                            <h3>{{ $consultant->name }}</h3><br/>
                            <h4>{{ $consultant->specialite }}</h4>
                            <h4>{{ $consultant->prix }} MAD/h</h4><br/>
                            <p>{{ $consultant->description }}</p><br/>
                        </div>
                </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="row bg-light" id="user-demande"></div>
                            <h5>Demades reçus : </h5>
                            <table>  
                                <thead>
                                    <th></th>
                                    <th>Demandeur</th>
                                    <th>Message</th>
                                    <th>Rendez-vous</th>
                                    <th>Action</th>
                                </thead>
                            @foreach($users as $user)
                            <tbody>
                                <div class="row ">
                                    <td><img src="{{ asset('storage/' . $user->image) }}" alt="User Photo" class=" col img-fluid rounded-circle" style="max-width: 150px;"></td>
                                    <td><h5 class="col">{{ $user->name }}</h5></td>
                                    <td><p class="col"> {{ $user->pivot->message }}</p></td>
                                    <td><h6 class="col">{{$user->pivot->rendez_vous }}</h6></td>
{{--                                     <h6 class="col">{{$user->pivot->etat}}</h6>
 --}}                                   <td> <span class="col">
                                    <a href="#" onclick="accepter('{{ $user->id }}')" class="btn btn-outline-success">accepter</a>
                                    <a href="#" onclick="confirmer()" class="btn btn-outline-danger">refuser</a>
                                    </span></td>
                                </div>
                            </tbody>
                            @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<script>
    let userId;
    const accepter = (id) => {
        userId = id; 
        document.getElementById('userId').value = id; 
        const modal = document.querySelector('.modal');
        modal.style.display = 'block';
    }

    const closeModal = () => {
        const modal = document.querySelector('.modal');
        modal.style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', () => {
        const closeButton = document.querySelector('.modal .btn-close');
        closeButton.addEventListener('click', closeModal);
    });

    const confirmer = () => {
        confirm("voulez vous refuser cette demande ?")
    }

    const submitForm = () => {
        const form = document.querySelector('#acceptForm');
        form.submit();
    }
</script>
