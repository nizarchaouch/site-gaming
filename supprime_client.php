<?php
$bdd=new PDO('mysql:host=127.0.0.1;dbname=espace_admin','root','');
if(isset($_GET['id']) and !empty($_GET['id'])){
    $getid=$_GET['id'];
    $recupclient=$bdd->prepare('SELECT * FROM membres WHERE id=?');
    $recupclient->execute(array($getid));
    if($recupclient->rowCount()>0){
        $supprime=$bdd->prepare('DELETE FROM membres WHERE id=?');
        $supprime->execute(array($getid));
        header('location: members.php');
    }else{
        echo "aucun client trouve";
    }
}else{
    echo "aucun identifiant trouve";
}
?>