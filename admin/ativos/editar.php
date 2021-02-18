<?php

ini_set('default_charset', 'utf-8');

include '../../config/conection.php';

$id = filter_input(INPUT_GET, 'idativos', FILTER_SANITIZE_NUMBER_INT);

?>


<!DOCTYPE html>
<html lang="pt-br">
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
    <head>
        <meta charset="UTF-8">
    </head>
    
    <?php include "../cabecalho.php"; ?>

    <body>



        <div id="corpo">

        <?php 
            include '../menu.php';
        ?>

        <div id="form">

        <h3>Editar Ativos</h3>

        <?php

        //SQL para selecionar o registro
        $ativos = "SELECT * FROM ativos INNER JOIN usuarios as us INNER JOIN setor as se WHERE idativos = $id";
        
        //Seleciona os registros
        $stmt = $conn->prepare($ativos);
        $stmt->execute();
        $row_ativos = $stmt->fetch(PDO::FETCH_ASSOC);

        ?>
        <form method="POST" action="proc_edit_ativos.php">
            <div id=formulario_linhas>
                <input type="hidden" name="idativos" value="<?php if(isset($row_ativos['idativos'])){ echo $row_ativos['idativos']; } ?>">
                
                <div class="form-group">
                    <div class="form-group col-md-2">
                     <label>Usuário: </label>
                        <select type="text" name="usuarios_idusuarios" class="form-control mx-sm-3" required><br><br>
                        <!-- <option>Selecione o usuário desejado.. </option> -->
                                <?php 
                                    $resultado = $conn->prepare("SELECT * FROM usuarios WHERE idusuarios = ".$row_ativos['usuarios_idusuarios']." ORDER BY nome");
                                    $resultado->execute();
									while($res=$resultado->fetch(PDO::FETCH_ASSOC)){     
                                        echo "<option value=".$res['idusuarios'].">".$res['nome']." ".$res['sobrenome']."</option>";                                           
                                     }
                                    $resultado = $conn->prepare("SELECT * FROM usuarios where idusuarios order by nome");
                                    $resultado->execute();
									while($res=$resultado->fetch(PDO::FETCH_ASSOC)){     
                                        echo "<option value=".$res['idusuarios'].">".$res['nome']." ".$res['sobrenome']."</option>";                                           
                                     }
    							 ?>
                        </select>
					</div>
                </div>
                
                <div class="form-group row">
                    <div class="form-group col-md-1">
                        <label>Patrimônio: </label>
                        <input type="text" name="patrimonio" class="form-control mx-sm-3" placeholder="Digite o Novo Patrimônio" value="<?php if(isset($row_ativos['patrimonio'])){ echo $row_ativos['patrimonio']; } ?>"><br><br>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group col-md-1">
                        <label>Memória: </label>
                        <input type="text" name="memoria" class="form-control mx-sm-3" placeholder="Digite a Nova Memória" value="<?php if(isset($row_ativos['memoria'])){ echo $row_ativos['memoria']; } ?>"><br><br>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="form-group col-md-2">
                        <label>Processador: </label>
                        <input type="text" name="processador" class="form-control mx-sm-3" placeholder="Digite o Novo Processador" value="<?php if(isset($row_ativos['processador'])){ echo $row_ativos['processador']; } ?>"><br><br>
                    </div>
                </div>

                <div class="form-group">
                     <div class="form-group col-md-2">
                        <label for="status">Status:</label>
                            <select id="status" name="status" class="form-control mx-sm-3">
                                <option>Selecione o Status...</option>
                                <option value="0">Ativo</option>
                                <option value='1'>Inativo</option>
                            </select>
                       </div>
                </div> 

                <div class="form-group row">
                        <div class="form-group col-md-2">
                            <label for="id_setor">Setor:</label>
                            <select type="text" name="id_setor" class="form-control mx-sm-3" placeholder="Selecione o Novo Setor"> 
                                <?php 
                                    $resultado = $conn->prepare("SELECT * FROM setor WHERE idsetor = ".$row_ativos['id_setor']." ORDER BY nome_setor");
                                    $resultado->execute();
									while($res=$resultado->fetch(PDO::FETCH_ASSOC)){     
                                        echo "<option value=".$res['idsetor'].">".$res['nome_setor']."</option>";;                                           
                                     }
                                     $resultado = $conn->prepare("SELECT * FROM setor WHERE idsetor ORDER BY nome_setor");
                                     $resultado->execute();
                                     while($res=$resultado->fetch(PDO::FETCH_ASSOC)){     
                                         echo "<option value=".$res['idsetor'].">".$res['nome_setor']."</option>";;                                           
                                      }
    							 ?>
                            </select>
                        </div>
                </div>


                
                <input name="SendEditCont" type="submit" class="btn btn-primary" value="Salvar">
            </div>

        </form>


    </body>
</html>

