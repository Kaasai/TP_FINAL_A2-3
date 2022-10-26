<?php
include 'db.php';

error_reporting(0);
session_start();

  $message = null;

  if (isset($_POST['enregistrer'])) {
    $name = $_POST['nom'];
    $nickname = $_POST['prenom'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM connection WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $validation =null;
    

    
    if (!$result->num_rows > 0) {
      $sql = "INSERT INTO connection (nom, prenom, email, mdp)
              VALUES('$name', '$nickname', '$email', '$password')";
      $result = mysqli_query($conn, $sql);
      $validation = "<center style='color:blue';>Inscription réussie</center>";
    } 
    else {
      $message = "<center style='color:red';>Utilisateur déjà existant</center>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
     <link rel="stylesheet" href="assets/bootstrap.min.css">
     <link rel="stylesheet" href="assets/all.min.css">
	<title>Home</title>
</head>
<body background="">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Société Général</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="inscription.php">inscription</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>
	<form action="" method="post">
    <div class="container-fluid">
      <div class="p-4  mx-auto shadow rounded" style="width:100%; max-width:340px; margin-top: 25px;">
  
        <img src="assets/images/t.png" class=" =  rounded-circle mx-auto d-block" style="width: 140px;">
        <h3><center>Création De Compte</center></h3>
          <input type="text" class="my-2 form-control" placeholder="Nom" name="nom" required>
          <input type="text" class="my-2 form-control" placeholder="Prénom" name="prenom" required>
      <input type="email" class="my-2 form-control" placeholder="Email" name="email" required>
      <input type="password" class="my-2 form-control" placeholder="Mot de passe" name="password" required>
        
        <center><button class=" btn btn-primary" type="submit" name="enregistrer" style='background-color:green; border:green'>Enregistrer</button></center>
      </div>

    </div>
	</form>
  <br>
  <?php

      if ($message != null) {
        echo "$message";
      }

      if ($validation != null) {
        echo "$validation";
      }
  ?>
  <script src="assets/bootstrap.bundle.min.js"></script>
  <script src="assets/bootstrap.min.js"></script>
</body>
</html>   