<?php

ini_set('default_charset', 'utf-8');

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

<script src="../../js/pesquisa.js"></script>

<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>  

<link href="../../css/style.css" rel="stylesheet">
<link rel="stylesheet" href="../../css/mobile.css" media="(max-width: 480px)">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width">

    <?php include "../cabecalho.php"; ?>

    <body>           

        <div id="corpo">
            
        <?php 
            include '../menu.php';
        ?>

            <div id="form">

            <h3>Cadastro de Offices </h3>

                <form id="form_linhas" action="grava.php" method="POST">
                    <div id=formulario_linhas>

                        <div class="form-group row">                        
                            <div class="form-group col-md-1">
                                <label for="idoffice">ID:</label>
                                <input type="text" id="idoffice" name="idoffice" class="form-control mx-sm-3" readonly="readonly">    
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-group col-md-5">
                                <label for="versao_office">Versão Office:</label>
                                <input type="text" id="versao_office"  name="versao_office" class="form-control mx-sm-4" placeholder="Versão Office" required>    
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-group col-md-3">
                                <label for="key_office">Key Office:</label>
                                <input type="key_office" id="key_office" name="key_office" class="form-control mx-sm-3" placeholder="Key Office" required>    
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