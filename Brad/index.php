<?php
session_start();

if (isset($_POST['loguit'])) {
    session_destroy();
    header("Refresh:0");
}

if (isset($_POST['submit'])) {
    $naam = filter_input(INPUT_POST, 'naam', FILTER_SANITIZE_SPECIAL_CHARS);
    $_SESSION['naam'] = $naam;
    if (trim($naam) == "Peter") $_SESSION['LOGIN'] = true;
    header('Location: /projects/brad/test.php');
}


?>


<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <label for:input>naam</label>
    <input type="text" name="naam">
    <input type="submit" name="submit">
</form>

<?php
if (isset($_SESSION['LOGIN'])) {
    if ($_SESSION['LOGIN'] == true) : ?>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="submit" name="loguit" value='loguit'>
        </form>
<?php endif;
};
