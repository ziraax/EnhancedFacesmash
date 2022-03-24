<?php
// Initialiser la session
session_start();
require('config.php');
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit();
} else {
}
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded" aria-label="Twelfth navbar example">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Voter</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Organiser</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Deconnexion</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div>
      <div class="bg-light p-5 rounded">
        <div class="col-sm-8 mx-auto">
          <h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
          <p>C'est ici que vous trouverez les elections en cours :</p>
          <p>
            <a class="btn btn-primary" href="/docs/5.0/components/navbar/" role="button">View navbar docs »</a>
          </p>
        </div>
      </div>
    </div>


    <section>
      <?php
      $query = "SELECT * FROM polls";
      $result = mysqli_query($conn, $query);
      ?>

      <?php
      if (mysqli_num_rows($result) > 0) {
      ?>

        <table class="table table-bordered election-list">
          <thead>
            <tr>
              <th scope="col">Titre</th>
              <th scope="col">Description</th>
              <th scope="col">Action</th>

            </tr>
          </thead>
      
      <?php
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
      ?>
          <tbody>
            <tr>
                <td><?php echo $row["title"]; ?></td>
                <td><?php echo $row["description"]; ?></td>
                <td>
                  <a href="update.php?userid=184" class="btn btn-primary mb-1" title="Update Record">Edit</a>
                  <a href="delete.php?id=184" class="btn btn-danger mt-1">Delete</a>
                </td>
              </tr>
          </tbody>
            
      <?php
        $i++;}
      ?>
        </table>
      <?php
      } else {
        echo "No result found";
      }
      ?>
    </section>
  </div>
</body>

</html>