<?php
session_start();

if (isset($_SESSION['LOGIN'])) {
    $naam =  $_SESSION['naam'];
    if ($_SESSION['LOGIN'] == true) echo 'bier';
    echo $naam;
};
?>

<a href="/projects/brad/">home</a>