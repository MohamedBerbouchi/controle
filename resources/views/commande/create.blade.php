@extends('layout')


@section('content')
<style>
    h1 {
        color: green;
    }

    .multipleSelection {
        width: 300px;
        background-color: #BCC2C1;
    }

    .selectBox {
        position: relative;
    }

    .selectBox select {
        width: 100%;
        font-weight: bold;
    }

    .overSelect {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }

    #checkBoxes {
        display: none;
        border: 1px #8DF5E4 solid;
    }

    #checkBoxes label {
        display: block;
    }

    #checkBoxes label:hover {
        background-color: #14a78e;
    }
</style>
</head>
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
            <div class="display-3 mb-3"> create new commande</div>
             <a href="/commandes" class="btn btn-primary">back</a>
            </div>
          </div>
          @foreach ($errors->all() as $error)
                 
                <div class="alert alert-danger mt-2"  role="alert">

                  {{ $error}}
                 </div>
            @endforeach
    </div>

    <div class="container mt-3">

        <form action="{{route('commande.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label   class="form-label"> date Commande:</label>
                <input type="date" class="form-control"  name="dateCommande">
            </div>
            <div class="mb-3">
                <label   class="form-label">moyen Paiement:</label>
                <input type="text" class="form-control"    name="moyenPaiement">
            </div>
            <div class="mb-3">
                <label   class="form-label">total Commande</label>
                <input type="text" class="form-control"    name="totalCommande">
            </div>
            <div class="mb-3">paiement Valid<br>
                <input type="radio" name="paiementValid" value="1" id="">yes <br>
                <input type="radio" name="paiementValid" value="0" id="">no
            </div>
            <div class="mb-3">choisir  products<br>
                <div class="multipleSelection">
                    <div class="selectBox" 
                        onclick="showCheckboxes()">
                        <select>
                            <option>Select options</option>
                        </select>
                        <div class="overSelect"></div>
                    </div>
            
                    <div id="checkBoxes">
                        @foreach ($products as $item)
                         <label for="first">
                            <input type="checkbox" class="form-controle"    value="{{$item->idProd}}" name="produits[]"/>
                            {{$item->nomProd}}
                        </label>
                     @endforeach
                        
                          
                    </div>
                </div>
                  
            </div>
            
            <div class="mb-3">
              <button type="submit" class="btn btn-primary">enregistrer</button>
            </div>
        </form>
          
    </div>
    <script>
        var show = true;
  
        function showCheckboxes() {
            var checkboxes = 
                document.getElementById("checkBoxes");
  
            if (show) {
                checkboxes.style.display = "block";
                show = false;
            } else {
                checkboxes.style.display = "none";
                show = true;
            }
        }
    </script>
      
@endsection