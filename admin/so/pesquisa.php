<?php

include ('../../config/conection.php');
session_start();

function retorna($protocolo, $conn){
    $result = $conn->query("SELECT * FROM so WHERE versao_so LIKE '%$versao_so%' LIMIT 1");
    
    $rows = $result->fetch(PDO::FETCH_ASSOC);
        
        if($rows){
            $valores['idSO']                = $rows['idSO'];
            $valores['versao_so']           = $rows['versao_so'];

        }
        else{
            $valores['versao_so'] = 'Sistema Operacional Não Localizado';
        }  
    
    return json_encode($valores);
}

if(isset($_GET['pesquisar'])){
    echo retorna($_GET['pesquisar'],$conn);
}

?>