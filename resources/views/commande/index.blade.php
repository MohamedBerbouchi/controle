@extends('layout')


@section('content')
    <div class="container mt-3">
        @if (session('success'))
            @if (session('success') == 'product deleted successfuly')
          <div class="alert alert-danger" role="alert">

           {{ session('success')}}
          </div>
                
            @else 
            <div class="alert alert-success" role="alert">

                {{ session('success')}}
               </div>
            @endif
          
        @endif
        
    </div>
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
            <div class="display-3 mb-3"> all products</div>
             <a href="{{route('commandes.create')}}" class="btn btn-primary">create commande</a>
            </div>
          </div>
    </div>

    <div class="container mt-3">

    <table class="table ">
        <thead>
          <tr class="bg-dark text-light">
            <th scope="col">#</th>
            <th scope="col">nom Prod</th>
            <th scope="col">prix Unitaire HT</th>
            <th scope="col">couleur</th>
            <th scope="col">prixTTC</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($commandes as $item)
          <tr>
            <th scope="col">{{$item->numBonCommande}}</th>
            <th scope="col">{{$item->dateCommande}}</th>
            <th scope="col">{{$item->moyenPaiement}}</th>
            <th scope="col">{{$item->totalCommande}}</th>
            <th scope="col">{{$item->paiementValid}}</th>
            <th scope="col "class="row">
                {{-- <div class="col-2">
                    <a href="{{route("produit.edit", ['id'=>$item->idProd])}}" class="btn btn-warning">edit</a>
                </div>
                <form action="{{route('produit.delete', $item->idProd)}}" class="col-2" method="POST">
                    @csrf
                    <button href="#" class="btn btn-danger" onclick="return confirm('do you want to deleted ?')">delete</button>
                </form> --}}
            </th>
          </tr>
          @endforeach
          
        </tbody>
      </table>
    </div>

@endsection