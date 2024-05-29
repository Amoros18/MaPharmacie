<div class="box-header with-border">
    <h3 class="box-title fa fa-flask">Ajouter une pharmacie</h3>
</div>

<div  class="box-body">
    <div class="card">
        <div class="card-body">
            <form action="" method="POST" class="vstack gap 3 text-black">
                @csrf

                <div class="form-group">
                    <label for="nom" class="control-label">Nom Pharmacie:</label>
                    <input type="text" name="nom" class="form-control " value="{{old('nom',$table->nom)}}">
                    @error('nom')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>

                <div class="form-group">
                    <label for="numero">Numero Telephone:</label>
                    <input type="text" name="numero" class="form-control " value="{{old('numero',$table->numero)}}">
                        @error('numero')
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>                      
                        @enderror
                </div>
                <center class="mt-1">
                    <button class="btn btn-new me-2" type="submit" >
                        @if($table->id)
                            Modifier
                        @else
                            Enregistrer
                        @endif
                    </button >
                    <input type="reset" class="btn btn-new" value="Effacer">
                </center>
                
            </form>
        </div>
        <small class="text-left">creat by Amoros </small>
    </div>
</div>
