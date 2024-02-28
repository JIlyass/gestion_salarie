<?php
    namespace web\Views\edit;
    include_once(__DIR__."/../Controllers/salarieController.php");
    use web\Controllers\salarieController\SalarieController;

    // Note : $listeSalarie est instantie dans le controlleur a partir du model et passe au view
    $slrUpdate=array();
     if(isset($_POST['modifier'])){
       
        $slrUpdate=SalarieController::getOne($_POST['matEdit']);   
     }
     
if(isset($_POST['save'])){
    
    $userUpdated=[
        "mat"=>$_POST['mat'],
        "nom"=>$_POST['nom'],
        "prenom"=>$_POST['prenom'],
        "nombreHeures"=>$_POST['nombreHeures'],
        "prix"=>$_POST['prix']
    ];
    $ctr=new SalarieController();
    $ctr->updateUser($userUpdated);
    
    header("Location: listeSalarie");
    exit(); 


}
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mt-4">
        <h3>Modifier les information d'un salarié</h3>
        <hr>
        
        <div class="bg-light">
        <form method="post" >
    <div class="form-group">
        <b>Matricule</b>    <input   type="text" class="form-control"  name="mat"  value="<?php  echo $slrUpdate[0]->mat;  ?>" required readonly >
        </div>

        <div class="form-group">
        <b>Nom </b>    <input   type="text" class="form-control" name="nom" value="<?php echo $slrUpdate[0]->nom;   ?>" required >
        </div>
        <div class="form-group">
        <b>prenom</b>    <input   type="text" class="form-control" name="prenom" value="<?php  echo $slrUpdate[0]->prenom;   ?>" required >
        </div>
        <div class="form-group">
        <b>nombreHeures</b>    <input   type="number" class="form-control" name="nombreHeures" value="<?php 
         echo $slrUpdate[0]->nombreHeures; ?>" required>
        </div>
        <div class="form-group">
        <b>prix</b>    <input   type="number" class="form-control" name="prix" value="<?php echo $slrUpdate[0]->prix;  ?>" required >
        </div>
        <div class="form-group">
            <input type="submit" name="save" class="btn btn-primary" value="save" required  >
        </div>
    </form>
        </div>
       
    </div> 
</body>
</html>

