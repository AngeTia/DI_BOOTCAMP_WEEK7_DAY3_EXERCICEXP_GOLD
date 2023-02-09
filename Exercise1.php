<!--
Ce code comporte un formulaire de connexion simple qui poste les données de formulaire à un script de connexion. Le script de connexion vérifie les données de connexion en comparant le nom d'utilisateur et le mot de passe soumis avec des valeurs prédéfinies. Si les données de connexion sont correctes, une variable de session appelée "username" est définie et l'utilisateur est redirigé vers la page d'index. Si l'utilisateur n'est pas connecté, il est redirigé vers la page de connexion. La session sera effacée lorsque l'utilisateur fermera le navigateur.
-->
<!-- Formulaire de connexion -->
<form action="login.php" method="post">
  <h4 class="form-signin-heading"><?php echo $msg; ?></h4>
  <input type="text" name="username" placeholder="Nom d'utilisateur" required />
  <input type="password" name="password" placeholder="Mot de passe" required />
  <button type="submit" name="login">Connexion</button>
</form>

<!-- Script de connexion -->
<?php
session_start();

// Si le formulaire a été soumis
if(isset($_POST['login'])) {
    // Récupération des données de formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérification des données de connexion
    if($username == "MonNomUtilisateur" && $password == "MonMotDePasse") {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    } else {
        $msg = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}

// Si l'utilisateur n'est pas connecté
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>
