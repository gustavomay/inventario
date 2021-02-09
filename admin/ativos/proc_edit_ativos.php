<?php
session_start();
include '../../config/conection.php';

//Verificar se o usuário clicou no botão, clicou no botão acessa o IF e tenta cadastrar, caso contrario acessa o ELSE
$SendEditCont = filter_input(INPUT_POST, 'SendEditCont', FILTER_SANITIZE_STRING);
if($SendEditCont){
    //Receber os dados do formulário
    $id = filter_input(INPUT_POST, 'idativos', FILTER_SANITIZE_NUMBER_INT);
    $usuarios = filter_input(INPUT_POST, 'usuarios_idusuarios', FILTER_SANITIZE_STRING);
    $patrimonio = filter_input(INPUT_POST, 'patrimonio', FILTER_SANITIZE_STRING);
    $memoria = filter_input(INPUT_POST, 'memoria', FILTER_SANITIZE_STRING);
    $processador = filter_input(INPUT_POST, 'processador', FILTER_SANITIZE_STRING);
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
    $setor = filter_input(INPUT_POST, 'idsetor', FILTER_SANITIZE_STRING);

    
    //Inserir no BD
    $ativos = "UPDATE ativos SET usuarios_idusuarios = :usuarios_idusuarios, patrimonio = :patrimonio, memoria = :memoria, processador = :processador, status = :status, idsetor = :idsetor WHERE idativos= :id";
    
    $stmt = $conn->prepare($ativos);
    $stmt->bindParam(':usuarios_idusuarios', $usuarios);
    $stmt->bindParam(':patrimonio', $patrimonio);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':memoria', $memoria);
    $stmt->bindParam(':processador', $processador);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':idsetor', $setor);


    $stmt->execute();

    if($stmt){
        echo "<script language='JavaScript'>
                            alert('Ativo Editado com Sucesso!');  
                            javascript:window.location='dados_ativos.php';               
                    </script>"; 
        
    }else{
        echo "<script language='JavaScript'>
                alert('Erro ao Alterar os dados!');               
            </script>";
    }    
}else{
    echo "<script language='JavaScript'>
                alert('Erro ao alterar os dados!');               
        </script>";
}
