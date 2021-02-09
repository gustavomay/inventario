<?php

session_start();
include ('config/conection.php');

    $login = $_POST['email'];
    $senha = $_POST['senha'];

    if(empty($login) or empty($senha)){
        echo "<script language='JavaScript'>
                    alert('Favor insira usuário e senha'); 
                    javascript:window.location='login.html';             
                </script>";
    }else{
        //$hashPassword = md5($senha);
        $stmt = $conn->prepare("SELECT idusuarios,email,senha,tipo,nome FROM usuarios WHERE email = '$login' and senha = '$senha'");
        $stmt->execute();

        if(count($stmt)){
            foreach ($stmt as $res) {          
                $login = $res['email'];
                $password = $res['senha'];  
                $tipo = $res['tipo']; 
                $nome = $res['nome'];  
            }
            
            if ($login == $login and $senha == $password and $tipo == 0){
                header('Location: admin/index.php');
                $_SESSION['nome'] = $login;                
            }else{
                echo "<script language='JavaScript'>
                        alert('Usuário ou senha Incorreto!');  
                        javascript:window.location='login.html';         
                    </script>";
            }

            if($login == $login and $senha == $password and $tipo == 1){                
                header('Location: user/index.php');                    
                $_SESSION['nome'] = $login;
                
            }else{
                echo "<script language='JavaScript'>
                        alert('Você não possui acesso ao sistema!'); 
                        javascript:window.location='login.html';                 
                    </script>";
            }

            if($login == $login and $senha == $password and $tipo == 2){
                echo "<script language='JavaScript'>
                        alert('Você não possui acesso ao sistema!');                 
                    </script>";
            } 
        }      
            
        
    }


?>