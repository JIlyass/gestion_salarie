<?php
namespace web\Controllers\salarieController;
include_once __DIR__."/../../models/salarieModel.php";
use models\salarieModel\salarieModel;



class SalarieController{


    public function index($page){
        $listeSalarie=salarieModel::findAll();
        include(__DIR__."/../Views/$page.php");
    }
    public function addSalarie($newSalarie){
        salarieModel::insertSalarie($newSalarie);


    }
    public static function getOne($mat){
        return salarieModel::getOne($mat);
    }
    public function updateUser($userUpdated){
        salarieModel::SaveModification($userUpdated);
    }
    public static function deleteSalarie($mat){
        salarieModel::deleteSalarie($mat);
       
        
    }
   
}





?>