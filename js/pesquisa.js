$(document).ready(function(){
        $("input[name='pesquisa']").blur(function(){            
            var $idativos = $("input[name='idativos']");
            var $idusuarios = $("select[name='idusuarios']");
            var $usuario = $("input[name='nome']");
            var $idoffice = $("select[name='idoffice']");
            var $versao_office = $("input[name='versao_office']");
            var $key_office = $("select[name='key_office']");
            var $versao_so = $("input[name='versao_so']");

            $.getJSON('pesquisa.php', {
                pesquisar: $(this).val()
            },function(json){
                    $idativos.val(json.idativos);
                    $idusuarios.val(json.idusuarios);
                    $usuario.val(json.nome);
                    $idoffice.val(json.idoffice);
                    $versao_office.val(json.versao_office);
                    $key_office.val(json.key_office);
                    $versao_so.val(json.versao_so);          
            });
        });
    
});

