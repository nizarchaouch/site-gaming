<?php
ini_set('display_errors', 'Off');
ini_set('error_reporting', E_ALL);
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_admin', 'root', '');
if (isset($_POST['valider'])) {
  if (!empty($_POST['mail']) and !empty($_POST['mdp'])) {
    //compte admin
    $mail_par_defaut = "admin";
    $mdp_par_defaut = "admin";
    //**** */   
    $mail_saisi = htmlspecialchars($_POST['mail']);
    $mdp_saisi = htmlspecialchars($_POST['mdp']);
    $recupuser = $bdd->query("SELECT * from membres where mail LIKE '$mail_saisi';");
    $user = $recupuser->fetch();
    $recupmdp = $bdd->query("SELECT * from membres where mdp LIKE '$mdp_saisi';");
    $smdp = $recupmdp->fetch();
    if (($mail_saisi == $mail_par_defaut and $mdp_saisi == $mdp_par_defaut)) {
      $_SESSION['admin'] = 'admin';
      header('location: index.php');
    } elseif ($mail_saisi == $user['mail'] and $mdp_saisi == $smdp['mdp'] and $user['etat'] == 1) {
      $_SESSION['user'] = $mail_saisi;
      header('location: articles.php');
    } elseif ($mail_saisi == $user['mail'] and $mdp_saisi == $smdp['mdp'] and $user['etat'] == -1) {
?>
<script type="text/javascript">

  alert("En attente de l'accepter de l'administrateur ");
</script>
<?php
    }elseif($mail_saisi == $user['mail'] and $mdp_saisi == $smdp['mdp'] and $user['etat'] == 0){
      ?>
<script type="text/javascript">

  alert("Le compte est bloqué contactez nous pour plus d'informations ");
</script>
<?php
    } 
    else {
    ?>
<script type="text/javascript">

  alert("mod de passe ou adrrres incorrect ");
</script><?php

    }
  } else {
?>
<script type="text/javascript">
  alert("veuillez completer tous les champs..");
</script>
<?php
  }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Connexion </title>
  <link rel="stylesheet" href="css.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" type="image/png" href="espace_client/images/logo.png">

</head>

<body>
  <form name="form" method="POST" action="" onsubmit="return conf()">
    <section class="vh-100% gradient-custom">
      <div class="container py-2 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-4 pb-5">

                  <h2 class="fw-bold mb-2 text-uppercase">Connexion</h2>
                  <p class="text-white-50 mb-5 ">Entrez votre identifiant et votre mot de passe !</p>

                  <div class="form-outline form-white mb-4">
                    <input type="text" class="form-control form-control-lg" name="mail" />
                    <label class="form-label">Gmail</label>
                  </div>

                  <div class="form-outline form-white mb-4">
                    <input type="password" class="form-control form-control-lg" name="mdp" />
                    <label class="form-label">Mot de passe</label>
                  </div>

                  <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Mot de passe oublié?</a></p>

                  <button class="btn btn-outline-light btn-lg px-5" type="submit" name="valider">Connexion</button>

                  <div class="d-flex justify-content-center text-center mt-4 pt-1">
                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                    <a href="#!" class="text-white"><i class="fab fa-instagram fa-lg mx-4 px-2"></i></a>
                    <a href="#!" class="text-white"><i class="fab fa-linkedin fa-lg"></i></a>
                  </div>
                </div>
                <div>
                  <p class="mb-0">Vous n'avez pas de compte ? <a href="inscrire.php"
                      class="text-white-50 fw-bold">S'inscrire</a>
                  </p>
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