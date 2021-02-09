<?php

include '../../config/conection.php';
$consulta = $conn->query("SELECT us.nome, us.sobrenome, at.idativos, at.patrimonio, at.service_tag, at.memoria, at.processador, at.fabricante, at.status, sistema.versao_so, of.versao_office, of.key_office, se.nome_setor, at.tipo						
    FROM usuarios as us				
        inner join ativos as at
        inner join setor as se                                                
        inner join so as sistema
        inner join office as of
            where at.usuarios_idusuarios = us.idusuarios
            and se.idsetor = at.id_setor
            and sistema.idSO = at.SO_idSO
            and of.idoffice = at.office_idoffice 
            ORDER BY idativos
           ");

?>

<html>
<!-- Última versão CSS compilada e minificada -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Tema opcional -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
 <!-- Importando o jQuery -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- Importando o js do bootstrap -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="../../js/tablesorter/js/jquery.tablesorter.js"></script>
<script type="text/javascript" src="../../js/tablesorter/js/jquery.tablesorter.widgets.js"></script>


<script src="../../js/script.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href="../../css/style.css" rel="stylesheet">
<link rel="stylesheet" href="../../css/mobile.css" media="(max-width: 720px)">
<meta name="viewport" content="width=device-width">


<title>TI003 - Inventário de Ativos - Peccin S.A</title>

    <?php include "../cabecalho.php"; ?>

    <body>           

        <div id="corpo_index">

        <div id="pesquisar">
            <input name="search" id="search" class="form-control mr-sm-2" type="search" placeholder="Pesquisar Ativos" aria-label="Pesquisar">
        </div>

        <?php 
            include '../menu.php';
        ?>


            <div id="table_itens_index" id="table">
                <table table class="table size table-hover table-striped" class="table table-hover" class="tablesorter">
                    <thead>
                        <tr>
                            <th class="blue"  scope="col">ID:</th>
                            <th class="blue"  scope="col">Usuario:</th>
                            <th class="blue"  scope="col">Patrimonio:</th>
                            <th class="blue"  scope="col">Tag:</th>
                            <th class="blue"  scope="col">Memoria:</th>                                
                            <th class="blue"  scope="col">Processador:</th>
                            <th class="blue"  scope="col">Fabricante:</th>
                            <th class="blue"  scope="col">Status:</th>
                            <th class="blue"  scope="col">SO:</th>                                
                            <th class="blue"  scope="col">Office:</th>
                            <th class="blue"  scope="col">Key Office:</th>
                            <th class="blue"  scope="col">Setor:</th>  
                            <th class="blue"  scope='col'>Tipo:</th>                              
                        </tr>
                    </thead>
                    <tbody id="body_table">                                                 
                            <?php while ($ativos = $consulta->fetch(PDO::FETCH_ASSOC)) {                             
                                echo '<form action="confirmaExclusao.php" method="POST">';
                                echo '<tr>';
                                echo '<td><input type="text" name="idativos" id="idativos" value='.$ativos['idativos'].' size="1" readonly="readonly" class="blue"></td>';
                                echo '<td>'.$ativos['nome'].' '.$ativos['sobrenome'].'</td>';
                                echo '<td>'.$ativos['patrimonio'].'</td>';
                                echo '<td>'.$ativos['service_tag'].'</td>';
                                echo '<td>'.$ativos['memoria'].'</td>';
                                echo '<td>'.$ativos['processador'].'</td>'; 
                                echo '<td>'.$ativos['fabricante'].'</td>';
                                if($ativos['status'] == 0){
                                    echo '<td>Ativo</td>';
                                }
                                if($ativos['status'] == 1){
                                    echo '<td>Inativo</td>';
                                }
                                echo '<td>'.$ativos['versao_so'].'</td>';
                                echo '<td>'.$ativos['versao_office'].'</td>';
                                echo '<td>'.$ativos['key_office'].'</td>';
                                echo '<td>'.$ativos['nome_setor'].'</td>';
                                if($ativos['tipo'] == 0){
                                    echo '<td>Desktop</td>';
                                }
                                if($ativos['tipo'] == 1){
                                    echo '<td>Notebook</td>';
                                }
                                echo '<td><a class="btn btn-primary" href="../ativos/editar.php?idativos='.$ativos['idativos'].'">Editar</a></td>';
                                echo '<td><button type="submit" class="btn btn-danger">Excluir</button></td>';
                                echo '</tr>';
                                echo '</form>';
                            }
                          ?>                   
                    </tbody>
                </table>
            </div>               
        </div>
  </div>
</div>
</body>
</html>
