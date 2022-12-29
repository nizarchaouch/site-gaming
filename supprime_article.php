<?php
$bdd=new PDO('mysql:host=127.0.0.1;dbname=espace_admin','root','');
if(isset($_GET['id']) and !empty($_GET['id'])){
    $getid=$_GET['id'];
    $recuparticle=$bdd->prepare('SELECT * FROM articles WHERE id=?');
    $recuparticle->execute(array($getid));
    if($recuparticle->rowCount()>0){
        $deletearticle=$bdd->prepare('DELETE FROM articles WHERE id=?');
        $deletearticle->execute(array($getid));
        header('location: index.php');
    }else{
        echo "aucun article trouve";
    }
}else{
    echo "aucun identifiant trouve";
}
?>