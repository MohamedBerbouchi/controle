@extends('layout')


@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
            <div class="display-3 mb-3"> update product: {{$produit->nomProd}}</div>
             <a href="/produits" class="btn btn-primary">back</a>
            </div>
          </div>
          @foreach ($errors->all() as $error)
                 
                <div class="alert alert-danger" role="alert">

                  {{ $error}}
                 </div>
            @endforeach
    </div>

    <div class="container mt-3">

        <form action="{{route('produit.update', $produit->idProd)}}" method="POST">
            @csrf
            <div class="mb-3">
                <label   class="form-label">Nom de Produit:</label>
                <input type="text" class="form-control"  name="nomProd" value="{{$produit->nomProd}}">
            </div>
            <div class="mb-3">
                <label   class="form-label">Prix Unitaire HT:</label>
                <input type="text" class="form-control"    name="prixUnitaireHT" value="{{$produit->prixUnitaireHT}}">
            </div>
            <div class="mb-3">
                <label   class="form-label">couleur:</label>
                <input type="text" class="form-control"    name="couleur" value="{{$produit->couleur}}">
            </div>
            
            <div class="mb-3">
              <button type="submit" class="btn btn-primary">enregistrer</button>
            </div>
        </form>
          
    </div>

@endsection