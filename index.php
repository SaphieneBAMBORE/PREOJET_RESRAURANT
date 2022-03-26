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
	body{
		background: url("bg.png");
	}
	.admin{

 	background: #fff;
 	padding: 50px;
 	border-radius: 10px;
 }

</style>
 <body>
	
<h2 class=" logo" style="font-size:30px; "> <span class="glyphicon glyphicon-cutlery"></span>SOFIAFOOD<span  class ="glyphicon glyphicon-cutlery"></span> </h2>
<div class="container admin">
	<div class="row">
		<h1><strong>Listes des Items</strong><a href="insert.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus"></span>Ajouter</a></h1>
  <table class="table table-striped table-bordered">
  	<thead>
  		<tr>
  		<th>nom</th>
  		<th>description</th>
  		<th> prix</th>
      <th> categories</th>
  		<th>Actions</th>
  		</tr>
  		
  	</thead>
   <tbody>
 <?php
 
require 'Database.php';
$db=Database::connect();
$statement=$db->query('SELECT element.id,element.name,element.description,element.price ,categorie.name AS category FROM element  LEFT JOIN categorie ON element.category=categorie.id ORDER BY element.id DESC');
while($elemen = $statement->fetch()) {

echo '<tr>';
 echo   '<td>'.$elemen['name'].'</td>';
 echo   '<td>'.$elemen['description']. '</td>';
  echo  '<td>'.$elemen['price']. '</td>';
  echo  '<td>' .$elemen['category'].'</td>';
  echo  '<td style="width:300px;">';
    echo '<a class="btn btn-default"href="view.php?id='.$elemen['id'].'" > <span class="glyphicon glyphicon-eye-open"></span> voir</a>';
         echo'<a href="update.php?id='.$elemen['id'].'" class="btn btn-primary"> <span class="glyphicon glyphicon-pencil"></span> modifier</a>';
        echo '<a href="delete.php?id='.$elemen['id'].'" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"></span>suprimer</a>';
      echo'</td>';
    echo'</tr>';


  
}

  Database::disconnect();
    



  ?>




   	
  	



   </tbody>
  </table>


	</div>

</div>

</body>
</html>