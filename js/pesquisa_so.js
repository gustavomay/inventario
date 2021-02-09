$(document).ready(function(){
        $("input[name='pesquisa']").blur(function(){            
            var $id = $("input[name='idSO']");
            var $versao = $("select[name='versao_so']");

            $.getJSON('pesquisa.php', {
                pesquisar: $(this).val()
            },function(json){
                    $id.val(json.idSO);
                    $versao.val(json.versao_so);
            });
        });
    });
