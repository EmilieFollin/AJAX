<?php
if (!empty($_GET['nom']) && !empty($_GET['prenom'])){
    echo '<p>'.$_GET['nom']. '-'.$_GET['prenom'].'</p>';
}
else if (!empty($_POST['nom']) && !empty($_POST['prenom'])){
    echo '<p>'.$_POST['nom']. '-'.$_POST['prenom'].'</p>';
}


