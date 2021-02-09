<?php

require_once('../../config/conection.php');

?>

<html>
<!-- Última versão CSS compilada e minificada -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Tema opcional -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Última versão JavaScript compilada e minificada -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>

<script src="../../js/pesquisa_so.js"></script>

<link href="../../css/style.css" rel="stylesheet">
<link rel="stylesheet" href="../../css/mobile.css" media="(max-width: 480px)">
<meta name="viewport" content="width=device-width">

<title>Controle de Ativos - Peccin S.A</title>

    <?php include "../cabecalho.php"; ?>
    
    <body> 
    
        <div id="corpo">
            
            <?php
                include '../menu.php';
            ?>

            <div id="form">            

            <h3>Cadastro de Sistema Operacional</h3>
            
                <form id="form_linhas" action="grava.php" method="POST">
                    <div id=formulario_linhas>

                        <div class="form-group row">                        
                            <div class="form-group col-md-1">
                                <label for="id_protocolo">ID:</label>
                                <input type="text" id="idSO" name="idSO" class="form-control mx-sm-3" readonly="readonly">    
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="form-group col-md-3">
                                <label for="versao_so">Versão Sistema Operacional:</label>
                                <input type="versao_so" id="versao_so"  name="versao_so" class="form-control mx-sm-4" placeholder="Versão S.O" required>    
                            </div>
                        </div>
                    
                    
                    </div>
                    
                    <div id="buttons">                       
                        <button type="submit" class="btn btn-primary">Salvar</button>                         
                        <button type="reset" class="btn btn-warning">Limpar</button>                          
                    </div>

                </form>
            </div>               
        </div>            
    </body>

</html>