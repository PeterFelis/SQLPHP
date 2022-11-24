<?php


//ophalen inhoud db
include_once "./db-con.php";
$db = new DB();
$alleData = $db->getData();


// dit is het invoegen van een naam
if (isset($_POST['submit'])) {
    $vnaam = $_POST['vnaam'] ?? exit();
    $anaam = $_POST['anaam'] ?? exit();
    $geslacht = $_POST['geslacht'] ?? 'x';
    $email = $_POST['email'] ?? exit();
    $db->insertNaam([$vnaam, $anaam, $geslacht, $email]);
    $alleData = $db->getData();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Document</title>
</head>

<body>
    <div class='container'>
        <h2>naam toevoegen</h2>
        <form action="<?= htmlspecialchars('./') ?>" method="POST" class="col2 w50">
            <label for "vnaam">Voornaam</label>
            <input type="text" name="vnaam">
            <label for "anaam">Achternaam</label>
            <input type="text" name="anaam">
            <label for "geslacht">Geslacht</label>
            <div>
                <input type="radio" id="M" name="geslacht" value="M">
                <label for="M">M</label>
                <input type="radio" id="V" name="geslacht" value="V">
                <label for="V">V</label>
            </div>
            <label for "email">Email</label>
            <input type="text" name="email">
            <label for "verzenden"></label>
            <input type="submit" name="submit" value="verzenden">
        </form>
    </div>

    <div class='container'>
        <h2>Overzicht in db</h2>
        <div class="w75 col4">
            <?php foreach ($alleData as $regel) : ?>
                <?php foreach ($regel as $item) : ?>
                    <div><?= $item ?></div>
                <?php endforeach ?>
            <?php endforeach ?>
        </div>
    </div>
</body>

</html>