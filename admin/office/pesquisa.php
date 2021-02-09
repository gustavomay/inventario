<?php
session_start();
include ('../../config/conection.php');

function retorna($fornecedor, $conn){
    if(empty($fornecedor)){
        $valores['fornecedor'] = '';
    }else{
    $result = $conn->query("SELECT * FROM infos WHERE fornecedor LIKE '%$fornecedor%' LIMIT 1");
    
    $rows = $result->fetch(PDO::FETCH_ASSOC);
        
        if($rows){
            $valores['idinfos'] = $rows['idinfos'];
            $valores['natureza_transacao'] = $rows['natureza_transacao'];
            $valores['centro_custo'] = $rows['centro_custo'];
            $valores['conta'] = $rows['conta'];
        }
        else{
            $valores['fornecedor'] = 'Fornecedor Não Localizado';
        }  
    
    return json_encode($valores);
    }
}

if(isset($_GET['pesquisar'])){
    echo retorna($_GET['pesquisar'],$conn);
}

?>