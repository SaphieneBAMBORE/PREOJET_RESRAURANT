<?php 
    require'Database.php';
    if (!empty($_GET['id'])) {
     $id= checkInput($_GET['id']);
    }
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
$isImageUpdated=false; 
  }
  else{
    $isImageUpdated=true;
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

  if(($issuccess && $isImageUpdated&&$isUploadSuccess) || ($issuccess&&!$isImageUpdated)){
    $db=Database::connect();
    if($isImageUpdated){
      $statement = $db->prepare("UPDATE element set name=?, description=?,price=?,image=?,category=? WHERE id=?");
    $statement->execute(array($name,$description,$price,$category,$image,$id));
    }
    else{
      $statement = $db->prepare("UPDATE element set name=?, description=?,price=?,category=? WHERE id=?");
    $statement->execute(array($name,$description,$price,$category,$id));
    }
    
    Database::disconnect();
    header("location:index.php");
  }
  else if($isImageUpdated&&!$isUploadSuccess)
  {
$db=Database::connect();
 $statement = $db->prepare("SELECT image FROM element WHERE id = ?");
  $statement->execute(array($id));
  $elemen=$statement->fetch();
$image= $elemen['image'];
  Database::disconnect(); 
  }
}
else
{
 $db=Database::connect();
 $statement = $db->prepare("SELECT * FROM element WHERE id = ?");
  $statement->execute(array($id));
  $elemen=$statement->fetch();
  $name= $elemen['name'];
  $description= $elemen['description'];
  $price= $elemen['price'];
  $category= $elemen['category'];
  $image= $elemen['image'];
  Database::disconnect(); 
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
  <div class="col-sm-6">
    
  <h1><strong>modifier un élement</strong></h1><br> <form class="form"  role='form'action ="<?php echo'update.php?id='. $id ;?>"  method="post"  enctype="multipart/form-data">
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
  if($row['id']==$category)

    echo'<option  selected ="selected" value="'.$row['id'].'">'.$row['name'].'</option>';
else

    echo'<option value="'.$row['id'].'">'.$row['name'].'</option>';

}

Database::disconnect();

      ?>
  </select>
        
        <span class='help-inline'><?php  echo $categoryErr;?></span>
         </div>
         <div class='form-group'>
          <label>image</label>
          <p><?php echo $image;?></p>
        <label for='image'>selectionner image</label>
        <input type='file'  name='image' class='form-contol' id='image' placeholder='prix' value='<?php echo $image;?>'>
        <span class='help-inline'><?php  ?></span>
         </div>
       <br>
<div class='form-action'>
  <button type='submit'class=" btn btn-success" ><span class='glyphicon glyphicon-pencil'></span>modifier</button>
    <a class='btn btn-primary' href='index.php'> <span class='glyphicon glyphicon-arrow-left'></span>Retour</a>
    </div>
</form>
  </div>

    <div class="col-sm-6 site">
      <div class="thumbnail">
        <img src="<?php echo '../PHOTOS/'.$image;?>" style="height: 250px; width: 100%;">
          <div class="price"><?php  echo $price;?> </div>
            <div class="caption">
               <h4> <?php  echo  $name;?></h4>
                <p><?php  echo $description;?></p>
                <a href="#" class="btn btn-order" role="button"> <span class="glyphicon glyphicon-shopping-cart"></span> commander</a>
                    </div>
                      </div>
                      </div>
    </div>
    
</div>

  
    
   </body>
   </html>
