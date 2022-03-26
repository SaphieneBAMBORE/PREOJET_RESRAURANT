<?php 
require'Database.php';
if(!empty($_GET['id'])){
	$id=checkInput($_GET['id']);
}

$db=Database::connect();
$statement = $db->prepare('SELECT element.id,  element.image,element.name,element.description,element.price ,categorie.name AS category FROM element  LEFT JOIN categorie ON element.category=categorie.id WHERE element.id = ?');
		$statement->execute(array($id));
		$elemen= $statement->fetch();
		Database::disconnect();

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
		<div class="col-sm-6"><h1><strong>Voir un élement</strong></h1><br>
       <form>
       	<div class="form-group">
       		
       	<label>nom:<?php  echo ' ' .$elemen['name'];?></label>
         </div>
         <div class="form-group">
       		
       	<label>description:<?php  echo ' ' .$elemen['description'];?></label>
         </div>
         <div class="form-group">
       		
       	<label>prix:<?php  echo ' ' .$elemen['price'];?></label>
         </div>
         <div class="form-group">
       		
       	<label>categorie:<?php  echo ' ' .$elemen['category'];?></label>
         </div>
      
<div class="form-action">
		<a class="btn btn-primary" href="index.php"> <span class="glyphicon glyphicon-arrow-left"></span>Retour</a>
		</div>

       </form>




		</div>
		
    <div class="col-sm-6 site">
                         <div class="thumbnail">
                          <img src="<?php echo '../PHOTOS/'.$elemen['image'];?>" style="height: 250px; width: 100%;">
                             <div class="price"><?php  echo ' ' .$elemen['price'];?> </div>
                         <div class="caption">
                                 <h4> <?php  echo ' ' .$elemen['name'];?></h4>
                               <p><?php  echo ' ' .$elemen['description'];?></p>
                                <a href="#" class="btn btn-order" role="button"> <span class="glyphicon glyphicon-shopping-cart"></span> commander</a>
                              </div>
                              </div>
                               </div></div>

	


	</div>
</div>
  
  	
   </body>
   </html>










