<?php
session_start();
include ('../../config/conection.php');

$id         = $_POST['idsetor'];


try{
 
    $stmt = $conn->prepare("DELETE FROM setor WHERE idsetor = $id");
    $stmt->execute();
     
    if($stmt){
        echo "<script language='JavaScript'>
                    alert('Excluido com sucesso!');  
                    javascript:window.location='dados_setor.php';               
            </script>";
    }

    } catch(PDOException $e) {
        echo "<script language='JavaScript'>
                    alert('Erro ao excluir dados!');  
                    javascript:window.location='dados_setor.php';               
            </script>";
    }
