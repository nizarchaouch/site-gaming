<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_admin', 'root', '');
if (!$_SESSION['admin']) {
    header('location: connexion.php');
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="espace_client/css.css">
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="espace_client/images/logo.png">
    <title>Espace Admin</title>

</head>

<body>
    <!---nav--->
    <header>
        <nav class="navbar navbar-expand-md  navbar-light " style="position: fixed; width: 100%; z-index: 1000;">
            <div id="logo"> <a href="index.php"><img src="espace_client/images/logo.png"></a></div>
            <button type="button" class="navbar-toggler bg-light"> <span class="navbar-toggler-icon"
                    data-toggle="collapse" data-target="#nav"></span></button>
            <div class="collapse navbar-collapse justify-content-center" id="nav">
                <ul class="navbar-nav ">
                    <li class="nav-item"><a class="nav-link text-light font-weight-bold px-3 " href="index.php">LES
                            ARTICLES</a></li>
                    <li class="nav-item "><a class="nav-link text-light font-weight-bold px-3 "
                            href="members.php">AFFICHE MEMBRES</a></li>
                    <li class="nav-item"><a class="nav-link text-light font-weight-bold px-3 "
                            href="publier_article.php">PUBLIER UN NOUVEL ARTICLE</a></li>
                    <a class="nav-link text-light font-weight-bold px-1 " href="logout.php">
                        <li><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                <path fill-rule="evenodd"
                                    d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg><i class=" text-drak">DECONNEXION</i>
                    </a>
                </ul>
            </div>
        </nav>
    </header>
    <div id="container" class="pb-5 pt-5">
        <ul class="list-group list-group-horizontal d-flex justify-content-center" style="padding-top: 70px;">
            <li class="list-group-item active col-md-2" aria-current="true">Pseudo</li>
            <li class="list-group-item active col-md-2" aria-current="true">Mail</li>
            <li class="list-group-item active col-md-2" aria-current="true">Tel</li>
            <li class="list-group-item active col-md-2" aria-current="true">Address</li>
            <li class="list-group-item active col-md-3" aria-current="true">Etat </li>
        </ul>
        <ul class="list-group list-group-horizontal d-flex justify-content-center ">
            <li class="list-group-item col-md-2 ">

                <?php
                $recupuser = $bdd->query('SELECT * from membres');
                while ($user = $recupuser->fetch()) {
                ?>
                <p class="pt-3">
                    <?= $user['pseudo'] ?>
                </p>
                <?php
                }
                ?>
            </li>
            <li class="list-group-item col-md-2 ">
                <?php
                $recupuser = $bdd->query('SELECT * from membres');
                while ($user = $recupuser->fetch()) {
                ?>
                <p class="pt-3">
                    <?= $user['mail'] ?>
                </p>
                <?php
                }
                ?>
            </li>
            <li class="list-group-item col-md-2">
                <?php
                $recupuser = $bdd->query('SELECT * from membres');
                while ($user = $recupuser->fetch()) {
                ?>
                <p class="pt-3">
                    <?= $user['tel'] ?>
                </p>
                <?php
                }
                ?>
            </li>
            <li class="list-group-item col-md-2 ">
                <?php
                $recupuser = $bdd->query('SELECT * from membres');
                while ($user = $recupuser->fetch()) {
                ?>
                <p class="pt-3">
                    <?= $user['address'] ?>
                </p>
                <?php
                }
                ?>
                <?php
                ?>
            </li>
            <li class="list-group-item col-md-3 ">
                <?php
                $recupuser = $bdd->query('SELECT * from membres');
                while ($user = $recupuser->fetch()) {
                ?>
                <p class=" pb-1">
                    <a href="accepter_client.php?id=<?= $user['id']; ?>">
                        <button class="btn btn-success "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-person-fill-check" viewBox="1 1 16 16">
                                <path
                                    d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path
                                    d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                            </svg></button></a>
                    <a href="refuse_client.php?id=<?= $user['id']; ?>">
                        <button class="btn btn-warning " name="refuse"> <svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-person-fill-slash"
                                viewBox="0 0 16 16">
                                <path
                                    d="M13.879 10.414a2.501 2.501 0 0 0-3.465 3.465l3.465-3.465Zm.707.707-3.465 3.465a2.501 2.501 0 0 0 3.465-3.465Zm-4.56-1.096a3.5 3.5 0 1 1 4.949 4.95 3.5 3.5 0 0 1-4.95-4.95ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                            </svg></button></a>
                    <a href="supprime_client.php?id=<?= $user['id']; ?>">
                        <button class="btn btn-danger " name="supprime" > <svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-person-x-fill"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z" />
                            </svg></button></a>
                    <?php
                    if ($user['etat'] == 1) {
                            ?>
                    Confirme 
                    <?php
                    } ?>
                    <?php
                    if ($user['etat'] == -1) {
                    ?>
                    En Attente
                    <?php
                    } ?>
                    <?php
                    if ($user['etat'] == 0) {
                        ?>
                    Bloqu??
                    <?php
                    } ?>



                </p>
                <?php
                }
                ?>
            </li>

        </ul>
    </div>

    <footer>
        <section id="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <br><br>
                        <p class="text-secondary">Copyright ??2022 All rights reserved | by Chaouch Nizar </p>
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
    <script src="js.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>