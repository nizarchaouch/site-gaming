<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_admin', 'root', '');
if (!$_SESSION['user']) {
    header('location: connexion.php');
}
if(isset($_GET['del'])){
    $id_del = $_GET['del'];
    unset($_SESSION['panier'][$id_del]);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Panier</title>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="espace_client/images/logo.png">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md  navbar-light " style="position: fixed; width: 100%; z-index: 1000;">
            <div id="logo"> <a href="index.php"><img src="espace_client/images/logo.png"></a></div>
            <button type="button" class="navbar-toggler bg-light"> <span class="navbar-toggler-icon"
                    data-toggle="collapse" data-target="#nav"></span></button>
            <div class="collapse navbar-collapse justify-content-center" id="nav">
                <ul class="navbar-nav ">
                    <li class="nav-item"><a class="nav-link text-light font-weight-bold px-3 " href="articles.php"><svg
                                xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-house" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path fill-rule="evenodd"
                                    d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg><i>ACCUEIL</i></a>
                    </li>
                    <li class="nav-item"><a class="nav-link text-light font-weight-bold px-3 " href="profil.php"><svg
                                xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg><i> PROFIL</i></a>
                    </li>
                    <li class="nav-item"><a class="nav-link text-light font-weight-bold px-3" href="panier.php"><svg
                                xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-cart" viewBox="0 0 16 16">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg><i> CARTE</i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div id="container" class="pb-5 pt-5 ">
        <ul class="list-group ist-group-item-dark list-group-horizontal d-flex justify-content-center"
            style="padding-top: 70px;">
            
            <li class="list-group-item list-group-item-dark d-flex justify-content-center col-md-4" aria-current="true">Nom</li>
            <li class="list-group-item list-group-item-dark col-md-2" aria-current="true">Prix</li>
            <li class="list-group-item list-group-item-dark col-md-2" aria-current="true">Quantite</li>
            <li class="list-group-item list-group-item-dark col-md-2" aria-current="true">Action </li>
        </ul>
        <?php
        $total = 0;
        $ids = array_keys($_SESSION['panier']);
        if (empty($ids)) {
            ?><h5 class=" d-flex justify-content-center " style="margin: 10%;">Votre panier est vide</h5><?php
        } else {
            foreach ($ids as $id):
                $produits = $bdd->query('SELECT * FROM articles where id=' . $id . ' ');
                while ($article = $produits->fetch()) {
                    $total += $article['prix'] * $_SESSION['panier'][$article['id']];
                    ?>
        <ul class="list-group list-group-horizontal d-flex justify-content-center">
            <li class="list-group-item  col-md-1" style=" width: 80%; height: 70%;"><img class="imgp rounded"
                    src=<?php echo 'espace_client/images/' . $article['image'] ?> alt=""></li>
            <li class="list-group-item  col-md-3">- <?php echo $article['titre'] ?><br><?php echo $article['description'] ?></li>
            <li class="list-group-item  col-md-2"><?php echo $article['prix'] ?> dt</li>
            <li class="list-group-item  col-md-2"><?= $_SESSION['panier'][$article['id']] ?></li>
            <li class="list-group-item  col-md-2"><a href="panier.php?del=<?= $article['id'] ?>"><button class="btn btn-danger rounded-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-trash3" viewBox="0 0 16 16">
                        <path
                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                    </svg>
                </button> </a></li>
        </ul>
        <?php
                }
                ;
            endforeach;
        } ?>
        <ul class="list-group ist-group-item-dark list-group-horizontal d-flex justify-content-center">
            <li class="list-group-item list-group-item-light col-md-10 d-flex justify-content-between">
                <h5 class="text-primary">total: <?= $total ?>dt</h5>
                <button class="btn btn-success">Acheter</button>
            </li>
        </ul>
    </div>
</body>
<footer >
        <section id="footer" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <br><br>
                        <p class="text-secondary">Copyright ©2022 All rights reserved | by Chaouch Nizar </p>
                    </div>
                    <div class="col-md-3">
                        <p class="titer">Suivez nous</p>
                        <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg></a>
                        <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-instagram" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                            </svg></a>
                        <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-linkedin" viewBox="0 0 16 16">
                                <path
                                    d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                            </svg></a>
                    </div>
                    <div class="col-md-3" id="mail">
                        <p class="titer">Contact </p>
                        <a href="">
                            <p><i style="font-size:24px" class="fa">&#xf0e0;</i>&nbsp; chaouchnizar@gmail.com</p>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </footer>
</html>