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

<script src="../../js/pesquisa_ativos.js"></script>

<link href="../../css/style.css" rel="stylesheet">
<link rel="stylesheet" href="../../css/mobile.css" media="(max-width: 720px)">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width">

<script>
   $(document).ready(function() {

    $('#office_idoffice').on('change', function() {
        $.ajax({
            type: 'POST',
            url: 'lista_key.php',
            dataType: 'html',
            data: {'office_idoffice': $('#office_idoffice').val()},
            // Antes de carregar os registros, mostra para o usu�rio que est�
            // sendo carregado.
            beforeSend: function(xhr) {
                $('#key_office').attr('disabled', 'disabled');
                $('#key_office').html('<label value="">Key Office:</label>');
            },
            // Ap�s carregar, coloca a lista dentro do select dos Offices.
            success: function(data) {
                if ($('#office_idoffice').val() !== '') {
                    // Adiciona o retorno no campo, habilita e da foco
                    $('#key_office').append(data);
                    $('#key_office').removeAttr('disabled').focus();
                } else {
                    $('#idoffice').html('<label value="">Selecione uma Chave</label>');
                    $('#idoffice').attr('disabled', 'disabled');

                }
            }
        });
    });
});
</script>

    <?php include "../cabecalho.php"; ?>

    <body>           
        
        <div id="corpo">
            
        <?php 
            include '../menu.php';
        ?>


            <div id="form">

            <h3>Cadastro de Ativos</h3>
            
                <form id="form_linhas" action="grava.php" method="POST">
                    <div id=formulario_linhas>

                        <div class="form-group row">                        
                            <div class="form-group col-md-1">
                                <label for="idativos">ID:</label>
                                <input type="text" id="idativos" name="idativos" class="form-control mx-sm-3" readonly="readonly">    
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group col-md-3">
                                <label for="patrimonio">Patrimônio:</label>
                                <input type="text" id="patrimonio"  name="patrimonio" class="form-control mx-sm-4" required>    
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-group col-md-3">
                                <label for="service_tag">Tag:</label>
                                <input type="text" id="service_tag"  name="service_tag" class="form-control mx-sm-4" required>    
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <div class="form-group col-md-3">
                                <label for="memoria">Memória:</label>
                                <input type="text" id="memoria"  name="memoria" class="form-control mx-sm-3" required>    
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-group col-md-3">
                                <label for="processador">Processador:</label>
                                <input type="text" id="processador"  name="processador" class="form-control mx-sm-3" required>    
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="form-group col-md-3">
                                <label for="fabricante">Fabricante:</label>
                                <input type="text" id="fabricante"  name="fabricante" class="form-control mx-sm-3" required>    
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-group col-md-3">
                                <label for="status">Status:</label>
                                <select id="status" name="status" class="form-control mx-sm-3" required>
                                <option>Selecione...</option>
                                <option value='0'>Ativo</option>
                                <option value='1'>Inativo</option>
                                </select>
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="form-group col-md-3">
                                <label for="office_idoffice">Office:</label>
                                <select id="office_idoffice" name="office_idoffice" class="form-control mx-sm-3" required>   
                                    <option>Selecione...</option>
                                    <?php 
                                        $resultado = $conn->prepare("SELECT * FROM office order by versao_office");
                                        $resultado->execute();
                                       if(count($resultado)){
                                        foreach ($resultado as $res) {          
                                            echo "<option value=".$res['idoffice'].">".$res['idoffice']." - ".$res['versao_office']."</option>";                                           
                                       }
                                     } 
                                    ?>
                                </select>
                            </div>
                        
                        <div class="form-group row">
                            <div class="form-group col-md-3">
                                <label for="key_office" id="key_office" name="key_office" readonly="readonly">Key Office:</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="form-group col-md-3">
                                <label for="SO_idSO">Sistema Operacional:</label>
                                <select id="SO_idSO" name="SO_idSO" class="form-control mx-sm-3" required>   
                                    <option>Selecione...</option>
                                    <?php 
                                        $resultado = $conn->prepare("SELECT * FROM so order by versao_so");
                                        $resultado->execute();
                                       if(count($resultado)){
                                        foreach ($resultado as $res) {          
                                            echo "<option value=".$res['idSO'].">".$res['versao_so']."</option>";                                           
                                       }
                                     } 
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-group col-md-3">
                                <label for="id_setor">Setor:</label>
                                <select id="id_setor" name="id_setor" class="form-control mx-sm-3" required>   
                                    <option>Selecione...</option>
                                    <?php 
                                        $resultado = $conn->prepare("SELECT * FROM setor order by nome_setor");
                                        $resultado->execute();
                                       if(count($resultado)){
                                        foreach ($resultado as $res) {          
                                            echo "<option value=".$res['idsetor'].">".$res['nome_setor']."</option>";                                           
                                       }
                                     } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="form-group col-md-3">
                                <label for="usuarios_idusuarios">Usuário:</label>
                                <select id="usuarios_idusuarios" name="usuarios_idusuarios" class="form-control mx-sm-3" required>   
                                    <option>Selecione...</option>
                                    <?php 
                                        $resultado = $conn->prepare("SELECT * FROM usuarios order by nome");
                                        $resultado->execute();
                                       if(count($resultado)){
                                        foreach ($resultado as $res) {          
                                            echo "<option value=".$res['idusuarios'].">".$res['nome']." ".$res['sobrenome']."</option>";                                           
                                       }
                                     } 
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="form-group col-md-3">
                                <label for="tipo">Equipamento:</label>
                                <select type="tipo" id="tipo"  name="tipo" class="form-control mx-sm-4" required> 
                                    <option>Selecione...</option>
                                    <option value='0'>Desktop</option>
                                    <option value='1'>Notebook</option>
                                </select>   
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