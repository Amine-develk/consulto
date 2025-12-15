@extends('layouts.app')

@section('content')
<br/>
<header>
    <a href="/home" class="btn btn-outline-secondary">home</a>
</header><br/><br/>

<div class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Annuler la demander :</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="acceptForm" action="{{ route('accept.consultation.request') }}" method="post">
                @csrf
                <div class="modal-body">
                    <label for="msg">Etez-vous sur vous vouler annuler cette demande ? </label><br/><br/>
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
                <div class="navbar card-header">       
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $user->image) }}" alt="Consultant Photo" class="rounded"  style="max-width: 180px;">
                    </div>
                    <div class="col-md-8">
                        <h3>{{ $user->name }}</h3><br/>
                        <h4>{{ $user->email }}</h4><br/>
                    </div>                </div>

                <div class="card-body">
                    <div class="row">
                        <h5>Vos demandes : </h5>
                        <table>  
                        <thead>
                            <th></th>
                            <th>Consultant</th>
                            <th>Spécialité</th>
                            <th>Rendez-vous</th>
                            <th>Etat</th>
                            <th>Action</th>
                        </thead>
                        @foreach($consultants as $consultant)
                            <tbody>
                            <td><img src="{{ asset('storage/' . $consultant->image) }}" alt="Consultant Photo" class=" img-fluid rounded-circle" style="max-width: 150px;"></td>
                            <td><h5 class="col">{{ $consultant->name }}</h5>                            </td>
                            <td><p class="col"> {{ $consultant->specialite }}</p></td>
                            <td><h6 class="col">{{$consultant->pivot->rendez_vous }}</h6></td>
                            <td><h6 class="col">{{$consultant->pivot->etat}}</h6></td>
                            <td><span class="col"><a href="#" onclick="annuler()" class="btn btn-outline-warning">annuler</a></span></td>
                        </tbody>
                        </div>

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

    const annuler = () => {
        const modal = document.querySelector('.modal');
        modal.style.display = 'block';
    }

</script>
