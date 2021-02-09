<?php
session_start();
include ('../../config/conection.php');

function retorna($nome, $conn){
    $result = $conn->query("SELECT * FROM usuarios WHERE nome LIKE '%$nome%' LIMIT 1");
    
    $rows = $result->fetch(PDO::FETCH_ASSOC);
        
        if($rows){
            $valores['id_usuario'] = $rows['id_usuarios'];
            $valores['nome'] = $rows['nome'];
            $valores['setor_idsetor'] = $rows['setor_idsetor'];
            $valores['cpf'] = $rows['cpf'];
            $valores['cracha'] = $rows['cracha'];

        }
        else{
            $valores['nome'] = 'Não Localizado';
        }  
    
    return json_encode($valores);
}

if(isset($_GET['pesquisar'])){
    echo retorna($_GET['pesquisar'],$conn);
}

?>