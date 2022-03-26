<?php
$nomErr = $PasswordErr =$nomutiErr= $prenomErr= $emailErr  = $errorPass=$phoneErr = "";
$nom = $Password =$nomuti= $prenom =$phone=$password = $telephone =$email= "";
$connect;if(isset($_POST['valider'])){

$prenom=htmlentities(trim($_POST['prenom']));
$nom=htmlentities(trim($_POST['nom']));
$Password=htmlentities(trim($_POST['Password']));
$Passwordrep=htmlentities(trim($_POST['Passwordrep']));
$phone=htmlentities(trim($_POST['phone']));
$nomuti=htmlentities(trim($_POST['nomuti']));
$email=htmlentities(trim($_POST['email']));

if ($prenom&&$nom&&$Password&&$Passwordrep&&$phone&&$nomuti&&$email)
 {

	 if ($Password==$Passwordrep) {
	   $database= new PDO('mysql:host=localhost; dbname=restaurant; charset=utf8;', 'root','');
	 	$insererDon =$database->prepare('INSERT INTO clients(nom,prenom,Password,telephone,utilisateur,email) VALUES(?,?,?,?,?,?)');
		$insererDon->execute( array($nom ,$prenom,$Password,$phone,$nomuti,$email));
		
		die('<a href="../PAGE/PageCommand.php">commencer vos commander </a></h1>');
	}
	else
		$errorPass="Erreur!!!!!!<br>Les deux mots de passe doivent ètre identique";
	

}
else{
	$nomErr="entrer votre nom";
		$nomutiErr="entrer votre nom d'ulisateur";
		$prenomErr="entrer votre prenom";
			$phoneErr="entrer votre numero";
			$emailErr="entrer votre email";
				$PasswordErr="entrer un mot de passe";}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>sofiafood identification</title>
	<meta name="viewport" content="witdh =device-witdh , initial-scale=1">
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
	
<link rel="stylesheet" type="text/css" href="../BOOT3/css/bootstrap.css">
</head>
<style type="text/css">
	body{
		font-family: "lato" ,sans-serif;
		margin: 70px 0px;
		background: #FF5733;
	}
	.divider{
		width: 100px;
		height: 2px;
		background: #ffa500;
		margin: 0 auto;
	}
.heading{
text-align: center;
	margin-bottom: 60px;
}
h2{
	text-transform: uppercase;
	font-weight: bold;
	color: white;
}
#form{
	font-size: 20px;
	background: white;
	padding: 40px;
	border-radius: 10px;
	margin-left: 150px;
}
.comments{

	color: red;
}
.blue{
	color: #FF5733;
}
.form-control{
	font-size: 18px;
	height: 50px;
}
.button1{
		border: 1px solid #ddd;
		background: #FF5733;
		color: #fff;
		width: 100%;
		font-weight: hold;
		text-transform: uppercase;
		padding: 18px;
		border-radius: 5px;
		transition: all 0.3s ease-in 0s;
}
.button1:hover{
		background: #333;
		border-color: whitesmoke;
	}
	@media screen and (max-width: 980px){
		#form{
	font-size: 20px;
	background: white;
	padding: 20px;
	border-radius: 10px;
	margin-left: 10px;
}

	}
</style>
<body>
	<div class="container-fluid">
		 <a class='btn btn-primary' href='pageAcceuil.html'> <span class='glyphicon glyphicon-arrow-left'></span>Retour</a>
		<div class="divider"></div>
		<div class="heading">
			<h2> REMPLIR CES CHAMPS</h2>
		</div>
		<div class="row">
				<div class="col-md-10 col-md-Offset-1">
			<form id="form"  method="POST" action="">  
		<div class="row">
		<div class="col-md-6 col-sm-6">
               <label for="prenom"> Prénom <span class="blue"> *</span></label><br>
            <input type="text"  id= "prenom"  name="prenom" class="form-contol" placeholder="votre prénom" value="">
               <p class="comments"><?php echo $prenomErr;?></p>
           </div>
          <div class="col-md-6 col-sm-6">
               	<label for="nom"> Nom <span class="blue"> *</span></label><br>
               <input type="text"  id= "nom"   name="nom" class="form-contol" placeholder="votre nom" value="" >
               <p class="comments"><?php echo $nomErr;?></p>
                 </div>
           
                   <div class="col-md-6 col-sm-6">
               	<label for="Password"> Password <span class="blue"> *</span></label><br>
               <input type="Password"  id= "Password"    name="Password" class="form-contol" placeholder="Password" value="">
               <p class="comments" ><?php echo $PasswordErr;?> </p>

                   </div>
                    <div class="col-md-6 col-sm-6">
               	<label for="Passwordrep"> Répeter Password <span class="blue"> *</span></label><br>
               <input type="Password"  id= "Password"    name="Passwordrep" class="form-contol" placeholder="Password" value="">
               <p class="comments" ><?php echo $PasswordErr;?> </p>
                   </div>

           <div class="col-md-6 col-sm-6">
               	<label for="phone"> Telephone </label><br>
               <input type="tel"  id= "phone"  name="phone" class="form-contol" placeholder="votre numéro" value="">
               <p class="comments"><?php echo $phoneErr;?></p>
                 </div>
                 <div class="col-md-6 col-sm-6">
               	<label for="nomuti"> Nom d'utilisateur <span class="blue"> *</span></label><br>
               <input type="text"  id= "nomuti"   name="nomuti" class="form-contol" placeholder="votre nom d'utilisateur" value="" >
               <p class="comments"><?php echo $nomutiErr;?></p>
                 </div>
                 <div class="col-md-6">
               	<label for="email"> email <span class="blue"> *</span></label><br>
               <input type="email"  id= "email"   name="email" class="form-contol" placeholder="votre email" value="" >
               <p class="comments"><?php echo $emailErr;?></p>
                 </div>
               <div class="col-md-12">
            <p class="comments" ><?php echo $errorPass;?> </p>
			<input type="submit"class="button1"  name="valider" value="Envoyer">
				</div>	
				</div>
				
				</form> 
			</div>
		</div>
	</div>
</body>
</html>