<?php
session_start();
include ('../../config/conection.php');

function retorna($patrimonio, $conn){
    $result = $conn->query("SELECT * FROM ativos as ap 
                                inner join usuarios as u 
                                    WHERE u.idusuario = ap.usuarios_idusuarios 
                                    and patrimonio = $patrimonio LIMIT 1");
    
    $rows = $result->fetch(PDO::FETCH_ASSOC);
        
        if($rows){
            $valores['idativos'] = $rows['idativos'];
            $valores['usuarios_idusuarios'] = $rows['usuarios_idusuarios'];
            $valores['tag'] = $rows['service_tag'];
            $valores['office_idoffice'] = $rows['office_idoffice'];
            $valores['key_office'] = $rows['key_office'];  
            $valores['idsetor'] = $rows['idsetor'];  
            $valores['idSO'] = $rows['idSO']; 
            $valores['tipo'] = $rows['tipo'];

        }
        else{
            $valores['patrimonio'] = 'Não Localizado';
        }  
    
    return json_encode($valores);
}

if(isset($_GET['pesquisar'])){
    echo retorna($_GET['pesquisar'],$conn);
}

?>