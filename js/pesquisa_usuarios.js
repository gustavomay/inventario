$(document).ready(function(){
        $("input[name='pesquisa']").blur(function(){            
            var $id = $("input[name='idusuarios']");
            var $nome = $("input[name='nome']");
            var $sobrenome = $("input[name='sobrenome']");
            var $setor = $("input[name='idsetor']");
            var $email = $("input[name='email']");
            var $tipo = $("select[name='tipo']");
            var $cpf = $("input[name='cpf']");
            var $cracha = $("input[name='cracha']");

            $.getJSON('pesquisa_termo.php', {
                pesquisar: $(this).val()
            },function(json){
                    $id.val(json.idusuarios);
                    $nome.val(json.nome);
                    $sobrenome.val(json.sobrenome);
                    $setor.val(json.nome_setor);
                    $email.val(json.email);
                    $tipo.val(json.tipo);  
                    $cpf.val(json.cpf);                    
                    $cracha.val(json.cracha);
            });
        });
    });
