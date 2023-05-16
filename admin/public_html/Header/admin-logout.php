<?php
session_start();
unset($_SESSION['loggedIN']);
session_destroy();
header('Location: ..\..\..\\ToyKinhDom/index1.php');
exit();
?>