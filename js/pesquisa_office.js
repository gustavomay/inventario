$(document).ready(function(){
    $("input[name='pesquisa']").blur(function(){            
        var $id = $("input[name='idoffice']");
        var $versao = $("select[name='versao_office']");
        var $key = $("select[name=key_office']");

        $.getJSON('pesquisa.php', {
            pesquisar: $(this).val()
        },function(json){
                $id.val(json.idoffice);
                $versao.val(json.versao_office);
                $versoa.val(json.key_office)
        });
    });
});