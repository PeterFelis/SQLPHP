<?php

if (!empty($_POST)) {
    $vnaam = $_POST['vnaam'] ?? "";
    $anaam = $_POST['anaam'] ?? "";
    $geslacht = $_POST['geslacht'] ?? 'x';
    $email = $_POST['email'] ?? "";

    include_once "./db-con.php";
    $db = new DB();
    $db->insertNaam([$vnaam, $anaam, $geslacht, $email]);
}


?>
<form action="./" method="POST">
    <label for "vnaam">Voornaam</label>
    <input type="text" name="vnaam"><br />
    <label for "anaam">Achternaam</label>
    <input type="text" name="anaam"><br />
    <label for "geslacht">Geslacht</label>
    <input type="radio" id="M" name="geslacht" value="M">
    <label for="M">M</label>
    <input type="radio" id="V" name="geslacht" value="V">
    <label for="V">V</label><br />
    <label for "email">Email</label>
    <input type="text" name="email"><br />
    <input type="submit" value="verzenden">
</form>