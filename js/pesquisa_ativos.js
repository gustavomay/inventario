$(document).ready(function(){
        $("input[name='pesquisa']").blur(function(){            
            var $id = $("input[name='idativos']");
            var $idusuarios = $("select[name='usuarios_idusuarios']");
            var $patrimonio = $("input[name='patrimonio']");
            var $tag = $("input[name='service_tag']");
            var $memoria = $("input[name='memoria']");
            var $processador = $("input[name='processador']");
            var $fabricante = $("input[name='fabricante']");
            var $so = $("input[name='SO_idSO']");
            var $office = $("input[name='office_idoffice']");
            var $setor = $("input[name=''idsetor]");
            var $status = $("input[name=''status]");

            $.getJSON('pesquisa.php', {
                pesquisar: $(this).val()
            },function(json){
                    $id.val(json.idativos);
                    $idusuarios.val(json.usuarios_idusuarios);
                    $patrimonio.val(json.patrimonio);
                    $tag.val(json.service_tag);
                    $memoria.val(json.memoria);
                    $processador.val(json.processador);
                    $fabricante.val(json.fabricante);
                    $so.val(json.SO_idSO);  
                    $office.val(json.office_idoffice);                    
                    $setor.val(json.idsetor);
                    $status.val(json.status);
            });
        });
    });


    
