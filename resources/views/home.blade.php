@extends('layouts.app')

@section('content')  
<header>
    <div class="d-flex justify-content-end">
        <a href="/espace" class="m-3 btn btn-outline-secondary">profile</a>
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
<div class="modal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Valider la demander :</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
         <form action="{{ route('send.consultation.request') }}" method="post">
            @csrf
            <input type="hidden" name="consultant_id" value="{{ $consult->consultantId }}">
            <div class="modal-body">
                <label for="msg">Message:</label><br>
                <input type="text" id="msg" name="message" required><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>
       </div>
    </div>
  </div>
  @if (Session::has('success'))
  <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif


<div class="container">
    @foreach($consultant as $consult)
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $consult->image) }}" alt="Consultant Photo" class="rounded-circle" style="max-width: 90%;">
                        </div>
                        <div class="col-md-8">
                            <h3>{{ $consult->name }}</h3>
                            <h5>{{ $consult->specialite}}</h5>
                            <h5>{{ $consult->prix }} MAD/h</h5>
                            <p>{{ $consult->description }}</p>
                                <a href="#" class="btn btn-outline-primary" onclick="afficherModal()">Demander une consultation</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div><br/>
    @endforeach

</div>

@endsection



<script>
    const afficherModal = () => {
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
</script>
