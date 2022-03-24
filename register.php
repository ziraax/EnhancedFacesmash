<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <?php
    require('config.php');
    if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])) {
        // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($conn, $username);
        // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($conn, $email);
        // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // récuperer le booleen organisateur

        if (isset($_REQUEST['isOrganizer'])) {
            $isOrganizer = stripslashes($_REQUEST['isOrganizer']);
            $isOrganizer = mysqli_real_escape_string($conn, $isOrganizer);
            $isOrganizer = true;
        } else {
            $isOrganizer = false;
        }




        //requéte SQL + mot de passe crypté
        $query = "INSERT into `users` (username, email, password, isOrganizer)
              VALUES ('$username', '$email', '" . hash('sha256', $password) . "','$isOrganizer')";
        // Exécuter la requête sur la base de données
        $res = mysqli_query($conn, $query);
        if ($res) {
            echo "<div class='sucess'>
                    <h3>Vous êtes inscrit avec succès.</h3>
                    <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
                </div>";
        }
    } else {
    ?>
    <!--
        <form class="box" action="" method="post">
            <h1 class="box-title">S'inscrire</h1>
            <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
            <input type="text" class="box-input" name="email" placeholder="Email" required />
            <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
            <input id="bool" type="checkbox" class="box-checkbox" name="isOrganizer" placeholder="Organisateur ?">
            <label for="bool">Organisateur?</label>
            <input type="submit" name="submit" value="S'inscrire" class="box-button" />
            <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
        </form>
    -->
    <div class="sign">
        <form class="form-signin">
            <div class="text-center mb-4">
                <img class="mb-4" src="" alt="">
                <h1 class="h3 mb-3 font-weight-normal">Bienvenue sur le site des elections !</h1>
                <p>
                    "Un site web pour créer des elections basé sur le systeme de l'elo des echecs"
                </p>
            </div>
            <form>
                <div class="form-group">
                    <label for="InputEmail1">Nom d'utilisateur</label>
                    <input name="username" type="texte" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="InputEmail1">Email</label>
                    <input name="email" type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Email">
                    <small id="emailHelp" class="form-text text-muted">Nous ne partagerons pas ton adresse mail.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
                </div>
                <div class="form-group form-check">
                    <input name="isOrganizer" type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Organisateur ?</label>
                </div>
                <button type="submit" class="btn btn-primary">S'inscrire</button>
                <p>Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
            </form>
        </form>
    </div>   

    <?php } ?>
</body>

</html>