<?php
include '../config/conection.php';

$consulta1 = $conn->query("SELECT COUNT(idSO) as Total_so FROM so");
$so = $consulta1->fetch(PDO::FETCH_ASSOC); 

$consulta2 = $conn->query("SELECT COUNT(idusuarios) as Total_users FROM usuarios");
$usuarios = $consulta2->fetch(PDO::FETCH_ASSOC); 

$consulta3 = $conn->query("SELECT COUNT(idativos) as Total_ativos FROM ativos");
$ativos = $consulta3->fetch(PDO::FETCH_ASSOC); 

$consulta4 = $conn->query("SELECT COUNT(idoffice) as Total_office FROM office");
$office = $consulta4->fetch(PDO::FETCH_ASSOC);

?>

<html>
<!-- Última versão CSS compilada e minificada -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Tema opcional -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Última versão JavaScript compilada e minificada -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript" src="../js/tablesorter/js/jquery.tablesorter.js"></script>
<script type="text/javascript" src="../js/tablesorter/js/jquery.tablesorter.widgets.js"></script>

<script src="../js/script.js"></script>
<link href="../css/style.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width">

<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script>

        google.charts.load('current', {'packages':['corechart']});

        function graphic (){

            var tabela = new google.visualization.DataTable();;
            tabela.addColumn('string','categorias');
            tabela.addColumn('number','valores');
            tabela.addRows([

                ['Usuários Cadastrados',<?php echo $usuarios['Total_users']; ?>],
                ['Ativos Cadastrados',<?php echo $ativos['Total_ativos']; ?>],
                ['Sistemas Operacionais Cadastrados',<?php echo $so['Total_so']; ?>],
                ['Offices Cadastrados',<?php echo $office['Total_office']; ?>]
            ]);

            var opcoes = {
                'title':'Cadastros Gerais do Sistema'

        };

            var grafico = new google.visualization.PieChart(document.getElementById('table_itens_index'));
            grafico.draw(tabela, opcoes);
    }

    google.charts.setOnLoadCallback(graphic);
    </script>
</head>
</html>

<title>TI003 - Inventário de Ativos - Peccin S.A</title>
    <head>  
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <div id="cabecalho">           
            <table id="table_cabecalho">
                <tr>
                    <td>
                        <div id="imagem">
                            <img src="../images/peccin.png">
                        </div>
                    </td> 
                    <td>
                        <div id="title">
                            <h2>
                                Inventário de Ativos - Peccin S.A
                            </h2>
                        </div>
                    </td>
                    <td>
                        <div id="logout">
                            <label> Bem-Vindo! <?session_start(); echo $_SESSION['nome'];?></label> 
                            <a class="btn btn-danger" value="logout" href="http://ptransfer.peccin.local/ti003/login.html">Logout</a>
                        </div>           
                    </td>
                </tr>
            </table>
        </div>
    </head>

    <body>           

        <div id="corpo_index">

            <div id="nav_bar">
                <ul class="nav flex-column">	
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="index.php" role="tab" aria-controls="home" aria-selected="true">Home</a>				                    
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link active" href="usuarios/usuarios.php">Cad Usuários</a>
                            <ul>
                                <li>
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="usuarios/dados_usuarios.php" role="tab" aria-controls="home" aria-selected="true">Dados</a> 
                                </li>                                
                            </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="ativos/ativos.php">Cad Ativos</a>
                            <ul>
                                <li>
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="ativos/dados_ativos.php" role="tab" aria-controls="home" aria-selected="true">Dados</a> 
                                </li>                                
                            </ul>
                    </li>
                    
                    
                    <li class="nav-item">
                        <a class="nav-link active" href="office/office.php">Cad Office</a>
                            <ul>
                                <li>
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="office/dados_office.php" role="tab" aria-controls="home" aria-selected="true">Dados</a> 
                                </li>                                
                            </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="so/so.php">Cad S.O</a>
                            <ul>
                                <li>
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="so/dados_so.php" role="tab" aria-controls="home" aria-selected="true">Dados</a> 
                                </li>                                
                            </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="#">Termos</a>  
                        
                        <ul>
                                <li>
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="termos/gera_termo.php" role="tab" aria-controls="home" aria-selected="true">Gerar Termo</a> 
                                </li>                                
                        </ul>
                        
                        <ul>
                                <li>
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="termos/excluir_termo.php" role="tab" aria-controls="home" aria-selected="true">Excluir Termo</a> 
                                </li>                                
                        </ul>                            
                    </li>

                  </ul>
            </div> 

        
            <div id="table_itens_index">
                
            </div>               
        </div>            
    </body>

</html>
