<?php
session_start();
if(!$_SESSION['email']) {
	header('Location: ../admin/index.php');
}
?>