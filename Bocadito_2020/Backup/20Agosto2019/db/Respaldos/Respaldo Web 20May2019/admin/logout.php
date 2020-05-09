<?php

session_start();
unset ($SESSION['tipo_usuario']);
session_destroy();

header('Location: loginadmin.php');

?>