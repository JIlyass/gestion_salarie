<?php
include_once(__DIR__."/../Controllers/salarieController.php");
use web\Controllers\salarieController\SalarieController;

 if(isset($_POST['valider'])){
    $newSalarie=[
        "mat"=>$_POST['mat'],
        "nom"=>$_POST['nom'],
        "prenom"=>$_POST['prenom'],
        "nombreHeures"=>$_POST['nombreHeures'],
        "prix"=>$_POST['prix']
    ];

    $ctr=new SalarieController();
    $ctr->addSalarie($newSalarie);
    header("Location: listeSalarie");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-BhcfnXl4mRA1xx+Ipx0ReMs4xA/JzPfi+o2Z8FvfzoHFC0c+oYrMdkMzmWZ54N4bC4wbv6y9ZOtpKL5J7g2YyQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Ajouter</title>
</head>
<body>
<div class="container mt2 bg-light">
    <a href="home">
        <button class="btn btn-sm btn-secondary mr-2 mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z"/>
            </svg>
        </button>
    </a>
    <h2>Ajouter Salarié</h2>
    <hr>
    <form method="post" >
    <div class="form-group">
            <input   type="text" class="form-control" name="mat" placeholder="Entrez le Matricule" required >
        </div>

        <div class="form-group">
            <input   type="text" class="form-control" name="nom" placeholder="Entrez le Nom" required >
        </div>
        <div class="form-group">
            <input   type="text" class="form-control" name="prenom" placeholder="Entrez le Prenom" required >
        </div>
        <div class="form-group">
            <input   type="text" class="form-control" name="nombreHeures" placeholder="Entrez le nombre d'heures" required>
        </div>
        <div class="form-group">
            <input   type="text" class="form-control" name="prix" placeholder="Entrez le prix" required >
        </div>
        <div class="form-group">
            <input type="submit" name="valider" class="btn btn-primary" value="valider" required  >
        </div>
    </form>
</div>
</body>
</html>

