<?php
namespace models\salarieModel;
include_once __DIR__."/../dao/serviceDAO.php";
use dao\serviceDAO\ServicePdo;

class salarieModel{

    private static $listeSalarie=array();
    private static $matUpdate;

    public static function setMatUpdate($matUpdt){
        salarieModel::$matUpdate=$matUpdt;
    }

    public static function getMatUpdate(){
        return salarieModel::$matUpdate;
    }

    public static function findAll(){
        $serDAO=new ServicePdo();
        salarieModel::$listeSalarie=$serDAO->getAll();
        return salarieModel::$listeSalarie;
    }
    public static function insertSalarie($newSalarie){
        //test sur les donnes 
        // var_dump(salarieModel::$listeSalarie);
        $test=0;
        foreach (salarieModel::$listeSalarie as $slr) {
            if($slr->mat==$newSalarie["mat"] ){
                $test=1;
            }
            if($newSalarie["mat"]==""){
                $test=2;
            }
        }
        if($test==1){
            echo "<script>alert('Matricule existe déjà ,Ressayez !')</script>";
        }else if($test==2){
            echo "<script>alert('Le champs Matricule est  obligatoires !')</script>";
        }
        else{
            // envoi du donné au PDO
            $serDAO=new ServicePdo();
            $serDAO->insertData($newSalarie);
        }


        
        

    }
    public static function getOne($mat){
        $serDAO=new ServicePdo();
        return $serDAO->getOne($mat);
    }

    public static function SaveModification($userUpdated){
        $serDAO=new ServicePdo();
        $serDAO->updateData($userUpdated);


    }
    public static function deleteSalarie($mat){
        $serDAO=new ServicePdo();
        $serDAO->delete($mat);
    }
    
 
     
   
   

}


// $test=new salarieModel();
// $test->insertSalarie([
//     "mat"=>4,
//     "nom"=>"test",
//     "prenom"=>"test",
//     "nombreHeures"=>15,
//     "prix"=>150
// ]);
//it's working !
?>