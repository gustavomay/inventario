<?php
session_start();
include ('../../config/conection.php');


    function retorna($cpf, $conn){
        $result = $conn->query("SELECT us.idusuarios,us.nome,us.sobrenome,us.cpf,us.setor_idsetor, se.idsetor, se.nome_setor
        from usuarios as us
            inner join setor as se
                where us.setor_idsetor = se.idsetor
                and us.cpf like '%$cpf%'");
        
        $rows = $result->fetch(PDO::FETCH_ASSOC);
            
            if($rows){
                $valores['idusuarios'] = $rows['idusuarios'];
                $valores['nome'] = $rows['nome'];
                $valores['sobrenome'] = $rows['sobrenome'];
                $valores['cpf'] = $rows['cpf'];
                $valores['idsetor'] = $rows['idsetor'];
                $valores['nome_setor'] = $rows['nome_setor'];
            }
            else{
                $valores['nome'] = 'Não Localizado';
            }
        
        return json_encode($valores);
    }

if(isset($_GET['cpf'])){
    echo retorna($_GET['cpf'],$conn);
}

?>

