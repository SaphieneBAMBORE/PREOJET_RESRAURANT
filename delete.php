<?php 

    require'Database.php';

    if (empty($_GET['id'])) {
      $id=checkInput($_GET['id']);
         }
         if (!empty($_POST)) {
           $id=checkInput($_POST['id']);
            $db=Database::connect();
 $statement = $db->prepare("DELETE FROM element WHERE id = ?");
  $statement->execute(array($id));
      Database::disconnect();
      header('location:index.php');
  
         }

function checkInput($data)
{
  

    $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;}


     ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>



<meta name="viewport" content="witdh =device-witdh , initial-scale=1">
  <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC 'rel='stylesheet' type='text/css'>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../BOOT3/css/bootstrap.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="../stylecss/style.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
     

<style type="text/css">
  body{'
    background: url("bg.png");
  }
  .admin{

  background: #fff;
  padding: 50px;
  border-radius: 10px;
 }
 .help-inline{
    color: red;
 }
.form-contol{
    height: 40px;
    font-size: 18px;
    width: 100%;}
</style>
 <body>
  
<h2 class=' logo' style='font-size:30px; '> <span class='glyphicon glyphicon-cutlery'></span>SOFIAFOOD<span  class ='glyphicon glyphicon-cutlery'></span> </h2>
<div class='container admin'>
<div class='row'>
    <h1><strong>Suprimer un élement</strong></h1><br>
    <form class="form"  role="form" action ="delete.php?id='.$elemen['id'].'" method="post">
       
      <p class="alert alert-danger">Voulez-vous vraiment supprimer ?</p>
<div class='form-action'>
  <button type='submit'class=" btn btn-danger"  >oui</button>
    <a class='btn btn-default' href='index.php'></span>Non</a>
    </div>
</form>
      




    </div>
    
</div>

  
    
   </body>
   </html>
