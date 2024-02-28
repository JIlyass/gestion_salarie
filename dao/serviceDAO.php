<?php
namespace dao\serviceDAO;
use PDO;

class ServicePdo{
    private $con;
    function __construct()
    {
        $this->con=new PDO("mysql:host=localhost;dbname=salaries","root","") or die("erreur lors de la connexion à la base de données ! ");

    }
    function __destruct()
    {
        $this->con=null;
    }
    public function getAll(){
        $req=$this->con->prepare("select * from salarie");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
    public function getOne($mat){
        $req=$this->con->prepare("select * from salarie where mat=?");
        $req->execute([$mat]);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
    public function insertData($newData){
        $req=$this->con->prepare("insert into salarie values(?,?,?,?,?)");
        $req->execute([
            $newData['mat'],
            $newData['nom'],
            $newData['prenom'],
            $newData['nombreHeures'],
            $newData['prix']
        ]);
        echo "<script>alert('Salarié ajouté avec success !')</script>";

        
    }

    public function updateData($userUpdated){
        $req=$this->con->prepare('update salarie set nom=?,prenom=?,nombreHeures=?,prix=? where mat=?');
        $req->execute([
            $userUpdated['nom'],
            $userUpdated['prenom'],
            $userUpdated['nombreHeures'],
            $userUpdated['prix'],
            $userUpdated['mat']
        ]); 
          echo "<script>alert('Salarié modifié avec success !')</script>";


    }
    public function delete($mat){
        $req=$this->con->prepare("delete from salarie where mat=?");
        $req->execute([$mat]);
        echo "<script>alert('Salarie supprimé avrc success !')</script>";
    }
    
}
// $c=new ServicePdo();
// var_dump($c->getAll());
//it's work !


?>