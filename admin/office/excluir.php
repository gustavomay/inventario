<?php
session_start();

ini_set('default_charset', 'utf-8');

include ('../../config/conection.php');
$id         = $_POST['idoffice'];

try{
 
    $stmt = $conn->prepare("DELETE FROM office WHERE idoffice = $id");
    $stmt->execute();
     
    if($stmt){
        echo "<script language='JavaScript'>
                    alert('Excluido com sucesso!');  
                    javascript:window.location='dados_office.php';               
              </script>";
    }

    } catch(PDOException $e) {
        echo "<script language='JavaScript'>
                    alert('Erro ao excluir dados!');  
                    javascript:window.location='dados_office.php';               
              </script>";
    }
