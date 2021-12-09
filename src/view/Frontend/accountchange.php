<?php
// Si le role dans session est visiteur alors on redirige vers la page d'accueil
if ($_SESSION['role'] == 'visiteur') {
  header('Location: /');
}
var_dump($_POST);