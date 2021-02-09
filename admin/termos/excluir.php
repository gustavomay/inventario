<?php
session_start();
include ('../../config/conection.php');

$id           =$_POST['idusuarios'];
$caminho      ='';

$consulta = $conn->prepare("SELECT nome,sobrenome,caminho_download,idusuarios FROM usuarios where idusuarios = $id");
$consulta->execute();
while ($usuario = $consulta->fetch(PDO::FETCH_ASSOC)){
    $nome = $usuario['nome'];
    $sobrenome = $usuario['sobrenome'];
    $id = $usuario['idusuarios'];
    $origem = $usuario['caminho_download'];
}

$destino = '../../uploads/'.$nome.'.pdf';

$move = rename($origem, $destino);

try{        
    $stmt = $conn->prepare("UPDATE usuarios SET caminho_download = :caminho_download WHERE idusuarios = $id");

    $stmt -> bindParam(':caminho_download', $caminho);
    $stmt->execute();

    if($stmt and $move){
        echo    "<script language='JavaScript'>
                    alert('Excluído com sucesso!');  
                    javascript:window.location='excluir_termo.php';             
                </script>";
    }

    }catch(PDOException $e) {
        echo    "<script language='JavaScript'>
                    alert('Erro ao excluir termo!');  
                    javascript:window.location='excluir_termo.php';             
                </script>";
            echo $e->getMessage();
    }

?>