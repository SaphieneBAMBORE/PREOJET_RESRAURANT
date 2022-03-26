<?php
$nomErr = $emailErr = $prenomErr = $phoneErr = $messageErr ="";
$nom = $email = $prenom = $message = $telephone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nom"])) {
    $nomErr = "Entrer votre nom";
  } else {
    $nom = test_input($_POST["nom"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Entrer votre email";
  } else {
    $email = test_input($_POST["email"]);
  }
    
  if (empty($_POST["prenom"])) {
    $prenomErr = "Entrer votre prénom";
  } else {
    $prenom= test_input($_POST["prenom"]);
  }

  if (empty($_POST["message"])) {
    $messageErr = "Que voulez vous nous dire?";
  } else {
    $message = test_input($_POST["message"]);
  }

  if (empty($_POST["phone"])) {
    $phoneErr = "Entrer votre numéro";
  } else {
    $phone = test_input($_POST["phone"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>contacter-nom</title>
	<meta name="viewport" content="witdh =device-witdh , initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="http://fonts.googleapis.com/css?family=lato" rel= "stylesheet" type="text/css">
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
</style>
<body>
	<div class="container">
		<a class='btn btn-primary' href='../PAGE/pageAcceuil.php'> <span class='glyphicon glyphicon-arrow-left'></span>Retour</a>
		<div class="divider"></div>
		<div class="heading">
			<h2> Contacter-nous</h2>
		</div>
		<div class="row">
		<div class="col-md-10 col-md-Offset-1">
			<form id="form"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
		<div class="row">
		<div class="col-md-6">
               <label for="prenom"> Prénom <span class="blue"> *</span></label><br>
            <input type="text"  id= "prenom"  name="prenom" class="form-contol" placeholder="votre prénom" value="">
               <p class="comments"><?php echo $prenomErr;?></p>
           </div>
          <div class="col-md-6">
               	<label for="nom"> Nom <span class="blue"> *</span></label><br>
               <input type="text"  id= "nom"   name="nom" class="form-contol" placeholder="votre nom" value="" >
               <p class="comments"><?php echo $nomErr;?></p>
                 </div>
           <div class="col-md-6">
               	<label for="email"> Email <span class="blue"> *</span></label><br>
               <input type="email"  id= "email"    name="email" class="form-contol" placeholder="votre email" value="">
               <p class="comments" ><?php echo $emailErr;?> </p>
                   </div>
           <div class="col-md-6">
               	<label for="phone"> Telephone </label><br>
               <input type="tel"  id= "phone"  name="phone" class="form-contol" placeholder="votre numéro" value="">
               <p class="comments"><?php echo $phoneErr;?></p>
                 </div>
               <div class="col-md-12">
            <label for="message"> Message <span class="blue"> *</span></label><br>
         <textarea  type="message"  rows="4" cols="70" id= "message"  name="message" class="form-contol" placeholder="votre message"></textarea>
               <p class="comments"><?php echo $messageErr;?></p>
                </div>

            <div class="col-md-12">
               <p class="blue"> *Ces informations sont réquisent</p>
               </div>

            <div class="col-md-12">
			<input type="submit"class="button1" value="Envoyer">
				</div>	
				</div>
				
				</form> 
			</div>
		</div>
	</div>
</body>
</html>