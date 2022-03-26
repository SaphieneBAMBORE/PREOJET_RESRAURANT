<?php 
require'../panier/db_classe.php';
require'../panier/panier_classe.php';
$panier = new panier();


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>sofiafood</title>
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
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<style type="text/css">
	.thumbnail img{
		height: 250px ;width: 100%;
	}
	.oo{
		height: 100px;
	}
		@media screen and (max-width: 980px){
.float{
	font-size: 18px;
	padding: 0px;
}
		}
</style>
<body>
	<div class="container site">
		<a href="pageAcceuil.html" class="float"><span class="glyphicon glyphicon-home " style="color:red;"></span>Acceuil</a>
		<a href="" class="float"><span class="glyphicon glyphicon-shopping-cart" style="color:black; font-size: 20px; margin-left:15px;position: absolute;"></span></a>

		<a href="../CONTACTER/INSCRI.php" class="float"style="float:right;margin-right: 10px;"><span class="glyphicon glyphicon-user " style="color:red;"></span>s'abonner</a>
		
		<h2 class=" logo" style="font-size:30px; "> <span class="glyphicon glyphicon-cutlery"></span>SOFIAFOOD<span  class ="glyphicon glyphicon-cutlery"></span> </h2>

<?php 
require'../admin/Database.php';
echo'<nav>
		<ul class=" nav nav-pills">';
	$db=Database::connect();
	$statement=$db->query('SELECT * FROM categorie');
	$categorie=$statement->fetchAll();
	foreach ($categorie as $category) {
if ($category['id']=='1') 
echo'<li role= "presentation" class="active"><a href="#'.$category['id'].'" data-toggle= "tab">'.$category['name'].'</a></li>';
	else
echo'<li role= "presentation" ><a href="#'.$category['id'].'" data-toggle="tab">'.$category['name'].'</a></li>';

}
echo'</ul>
	</nav>';

echo'<div class="tab-content">';
	
foreach($categorie as $category){
	if ($category['id'] =='1') 
echo'<div class="tab-pane active" id="'.$category['id'].'">';
	else
echo'<div class="tab-pane " id="'.$category['id'].'">';
echo'<div class="row">';
$statement=$db->prepare('SELECT * FROM element WHERE element.category=?');
	$statement->execute(array($category['id']));
	while ($elemen = $statement->fetch()) {

		echo'<div class="col-md-4">
		<div class="thumbnail">
          <img src="../PHOTOS/'.$elemen['image'].'" >
              <div class="price">'.$elemen['price'].'F</div>
                 <div class="caption">
                   <h4> ' .$elemen['name'].'</h4>
                    <p> ' .$elemen['description'].'</p>
     <a href="../panier/addpanier.php?id=' .$elemen['id'].'"><span class="glyphicon glyphicon-shopping-cart" style="color:red;font-siz:20px;"></span></a>
                    <a href="../RESERVATION/SOURCE.php" class="btn btn-order"> <span class="glyphicon glyphicon-shopping-cart"></span> commander</a>
                    </div>
                    </div>
                              </div>';
		
	}
	echo'</div>
	      </div>';
}
Database::disconnect();
echo'</div>'
?>




</div>
</body>
</html>