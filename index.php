<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"><!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<style>
    body {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Hauteur minimum de la fenêtre visible */
}
</style>
<?php
// include_once __DIR__."/web/Controllers/salarieController.php";  //it s work !!!
require __DIR__."/web/Controllers/salarieController.php";    
use web\Controllers\salarieController\SalarieController; //it s work 

require(__DIR__."/web/Views/nav.php"); 

$ctrl=new SalarieController();

$myPages=["addSalarie","listeSalarie","home","edit","404"];

if(isset($_GET['url'])){
    
    

    $url=explode('/',$_GET['url']);
    //var_dump($url);
    if(($url[0]=="index.php" && count($url)==1   )  ||  count($url)==1 ){
        $ctrl->index('home');
        
    }else if($url[0]=="index.php" &&   count($url)==2 && in_array($url[1],$myPages)){
            // echo "<script>alert('ok')</script>";
            $ctrl->index($url[1]);
    }
    else{
        $ctrl->index('404');
    }

}else{
    $ctrl->index('home');
}

require(__DIR__."/web/Views/footer.php"); 

?>