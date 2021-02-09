<?php
session_start();
include ('../../config/conection.php');

$id         =$_POST['idoffice'];
$versao     =$_POST['versao_office'];
$key        =$_POST['key_office'];

$consulta = $conn->prepare("SELECT idoffice, versao_office, key_office FROM office");
$consulta->execute();      
    
    if (empty($id)){
        try{

           
                foreach ($consulta as $res) {          
                    if($key == $res['key_office']){
                        echo "<script language='JavaScript'>
                                alert('Office já Cadastrado!!'); 
                                javascript:window.location='office.php';              
                            </script>";
        
                    }
                }
    
                $stmt = $conn->prepare("INSERT INTO office (versao_office, key_office)
                                                        VALUES (:versao_office, :key_office)");



                $stmt -> bindParam(':versao_office', $versao);
                $stmt -> bindParam(':key_office', $key);

                $stmt->execute();

                if($stmt){
                    echo "<script language='JavaScript'>
                                alert('Dados Gravados com sucesso!'); 
                                javascript:window.location='dados_office.php';             
                        </script>";
                }
        
        }catch(PDOException $e) {
            echo "<script language='JavaScript'>
                        alert('Erro ao gravar dados!');  
                        javascript:window.location='office.php';               
                </script>";
        }
    }else{

    try{
        
        $stmt = $conn->prepare("UPDATE office SET versao_office = :versao_office, key_office = :key_office, WHERE idoffice = $id");



        $stmt -> bindParam(':versao_office', $versao);
        $stmt -> bindParam(':key_office', $key);

        $stmt->execute();

        if($stmt){
            echo "<script language='JavaScript'>
                        alert('Update feito com sucesso!');  
                        javascript:window.location='linhas.php';               
                </script>";
        }

        }catch(PDOException $e) {
            echo "<script language='JavaScript'>
                        alert('Erro ao atualizar dados!');  
                                    
                </script>";
            
        }
    }


?>