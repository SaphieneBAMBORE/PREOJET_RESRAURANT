
<!DOCTYPE>
<html>
<head>
  <meta name="viewport" content="witdh =device-witdh , initial-scale=1 "charset="utf-8">
  <title>commander chez sofiafood</title>
  <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC 'rel='stylesheet' type='text/css'>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../BOOT3/css/bootstrap.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
  body{
    background: whitesmoke;

  }
  .comments{
    color: red;
  }
</style>
<body>
<div class="container">
  <a class='btn btn-primary' href='../PAGE/PageCommand.php'> <span class='glyphicon glyphicon-arrow-left'></span>Retour</a>
   <div class="py-5 text-center">
      <img src="../PHOTOS/COM.png" alt="" width="80" height="65">
          <h2>JE   LANCE  MA COMMANDE </h2>
      

    </div>

   <h3 class="mb-3" style="color: blue;">Informations Personnelles</h3>
        <form action="" method="post">
          <div class="row">
            <div class="col-md-6">
            <label for="name" >Nom</label>
             <input type="text"   name="name" id="name" placeholder="votre nom" value=""  class="form-control"required="">
              <div class="comments">
            
              </div>
            </div>

            <div class="col-md-6">
              <label for="prenom" >Prénom</label>
              <input type="text"  name="prenom"class="form-control" id="prenom" placeholder="votre prénom" value=""required="">
              <div class="comments"> 
              </div>
            </div>
            <div class="col-md-6">
              <label for="username" >Nom d'utilisateur</label>
                <input type="text" id="username"  name ="username"placeholder="Username" class="form-control" required="">
              <div class="comments">
                </div>
             
            </div>
             <div class="col-md-6">
              <label for="email" >Email </label>
              <input type="email" class="form-control" name="email" id="email" placeholder="exaempl@gmail.com"required="">
              <div class="comments"> </div>
            
          </div>
           <div class="col-md-6">
              <label for="address" class="form-label">Address</label>
              <input type="text" name="address" class="form-control" id="address" placeholder=" numero rue" required="">
              <div class="comments"> 
               
              </div>
            </div>

            <div class="col-md-6">
              <label for="address2" class="form-label">Address 2</label>
              <input type="text"  name="address2"class="form-control" id="address2" placeholder="Apartement ou maison"><br><br>
              <div class="comments"> 
              </div>
            </div>
            
            <div class="col-md-4">
              <label for="pays" class="form-label">Pays</label>
              <select class="form-select" id="pays" required="">
                <option value="">Burkina Faso</option>
                <option>Cote D'ivoire</option>
                <option>Mali</option>
                <option>Togo</option>
                <option>Guinéee</option>
              </select>
              <div>
                Choississez votre pays!
              </div>
            </div>


            <div class="col-md-4">
              <label for="ville" >Ville</label>
              <select class="form-select" id="ville" required="">   <option value="" >Ouagadougou</option>
                <option>Bobo Dioulasso</option>
                <option>Fada</option>
                <option>Tenkodogo</option>
                <option>Abidjan</option>
              </select>
              <div class="comment">
                choississez votre ville!
              </div>
            </div>
            <div class="col-md-4">
              <label for="produit" class="form-label">produit</label>
              <input type="text" class="form-control" id="produit" placeholder="" >   
            </div>
 <h3 class="mb-3" style="color:blue;">Paiement</h3>
          
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required="" >
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
            <div class="form-check">
              <input id="Orange" name="paymentMethod" type="radio" class="form-check-input" >
              <label class="form-check-label" for="Orange">Orange money</label>
            </div>
            <div class="form-check">
              <input id="liguidi" name="paymentMethod" type="radio" class="form-check-input" >
              <label class="form-check-label" for="liguidi">Liguidi Cash</label>
            </div>
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" >
              <label class="form-check-label" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" >
              <label for="debit">Debit card</label>
            </div>
        
            <div class="col-md-6">
              <label for="cc-name" >Nom de la carte</label>
              <input type="text"  class="form-control" id="cc-name" name="cc-name" placeholder="" required=""><br>
              
              <div class="comments">
               
              </div>
            </div>

            <div class="col-md-6">
              <label for="number" >numéro de la carte</label>
              <input type="text" id="number" class="form-control" name ="number"placeholder="" required="">
              <div class="comments">
                
              </div>
            </div>

            <div class="col-md-3">
              <label for="expiration">Expiration</label>
              <input type="text" name="expiration"class="form-control" id="expiration" placeholder="" >
              <div class="comments">
                
              </div>
            </div>

            <div class="col-md-3">
              <label for="cvv">CVV</label>
              <input type="text"  name="cvv" class="form-control" id="cvv" placeholder="numero de sécurité" required>
              <div class="comments">
                
              </div>
            </div>
        

          <hr class="my-4">

          <button class="btn btn-primary btn-block" name="valider"  type="submit">Valider</button>
        </div>
        </form>
      </div>
</body>
</html>