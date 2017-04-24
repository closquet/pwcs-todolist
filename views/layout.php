<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Todolist</title>
    <link rel="stylesheet" href="./views/css/screen.css">
</head>
<body>
    <header class="wrapper grid">
        <a href="index.php">Todolist</a>
        <div><?php if (isset($_SESSION['user'])){echo '<span class="user-connected">' . $_SESSION['user']->first_name . '</span><a href="index.php?r=auth&a=getLogout">Déconnexion</a>';}  ?></div>
    </header>
    <?php include $data['view']; ?>
    <footer class="wrapper">
        <p class="ta-right">Made by Eric in 2017</p>
    </footer>
</body>
</html>