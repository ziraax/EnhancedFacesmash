<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <?php
    require('config.php');
    session_start();
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $query = "SELECT * FROM `users` WHERE username='$username' and password='" . hash('sha256', $password) . "'";
        $result = mysqli_query($conn, $query) or die();
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
        } else {
            $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
        }
    }
    ?>
    <!--
    <form class="box" action="" method="post" name="login">
        <h1 class="box-logo box-title"><a href="https://waytolearnx.com/">Elction</a></h1>
        <h1 class="box-title">Connexion</h1>
        <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
        <input type="password" class="box-input" name="password" placeholder="Mot de passe">
        <input type="submit" value="Connexion " name="submit" class="box-button">
        <p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>

    </form>
        -->
    <div class="sign">
        <form class="form-signin" method="post" name="login">
            <div class="text-center mb-4">
                <img class="mb-4" src="" alt="">
                <h1 class="h3 mb-3 font-weight-normal">Bienvenue sur le site des elections !</h1>
                <p>
                    "Un site web pour créer des elections basé sur le systeme de l'elo des echecs"
                </p>
            </div>
            <div class="form-group">
                <label for="InputEmail1">Nom d'utilisateur</label>
                <input class="form-control" id="InputEmail1" aria-describedby="emailHelp" type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mot de passe</label>
                <input class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" type="password" class="box-input" name="password" placeholder="Mot de passe">
            </div>
            <input type="submit" value="Connexion " name="submit" class="btn btn-primary">
    <!--
            <input class="form-control" id="InputEmail1" aria-describedby="emailHelp" type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
            <input class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" type="password" class="box-input" name="password" placeholder="Mot de passe">
            <input type="submit" value="Connexion " name="submit" class="box-button">
    -->

            <p>Vous êtes nouveau ici ? <a href="register.php">Inscrivez-vous ici</a></p>
            <?php if (!empty($message)) { ?>
                <p class="errorMessage"><?php echo $message; ?></p>
            <?php } ?>
        </form>
    </div>


</body>

</html>