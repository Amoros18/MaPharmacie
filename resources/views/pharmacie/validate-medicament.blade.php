@extends('dashboard')

@section('title', 'Check')

@section('content')
<div class="box-header with-border">
    <h3 class="box-title fa fa-flask">Chosez les medicaments disponibles</h3>
    <div class="box-tools pull-right">
        <div class="has-feedback">
            <input type="text" class="form-control input-sm" name="recherch" id="Re" placeholder="Recherche par Designation......"/>
            <span class="glyphicon glyphicon-search form-control-feedback"></span>
        </div>
    </div>
</div>

<div  class="box-body">
    <div class="card">
        <div class="card-body">
            <form action="" method="POST" class="vstack gap 3 text-black">
                @csrf

                @foreach($medicaments as $medicament )
                @php
                    $checked = '';
                    $id = $medicament->id;
                    if($check->contains('id_medicament',$id)){
                        $checked = 'checked';
                    }
                @endphp
                <div class="col">
                    <label for="medicament" class="col-md-2">{{$medicament->nom}}</label>
                    <input type="checkbox" name="medicament{{$medicament->id}}" value="on" {{$checked}}>
                    
                </div>
                @endforeach

                            <center class="mt-1">
                    <button class="btn btn-new me-2" type="submit" >
                            Enregistrer
                    </button >
                    <input type="reset" class="btn btn-new" value="Effacer">
                </center>
                
            </form>
        </div>
        <small class="text-left">creat by Amoros </small>
    </div>
</div>
@endsection
