<?php
session_start();
include ('../../config/conection.php');

$id           =$_POST['idusuarios'];
$nome         =$_POST['nome'];
$sobrenome    =$_POST['sobrenome'];
$setor        =$_POST['id_setor'];
$email        =$_POST['email'];
$senha        =$_POST['senha'];
$tipo         =$_POST['tipo'];
$cpf          =$_POST['cpf'];
$cracha       =$_POST['cracha'];
$caminho      ="";

$consulta = $conn->prepare("SELECT nome,idusuarios,email FROM usuarios");
$consulta->execute();   


    if (empty($id)){
        try{

           
            foreach ($consulta as $res) {
                if($email == $res['email']){
                    echo "<script language='JavaScript'>
                            alert('Usuário já cadastrado!!'); 
                            javascript:window.location='usuarios.php'; 
                        </script>";
                    exit();
                }
        
                if($id == $res['idusuarios']){
                    echo "<script language='JavaScript'>
                            alert('Usuário já cadastrado!!'); 
                            javascript:window.location='usuarios.php';
                        </script>";
                    exit();
                }
            }

                $stmt = $conn->prepare("INSERT INTO usuarios (nome, sobrenome, setor_idsetor, email, senha, tipo, cpf, cracha, caminho_download)
                                                        VALUES (:nome, :sobrenome, :setor_idsetor, :email, :senha, :tipo, :cpf, :cracha, :caminho_download)");



                $stmt -> bindParam(':nome', $nome);
                $stmt -> bindParam(':sobrenome', $sobrenome);
                $stmt -> bindParam(':setor_idsetor', $setor);
                $stmt -> bindParam(':email', $email);
                $stmt -> bindParam(':senha' ,$senha);
                $stmt -> bindParam(':tipo' ,$tipo);
                $stmt -> bindParam(':cpf', $cpf);
                $stmt -> bindParam(':cracha', $cracha);
                $stmt -> bindParam(':caminho_download', $caminho);

                $stmt->execute();

                if($stmt){
                    echo "<script language='JavaScript'>
                                alert('Usuário Cadastrado com Sucesso!'); 
                                javascript:window.location='usuarios.php';               
                        </script>";
                }
            
        }catch(PDOException $e) {
            echo "<script language='JavaScript'>
                        alert('Erro ao gravar dados!');  
                        javascript:window.location='usuarios.php';
                </script>";
                echo $e->getMessage();
        }
    }else{

    try{
        $stmt = $conn->prepare ("UPDATE usuarios SET nome = :nome, sobrenome = :sobrenome, 
                                                    setor_idsetor = :setor_idsetor, email = :email, senha = :senha,
                                                    tipo = :tipo, cpf = :cpf, cracha = :cracha WHERE idusuarios = $id"); 



        $stmt -> bindParam(':nome', $nome);
        $stmt -> bindParam(':sobrenome', $sobrenome);
        $stmt -> bindParam(':setor_idsetor', $setor);
        $stmt -> bindParam(':email', $email);
        $stmt -> bindParam(':senha' ,$senha);
        $stmt -> bindParam(':tipo' ,$tipo);
        $stmt -> bindParam(':cpf', $cpf);
        $stmt -> bindParam(':cracha', $cracha);

        $stmt->execute();

        if($stmt){
            echo    "<script language='JavaScript'>
                        alert('Update feito com sucesso!');  
                        javascript:window.location='usuarios.php';               
                    </script>";
        }

        }catch(PDOException $e) {
            echo    "<script language='JavaScript'>
                        alert('Erro ao atualizar dados!');  
                        javascript:window.location='usuarios.php';             
                    </script>";
                echo $e->getMessage();
        }
    }


?>