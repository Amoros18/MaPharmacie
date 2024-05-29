<div class="box-header with-border">
    <h3 class="box-title fa fa-flask">Ajouter un medicament</h3>
</div>

<div  class="box-body">
    <div class="card">
        <div class="card-body">
            <form action="" method="POST" class="vstack gap 3 text-black">
                @csrf

                <div class="form-group">
                    <label for="nom" class="control-label">Nom:</label>
                    <input type="text" name="nom" class="form-control " value="{{old('nom',$table->nom)}}">
                    @error('nom')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="control-label">Description:</label>
                    <input type="description" name="description" class="form-control" value="{{old('description',$table->description)}}">
                    @error('description')
                        <span class="text-danger" role="alert">
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span> 
                        </span> 
                    @enderror
                </div>
                <div class="form-group">
                    <label for="principe_actif">Principe Actif:</label>
                    <input type="text" name="principe_actif" class="form-control " value="{{old('principe_actif',$table->principe_actif)}}">
                        @error('principe_actif')
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>                      
                        @enderror
                </div>

                <div class="form-group">
                    <label for="id_categorie" class="control-label">Id categorie</label>
                    <input type="id_categorie" name="id_categorie" class="form-control " value="{{old('id_categorie',$table->id_categorie)}}">
                    @error('id_categorie')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>

                <div class="form-group">
                    <label for="code_cip" class="control-label">Code Cip:</label>
                    <input type="code_cip" name="code_cip" class="form-control" value="{{old('code_cip',$table->code_cip)}}">
                    @error('code_cip')
                        <span class="text-danger" role="alert">
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span> 
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
