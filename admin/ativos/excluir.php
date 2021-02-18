<?php
session_start();

ini_set('default_charset', 'utf-8');

include ('../../config/conection.php');

$id         = $_POST['idativos'];


try{
 
    $stmt = $conn->prepare("DELETE FROM ativos WHERE idativos = $id");
    $stmt->execute();
     
    if($stmt){
        echo "<script language='JavaScript'>
                    alert('Ativo Excluido com sucesso!');  
                    javascript:window.location='dados_ativos.php';               
            </script>";
    }

    } catch(PDOException $e) {
        echo "<script language='JavaScript'>
                    alert('Erro ao excluir dados!');  
                    javascript:window.location='dados_ativos.php';
            </script>";
    }
