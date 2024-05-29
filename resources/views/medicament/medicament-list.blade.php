@extends('dashboard')

@section('title', 'Liste des medicaments')
@section('content')
<div class="box-header with-border">
    <h3 class="box-title fa fa-flask">Liste des medicaments</h3>
    <div class="box-tools pull-right">
        <div class="has-feedback">
            <input type="text" class="form-control input-sm" name="recherch" id="Re" placeholder="Recherche par Designation......"/>
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <a href="{{route('medicament.create')}}" id="aj"  class="btn btn-success glyphicon glyphicon-plus" > Ajouter</a>
        </div>
    </div>
</div>

<div  class="box-body">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover table-responsible table-striped">
                <thead>
                    <th>Nom</th>
                    <th>Principe Actif</th>
                    <th>Description</th>
                    <th>Id Categorie</th>
                    
                    <th>Modifier</th>
                </thead>
                <tbody>
                    @foreach ($Listes as $Liste )
                        <tr>
                            <td>{{$Liste->nom}}</td>
                            <td>{{$Liste->principe_actif}}</td>
                            <td>{{$Liste->description}}</td>
                            <td>{{$Liste->id_categorie}}</td>
                            
                            <td><a  href = "{{route('medicament.update',['table'=>$Liste])}} ">
                                <button type="edit">Modifier</button></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{$Listes->links()}}
    @endsection
</div>