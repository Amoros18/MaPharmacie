<div class="box-header with-border">
    <h3 class="box-title fa fa-flask">Ajouter un utilisateurs</h3>
</div>
<div  class="box-body">
    <div class="card">
        <div class="card-body">
            <form action="" method="POST" class="vstack gap 3 text-black">
                @csrf

                <div class="form-group">
                    <label for="name" class="control-label">Nom:</label>
                    <input type="text" name="name" class="form-control " value="{{old('name',$table->name)}}">
                    @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>

                <div class="form-group">
                    <label for="id_pharmacie">Nom Pharmacie:</label>
                    <select name="id_pharmacie" class="form-control" {{$readonly}}>
                        <option value="{{$table->id_pharmacie}}">{{$pharmacie->nom}}</option>
                        <option value=""></option>
                        @foreach ($pharmacies as $cate )
                            <option value="{{$cate->id}}">{{$cate->nom}}</option>
                        @endforeach
                    </select>
                        @error('id_pharmacie')
                            <span class="text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>                      
                        @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="control-label">Email:</label>
                    <input type="email" name="email" class="form-control " value="{{old('email',$table->email)}}">
                    @error('email')
                        <span class="text-danger" role="alert">
                            <strong>{{$message}}</strong>
                        </span> 
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">Mot de passe:</label>
                    <input type="password" name="password" class="form-control ">
                    @error('password')
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
