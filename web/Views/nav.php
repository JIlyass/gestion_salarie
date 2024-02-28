<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
 body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
    }
    .header {
      background-color: #343a40;
      color: #ffffff;
      padding: 1px 0;
    }
    .header h1 {
      margin: 0;
      padding: 0;
      font-size: 36px;
      text-align: center;
    }
    .container {
      margin-top: 20px;
      text-align: center;
    }
    .jumbotron {
      background-color: #ffffff;
      padding: 80px;
      border-radius: 15px;
    }
    </style>
</head>
<body>
<div class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <h3>Gestion des Salariés</h3>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto"> 
            <li class="nav-item">
              <a class="nav-link" href="/gestion salaries/index.php/home">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/gestion salaries/index.php/listeSalarie">Liste des salariés</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/gestion salaries/index.php/addSalarie">Ajouter un salarié</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</body>
</html>