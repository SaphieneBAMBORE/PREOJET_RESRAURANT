<?php 
    require'Database.php';
$nameErr=$descriptionErr=$priceErr=$categoryErr=$imageErr=$name=$price=$image=$category=$description="";
if(!empty($_POST)){
  $name= checkInput($_POST['name']);
  $description= checkInput($_POST['description']);
  $price= checkInput($_POST['price']);
  $category= checkInput($_POST['category']);
  $name= checkInput($_FILES['image']['name']);
  $imagePath='../PHOTOS/'.basename('$image');
  $imageExtension = pathinfo($imagePath,PATHINFO_EXTENSION);
  $issuccess=true;
  $isUploadSuccess=false;
  if(empty($name)){
$nameErr="ce champ ne doit pas ètre vide";
$issuccess=false;
  }
 if(empty($description)){
$descriptionErr="ce champ ne doit pas ètre vide";
$issuccess=false;
  }
   if(empty($price)){
$priceErr="ce champ ne doit pas ètre vide";
$issuccess=false;
  }
   if(empty($category)){
$categoryErr="ce champ ne doit pas ètre vide";
$issuccess=false;
  }
   if(empty($image)){
$imageErr="ce champ ne doit pas ètre vide";
$issuccess=false;
  }
  else{
 $isUploadSuccess=true;
 if( $imageExtension !='jpg'&& $imageExtension !='png'&&$imageExtension !='jpeg'&&$imageExtension !='gif' ){

  $imageErr="ce fichier est non valide(il faut jpg,png,jpeg,gif)";
   $isUploadSuccess=false;
 }
 if(file_exists($imagePath)){
  $imageErr="ce fichier exite déja";
   $isUploadSuccess=false;
 }
 if($_FILES["image"]["size"] > 500000){
  $imageErr="ce fichier ne doit pas dépassé 500KB";
   $isUploadSuccess=false;
 }
if($isUploadSuccess){
  if(!move_uploaded_file($FILES["image"]["tmp_name"], $imagePath)){
    $imageErr="ce fichier a eu erreur lors du chargement";
   $isUploadSuccess=false;
  }

 }


  }

  if($issuccess && $isUploadSuccess){
    $db=Database::connect();
    $statement = $db->prepare("INSERT INTO element(name,description,price,category,image) VALUES(?,?,?,?,?)");
  $statement->execute(array($name,$description,$price,$category,$image));
    Database::disconnect();
    header("location:index.php");
  }
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
    <h1><strong>Ajouter un élement</strong></h1><br>
       <form class='form'  role='form'action ='insert.php' method='post' enctype='multipart/form-data'>
        <div class='form-group'>
        <label for='name'>nom</label>
        <input type='text' name='name' class='form-contol' id='name' placeholder='nom' value='<?php echo $name ;?>'>
        <span class='help-inline'><?php  echo $nameErr;?></span>
         </div>
         <div class='form-group'>
          
        <label for='description'>description</label>
        <input type='text' name='description' class='form-contol' id='description' placeholder='description' value='<?php echo $description ;?>'>
        <span class='help-inline'><?php  echo $descriptionErr;?></span>
         </div>
         <div class='form-group'>
          
        <label for='price'>prix</label>
        <input type='number' step ='1'name='price' class='form-contol' id="price" placeholder='prix' value='<?php echo $price;?>'>
        <span class='help-inline'><?php  echo $priceErr;?></span>
         </div>
         <div class='form-group'>
          
  <label for='name'>categorie</label>
  <select name='category' class='form-contol' id='category'>
      <?php 
$db=Database::connect();
foreach($db->query('SELECT * FROM categorie') as $row){

    echo'<option value="'.$row['id'].'">'.$row['name'].'</option>';
}

Database::disconnect();

      ?>
  </select>
        
        <span class='help-inline'><?php  echo $categoryErr;?></span>
         </div>
         <div class='form-group'>
        <label for='image'>selectionner image</label>
        <input type='file'  name='image' class='form-contol' id='image' placeholder='prix' value='<?php echo $price;?>'>
        <span class='help-inline'><?php  echo $imageErr;?></span>
         </div>
       <br>
<div class='form-action'>
  <button type='submit'class=" btn btn-success" ><span class='glyphicon glyphicon-pencil'></span>Ajouter</button>
    <a class='btn btn-primary' href='index.php'> <span class='glyphicon glyphicon-arrow-left'></span>Retour</a>
    </div>
</form>
      




    </div>
    
</div>

  
    
   </body>
   </html>
