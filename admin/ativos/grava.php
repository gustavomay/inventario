<?php
session_start();
include ('../../config/conection.php');

$id               =$_POST['idativos'];
$patrimonio       =$_POST['patrimonio'];
$idusuarios       =$_POST['usuarios_idusuarios'];
$tag              =$_POST['service_tag'];
$memoria          =$_POST['memoria'];
$processador      =$_POST['processador'];
$fabricante       =$_POST['fabricante'];
$so               =$_POST['SO_idSO'];
$office           =$_POST['office_idoffice'];
$setor            =$_POST['id_setor'];
$status           =$_POST['status'];
$tipo             =$_POST['tipo'];


$consulta = $conn->prepare("SELECT idativos,patrimonio FROM ativos");
$consulta->execute();


////////////////////////////////////Verificação se ID está vazia faz o insert e verifica se patrimonio e id do ativo já cadastrados ///////////////////////////////

    if (empty($id)){
        try{

            foreach ($consulta as $res) {
                if($patrimonio == $res['patrimonio']){
                    echo "<script language='JavaScript'>
                            alert('Patrimônio já cadastrado!!'); 
                            javascript:window.location='ativos.php'; 
                        </script>";
                    exit();
                }
        
                if($id == $res['idativos']){
                    echo "<script language='JavaScript'>
                            alert('Computador já cadastrado!!'); 
                            javascript:window.location='ativos.php';
                        </script>";
                    exit();
                }
            }

//////////////////////////// Insert ////////////////////////////////////////////////////////////////////////

            $stmt = $conn->prepare("INSERT INTO ativos (usuarios_idusuarios, patrimonio, service_tag, status, memoria, processador, fabricante, SO_idSO, office_idoffice, id_setor, tipo)
                                                    VALUES (:usuarios_idusuarios, :patrimonio, :service_tag, :status, :memoria, :processador, :fabricante, 
                                                    :SO_idSO, :office_idoffice, :id_setor, :tipo)");



            $stmt -> bindParam(':usuarios_idusuarios', $idusuarios);
            $stmt -> bindParam(':patrimonio', $patrimonio);
            $stmt -> bindParam(':service_tag', $tag);
            $stmt -> bindParam(':memoria', $memoria);
            $stmt -> bindParam(':processador', $processador);
            $stmt -> bindParam(':fabricante', $fabricante);
            $stmt -> bindParam(':SO_idSO',$so);
            $stmt -> bindParam(':office_idoffice', $office);
            $stmt -> bindParam(':id_setor', $setor);
            $stmt -> bindParam(':status', $status);
            $stmt -> bindParam(':tipo', $tipo);
            
            $stmt->execute();

            if($stmt){                
                echo "<script language='JavaScript'>
                            alert('Dados Gravados com sucesso!');  
                            javascript:window.location='ativos.php';               
                    </script>";               
            }

            }catch(PDOException $e) {
                echo "<script language='JavaScript'>
                            alert('Erro ao gravar dados!');               
                    </script>";
            }
            echo $e;
    }else{
///////////////////////////////// Update ////////////////////////////////////////////////////////////
    try{
        
        $stmt = $conn->prepare("UPDATE ativos SET usuarios_idusuarios = :usuarios_idusuarios, patrimonio = :patrimonio, service_tag = :service_tag, memoria = :memoria,
                                                    processador = :processador, status = :status, fabricante = :fabricante, SO_idSO = :SO_idSO, office_idoffice = :office_idoffice,
                                                    id_setor = :id_setor, tipo = :tipo WHERE idativos = $id");



        $stmt -> bindParam(':usuarios_idusuarios', $idusuarios);
        $stmt -> bindParam(':patrimonio', $patrimonio);
        $stmt -> bindParam(':service_tag', $tag);
        $stmt -> bindParam(':memoria', $memoria);
        $stmt -> bindParam(':processador', $processador);
        $stmt -> bindParam(':fabricante', $fabricante);
        $stmt -> bindParam(':SO_idSO',$so);
        $stmt -> bindParam(':office_idoffice', $office);
        $stmt -> bindParam(':id_setor',$setor);
        $stmt -> bindParam(':status', $status);
        $stmt -> bindParam(':tipo', $tipo);

        $stmt->execute();

        if($stmt){
            echo "<script language='JavaScript'>
                        alert('Update feito com sucesso!');  
                        javascript:window.location='ativos.php';               
                </script>";
        }

        }catch(PDOException $e) {
            echo "<script language='JavaScript'>
                        alert('Erro ao atualizar dados!');  
                        javascript:window.location='ativos.php';            
                </script>";
        }
    }
   

?>