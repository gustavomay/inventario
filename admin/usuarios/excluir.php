<?php
session_start();

ini_set('default_charset', 'utf-8');

include ('../../config/conection.php');

$id         = $_POST['idusuarios'];


try{
 
    $stmt = $conn->prepare("DELETE FROM usuarios WHERE idusuarios = $id");
    $stmt->execute();
     
    if($stmt){
        echo "<script language='JavaScript'>
                    alert('Excluido com sucesso!');  
                    javascript:window.location='dados_usuarios.php';               
            </script>";
    }

    } catch(PDOException $e) {
        echo "<script language='JavaScript'>
                    alert('Erro ao excluir dados!');  
                    javascript:window.location='dados_usuarios.php';               
            </script>";
    }
