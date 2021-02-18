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

<script src="../../js/pesquisa_usuarios.js"></script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>  

<script>
jQuery(function($){
  $("#cpf").mask("999.999.999-99");
});

</script>

<link href="../../css/style.css" rel="stylesheet">
<link rel="stylesheet" href="../../css/mobile.css" media="(max-width: 720px)">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width">

        <?php include "../cabecalho.php"; ?>

     
    <body>           

        <div id="corpo">
             
            <?php
                include '../menu.php';
            ?>

         <head>
             <div id="form">

                <h3>Cadastro de Usuários</h3>

                <form id="form_linhas" action="grava.php" method="POST">
                    <div id=formulario_linhas>

                        <div class="form-group row">                        
                            <div class="form-group col-md-1">
                                <label for="idusuarios">ID:</label>
                                <input type="text" id="idusuarios" name="idusuarios" class="form-control mx-sm-3" readonly="readonly">     
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group col-md-3">
                                <label for="nome">Nome:</label>
                                <input type="text" id="nome"  name="nome" class="form-control mx-sm-4" placeholder="Nome" required>     
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-group col-md-3">
                                <label for="sobrenome">Sobrenome:</label>
                                <input type="text" id="sobrenome"  name="sobrenome" class="form-control mx-sm-4" placeholder="Sobrenome" required>     
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group col-md-3">
                                <label for="cracha">Cpf:</label>
                                <input type="text" id="cpf"  name="cpf" class="form-control mx-sm-4" required>    
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-group col-md-3">
                                <label for="cracha">Crachá:</label>
                                <input type="text" id="cracha"  name="cracha" class="form-control mx-sm-4" required>    
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="form-group col-md-3">
                                <label for="email">E-mail:</label>
                                <input type="text" id="email"  name="email" class="form-control mx-sm-4" placeholder="@peccin.com.br">    
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-group col-md-3">
                                <label for="senha">Senha:</label>
                                <input type="password" id="senha"  name="senha" class="form-control mx-sm-4">    
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group col-md-3">
                                <label for="tipo">Tipo User:</label>
                                <select type="text" id="tipo"  name="tipo" class="form-control mx-sm-4" required>
                                    <option value='null'>Selecione...</option> 
                                    <option value='0'>Admin</option>
                                    <!-- <option value='1'>User</option> -->
                                    <option value='2'>Cadastro</option>
                                </select>   
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-group col-md-3">
                                <label for="id_setor">Setor:</label>
                                <select type="text" id="id_setor"  name="id_setor" class="form-control mx-sm-4" required>
                                    <option value='null'>Selecione...</option>
                                        <?php 
                                            $resultado = $conn->prepare("SELECT * FROM setor order by nome_setor");
                                            $resultado->execute();
                                            if(count($resultado)) {
                                             foreach($resultado as $res) {
                                                echo "<option value=".$res['idsetor'].">".$res['nome_setor']."</option>";  
                                             }
                                            }
                                        ?>
                                </select>    
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