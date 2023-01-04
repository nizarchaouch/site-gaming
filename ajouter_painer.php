<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_admin', 'root', '');
if (!$_SESSION['user']) {
    header('location: connexion.php');
}
if(!isset($_SESSION['panier'])){
    $_SESSION['panier'] = array();
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $recuparticles = $bdd->query('SELECT * FROM articles where id='.$id.'');
    $produit = $recuparticles->fetch();
    if(empty($produit)){
        die("ce produit n'existe pas");
    }
    if(isset($_SESSION['panier'][$id])){
        $_SESSION['panier'][$id]++;
        header("Location:articles.php");
    }else{
        $_SESSION['panier'][$id] = 1;
        header("Location:articles.php");
    }
}

?>