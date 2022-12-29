<?php 
session_start();
$bdd=new PDO('mysql:host=127.0.0.1;dbname=espace_admin','root','');
if(isset($_POST['valider'])){ 
      $pseudo=htmlspecialchars($_POST['pseudo']);
      $address=nl2br(htmlspecialchars($_POST['address']));
      $tel=htmlspecialchars($_POST['tel']);
      $mail=htmlspecialchars($_POST['mail']);
      $mdp=htmlspecialchars($_POST['mdp']);
      $inserarticle =$bdd->prepare('INSERT INTO membres(pseudo,address,tel,mail,mdp)VALUES(?,?,?,?,?)');
      $inserarticle->execute(array($pseudo,$address,$tel,$mail,$mdp));
      ?>
      <script type="text/javascript">
      alert("ajoute avec succè ");
      </script><?php header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> S'inscrire</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="espace_client/images/logo.png">
    
</head>
<body>
<form name="form" method="POST" action=""  onsubmit="return valid()">
        <section class="vh-100% gradient-custom">
          <div class="container  h-100 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                  <div class="card-body p-5 text-center">

                    <div class="mb-md-5 pb-5">

                      <h2 class="fw-bold mb-2 text-uppercase">S'inscrire</h2>
                      <p class="text-white-50 mb-5">Entrez vos données !</p>

                      <div class="form-outline form-white mb-4">
                        <input type="text" class="form-control form-control-lg" name="pseudo"  placeholder="example: nizar">
                        <label>Pseudo</label>
                        
                        <input type="text" class="form-control form-control-lg" name="address" placeholder="tarek ben zied">
                        <label>Address</label>

                        <input type="number" class="form-control form-control-lg" name="tel" placeholder="52641659" >
                        <label>Numéro de téléphone</label>
                      
                        <input type="email" class="form-control form-control-lg" name="mail" placeholder="name@example.com">
                        <label>Adresse e-mail</label>
                      
                        <input type="password" class="form-control form-control-lg" name="mdp" placeholder="*******">
                        <label>Mot de passe</label>
                      
                        <input type="password" class="form-control form-control-lg" name="repmdp" placeholder="*******">
                        <label>Confirmez le mot de passe</label>
                      </div>

                      

                      <button class="btn btn-outline-light btn-lg px-5" type="submit" name="valider">Connexion</button>

                      <div class="d-flex justify-content-center text-center mt-4 pt-1">
                        <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                        <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                        <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
</form>
<script src="js.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>