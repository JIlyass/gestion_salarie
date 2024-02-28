<?php
    use models\salarieModel\salarieModel;

        if(isset($_POST['telecharger'])){
           //excel
                

           $data= salarieModel::findAll();
            var_dump($data);
            echo "<script>alert('data')</script>";
        
        // Filter the excel data 
         
        
        // Excel file name for download 
        $fileName = "mesSalariés_" . date('Y-m-d') . ".xls"; 
        
        // Column names 
        $fields = array('mat', 'nom', 'prenom', 'nombreHeures', 'prix'); 
        
        // Display column names as first row 
        $excelData = implode("\t", array_values($fields)) . "\n"; 
        
        function  filterData(&$str){ 
            $str = preg_replace("/\t/", "\\t", $str); 
            $str = preg_replace("/\r?\n/", "\\n", $str); 
            if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
        
    }

    if(count($data)>0){
    
        foreach ($data as $row) {
            
                $lineData = array($row->mat, $row->nom, $row->prenom, $row->nombreHeures, $row->prix); 
                array_walk($lineData, 'filterData'); 
                $excelData .= implode("\t", array_values($lineData)) . "\n"; 
        }  
     
        }else{
            $excelData .= 'No salarie found...'. "\n"; 
        }
        
        // Headers for download 
        header("Content-Type: application/vnd.ms-excel"); 
        header("Content-Disposition: attachment; filename=\"$fileName\""); 
        
        // Render excel data 
        echo $excelData; 
        
        exit;
            
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"><!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>  
    <div class="container mt2">
        <h2>Liste des Salariés</h2>
        <hr>
        <div class="col-md-12 head">
            <div class="float-end">
                <form method="post">
                    <button class="btn btn-primary" name='telecharger'><i class="dwn"></i>Télécharger</button>
                </form>
            </div>
        </div>
        <table class="table ">
            <thead class=" table-success">
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>prenom</th>
                    <th>nombre d'heures</th>
                    <th>Prix/heure</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

    use web\Controllers\salarieController\SalarieController;

    if(isset($_POST['deletebtn'])){
           
        $ctr=new SalarieController();
        $ctr->deleteSalarie($_POST['matDelete']);
        header("Location: {$_SERVER['PHP_SELF']}");
    }
    
    


                    foreach ($listeSalarie as $slr) {
                        echo "<tr>";
                        echo "<td>".$slr->mat."</td>";
                        echo "<td>".$slr->nom."</td>";
                        echo "<td>".$slr->prenom."</td>";
                        echo "<td>".$slr->nombreHeures."</td>";
                        echo "<td>".$slr->prix."</td>";
                        echo "<td class='d-flex flex-row'> 
                        <form action='edit' method='post'>
                            <input type='hidden' value='".$slr->mat."' name='matEdit' >
                            <button type='submit' name='modifier' class='btn btn-m btn-warning'>
                                <i class='bi bi-pen' ></i>
                            </button>    
                        </form>";
                        echo "
                            <form method='post' >
                                <input type='hidden' name='matDelete' value='".$slr->mat."' />
                                <button type='submit' name='deletebtn'  class='btn btn-m btn-danger'>
                                    <i class='bi bi-trash' ></i> </button>
                            </form>
                        ";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        
    </div>
</body>
</html>
