<?php
session_start();
include ('../../config/conection.php');

$id             =$_POST['idSO'];
$versao         =$_POST['versao_so'];

$consulta = $conn->prepare("SELECT versao_so FROM so ");
$consulta->execute();
    

    if (empty($id)){
        try{
        
            
                foreach ($consulta as $res) {          
                    if($versao == $res['versao_so']){
                        echo "<script language='JavaScript'>
                                alert('Windows já cadastrado!!'); 
                                javascript:window.location='so.php';              
                            </script>";
            
                    }
                }
             

            $stmt = $conn->prepare("INSERT INTO so (versao_so)
                                                    VALUES (:versao_so )");



            $stmt -> bindParam(':versao_so', $versao);

            $stmt->execute();

            if($stmt){
                echo "<script language='JavaScript'>
                            alert('Dados Gravados com sucesso!');  
                            javascript:window.location='so.php';               
                    </script>";
            }

            }catch(PDOException $e) {
                echo "<script language='JavaScript'>
                            alert('Erro ao gravar dados!');  
                            javascript:window.location='so.php';              
                    </script>";
                    echo $e->getMessage();

            }
    }else{

    try{
        $stmt = $conn->prepare("UPDATE so SET versao_so = :versao_so  WHERE idso = $id");



        $stmt -> bindParam(':versao_so', $versao);

        $stmt->execute();

        if($stmt){
            echo    "<script language='JavaScript'>
                        alert('Update feito com sucesso!');  
                        javascript:window.location='so.php';               
                    </script>";
        }

        }catch(PDOException $e) {
            echo    "<script language='JavaScript'>
                        alert('Erro ao atualizar dados!');  
                        javascript:window.location='so.php';               
                    </script>";
                echo $e->getMessage();
        }
    }


?>