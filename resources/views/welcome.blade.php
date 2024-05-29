<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pharmacie Maroua</title>
    <link rel="icon" href="{{asset('icon.png')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" crossorigin="anonymous"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('style.css')}}">
</head>


<body>
    <header>
        <nav id="1" class="navbar navbar-expand-md">
            <div class="container-fluid">
                <div class="site-logo">
                    <a href="/" rel="home">
                        <img src="{{asset('icon.png')}}" alt="LOGO" width="50" height="50" class="header image is-logo-image lazy loaded">
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <section class="top-header" id="recherche">
        <form action="" method="POST">
            @csrf
            <div class="row mt-1">
                    <label for="nature_dossier" class="col-2 control-label">Nom:</label>
                    <input type="text" name="nom" class="text" value="{{old('nom',$nom)}}">    
                    <label for="principe_actif" class="col-2 control-label">Principe Actif:</label>
                    <input type="text" name="principe_actif" class="text" value="{{old('principe_actif', $principe_actif)}}">        
                    <label for="categorie" class="col-2 control-label">Categorie:</label>
                    <input type="text" name="categorie" class="text" value="{{old('categorie',$categorie)}}">    
            </div>
            <div class="text-center">
                    </button > <input type="submit" class="btn btn-primary" value="Recherche"><br><br></center>
                </div>
            </form>      
        </form>
    </section>
    <section id="presentation">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title fa fa-flask">Liste des pharmacie qui en possede</h3>
                <div class="box-tools pull-right">
                    <div class="has-feedback">
                        <input type="text" class="form-control input-sm" name="recherch" id="Re" placeholder="rechercher la pharmacie par nom..."/>
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                </div>
            </div>

            <div  class="box-body">
                <div class="container">
                    <div class="table-responsive">
                        <table class="table table-hover table-responsible table-striped">
                            <thead>
                                <th>Nom Pharmacie</th>
                                <th>Nom Medicament</th>
                                <th>Categorie</th>
                                <th>Statut</th>
                            </thead>
                            <tbody>
                                @foreach ($Listes as $Liste )
                                    <tr>
                                        <td>{{$Liste->pharmacie_name}}</td>
                                        <td>{{$Liste->medicament_name}}</td>
                                        <td>{{$Liste->categorie_name}}</td>
                                        <td>{{$Liste->statut}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{$Listes->links()}}
        </div>
    </section>
    
</body>
</html>