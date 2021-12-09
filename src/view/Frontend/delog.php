<?php
unset($_SESSION['role']);
unset($_SESSION['idUser']);
unset($_SESSION['username']);
header('Location: /');
