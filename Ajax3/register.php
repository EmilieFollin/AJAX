<?php
include 'index.php'
?>
<form id="forminscription" method="POST" action="ajax/inscription.php" form="forminscription">

    <label for="pseudo">Pseudo</label>
    <span id="error_pseudo"></span>
    <input type="text" name="pseudo">

    <label for="email">Email</label>
    <span id="error_email"></span>
    <input type="email" name="email">

    <label for="password">Password</label>
    <span id="error_password"></span>
    <input type="password" name="password">

    <label for="password2">Password verification</label>
    <span id="error_password2"></span>
    <input type="password" name="password2">

    <button type="submit" >Envoi</button>
</form>
