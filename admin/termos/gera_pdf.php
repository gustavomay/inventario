<?php

/* Carrega a classe DOMPdf */
require_once("../../dompdf/dompdf/dompdf_config.inc.php");

include '../../config/conection.php';


$id = $_POST['idusuarios'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];
$setor = $_POST['idsetor'];

$modelo = $_POST['modelo'];
$equipamento = $_POST['equipamento'];
$estado = $_POST['estado'];
$observacoes = $_POST['observacoes'];

$tag = $_POST['tag'];
$patrimonio = $_POST['patrimonio'];

if($equipamento == 0){
    $marcacao1 = 'X';
}else{
    $marcacao1 = ' ';
}
if($equipamento == 1){
    $marcacao2 = 'X';
}else{
    $marcacao2 = ' ';
}

if($estado == 0){
    $estado1 = 'X';
}else{
    $estado1 = ' ';
}
if($estado == 1){
    $estado2 = 'X';
}else{
    $estado2 = ' ';
}

/* Cria a instância */
$dompdf = new DOMPDF();

/* Carrega seu HTML */
$dompdf->load_html('<p>
                    <link href="../../css/style_termo.css" rel="stylesheet">
                    <h3>Termo de Reponsabilidade – Equipamentos</h3>
                    <p><b>PECCIN S.A.</b>, doravante denominados <b>PECCIN</b>, e seu colaborador ou prestador de serviço identificado acima, 
                          doravante denominado <b>USUÁRIO</b>, firmam, de comum acordo, o presente <b>TERMO DE RESPONSABILIDADE</b> pelo uso dos <b>EQUIPAMENTOS</b> 
                          indicados acima, conforme item <b>6.5 Telefonia</b> da <b>PGG 1442– Projetos e Tecnologia:</b></p>

                        <p>1.	O <b>USUÁRIO</b> deverá cuidar e zelar pelos <b>EQUIPAMENTOS</b> e usá-los somente para assuntos profissionais.</p>
                        <p>2.	A <b>PECCIN</b> poderá, a seu exclusivo critério, analisar detalhadamente os <b>EQUIPAMENTOS</b> e o seu conteúdo, podendo remover ou mesmo bloquear todos os arquivos ou usos não-autorizados, respeitando a "Política de Segurança da Informação" da <b>PECCIN</b>.</p>
                        <p>3.	O <b>USUÁRIO</b> verificou as condições dos <b>EQUIPAMENTOS</b> ao recebê-los, conferindo seu estado geral, e será responsável por sua guarda e conservação. Na ocorrência de qualquer dano ou acidente aos <b>EQUIPAMENTOS</b>, inclusive furto ou roubo, o <b>USUÁRIO</b> comunicará imediatamente o fato ao setor de Tecnologia da Informação (TI) da <b>PECCIN</b>.</p>
                        <p>4.	O <b>USUÁRIO</b> não poderá fazer quaisquer alterações de instalação ou configuração nos <b>EQUIPAMENTOS</b> sem prévia autorização do setor de TI da <b>PECCIN</b>.</p>
                        <p>5.	O <b>USUÁRIO</b> não poderá ceder, locar ou emprestar os <b>EQUIPAMENTOS</b> a terceiros, ainda que vinculados à <b>PECCIN</b>, sem prévio consentimento desta, sob pena de responsabilizar-se perante a <b>PECCIN</b> por danos materiais (danos emergentes e lucros cessantes) causados aos <b>EQUIPAMENTOS</b>.</p>
                        <p>6.	O <b>USUÁRIO</b> será responsável pelos dados contidos nos <b>EQUIPAMENTOS</b> e pela realização de cópias de segurança de referidos dados.</p>
                        <p>7.	O <b>USUÁRIO</b> garantirá a confidencialidade das informações contidas nos <b>EQUIPAMENTOS</b> e não transmitirá a terceiros nenhum dado ou informação confidencial de propriedade da <b>PECCIN</b>, seus fornecedores ou clientes. Todos os dados e informações contidos nos <b>EQUIPAMENTOS</b> pertencem à <b>PECCIN</b>. </p>
                        <p>8.	Sempre que houver necessidade de manutenção ou suporte técnico dos <b>EQUIPAMENTOS</b>, o <b>USUÁRIO</b> deverá comunicar o fato ao setor de TI da <b>PECCIN</b>, que adotará as providências necessárias ao reparo dos <b>EQUIPAMENTOS</b> e/ou assistência ao <b>USUÁRIO</b>. </p>
                        <p>9.	Extinto, por qualquer motivo, o contrato de trabalho ou de prestação de serviço entre o <b>USUÁRIO</b> e a <b>PECCIN</b>, ou por determinação da <b>PECCIN</b>, o <b>USUÁRIO</b> devolverá imediatamente à <b>PECCIN</b> os <b>EQUIPAMENTOS</b> e seus acessórios, inclusive manuais e caixas, todos em perfeitas condições de uso, sob pena de responder à <b>PECCIN</b> por danos materiais (danos emergentes e lucros cessantes).</p>
                        <p>10.	O <b>USUÁRIO</b> autoriza, nos termos do artigo 462, § 1º, da CLT, que sejam descontados de seu salário os valores apurados a serem ressarcidos à <b>PECCIN</b> a qualquer título.</p>
                        <p>11.	O <b>USUÁRIO</b> será o único responsável pelos <b>EQUIPAMENTOS</b> até a data da efetiva devolução.</p>
                        <p>12.	O <b>USUÁRIO</b> declara conhecer e compromete-se a respeitar, no uso dos <b>EQUIPAMENTOS</b>, a “Política de Telefonia Móvel” da <b>PECCIN</b> (doravante denominada PTM e considerada parte integrante deste instrumento), conforme a redação publicada no sistema de Gestão de Qualidade (ISODOC) e na Intranet da <b>PECCIN</b>. A <b>PECCIN</b> reserva-se o direito de alterar unilateralmente a PTM a qualquer tempo, ficando o <b>USUÁRIO</b> vinculado à redação mais atual.</p>
                        
                        <p>E por estarem justos e contratados, firmam o presente instrumento em duas vias de igual teor.<p>
                        <p align="center">'.date("d/m/Y").'</p>
                        </p>
                    <div id="imagem">
                            <img src="../../images/logo.png">
                    </div>
                    <table id="table_info_user">
                    <tr>
                    <td>
                    <label>Nome:'. ' '.$nome.' '.'</label>
                    <br>
                    <label>Sobrenome:'. ' '.$sobrenome.'</label>
                    <br>
                    <label>CPF:'. ' '.$cpf.'</label>
                    <br>
                    <label>Setor:'. ' '.$setor.'</label>
                    <br>
                    </td>
                    </tr>
                    </table>
                    <br>
                    <table id="table">
                    <tr>
                    <td>
                    <label>Notebook:('. ' '.$marcacao1.')</label>
                    <br>
                    <label>Computador:('. ' '.$marcacao2.')</label>
                    <br>
                    <br>
                    <label>Novo:('. ' '.$estado1.'           '.')</label><label>'.' ou '.'   Usado:('. ' '.$estado2.')</label>                   
                    
                    <br>
                    <br>
                    <label>Observações:'. ' '.$observacoes.'</label>
                    <br>
                    </td>
                    </tr>
                    </table>
                    <br>
                    <table id="table_info_equip">
                    <tr>
                    <td>
                    <label>Marca/Modelo:'. ' '.$modelo.'</label>
                    <br>
                    <label>Patrimonio:'. ' '.$patrimonio.'</label>
                    <br>
                    <label>Service Tag:'. ' '.$tag.'</label>
                    <br>
                    </td>
                    </tr>
                    </table>
                    <br>
                    <table id="table_info_equip">
                    <tr>
                    <td>
                    <label>Assinatura de Entrega:</label>
                    <textarea type="text" id="observacoes"  name="observacoes" class="form-control mx-sm-4" ></textarea>
                    <label>Data de Entrega:'.date("d/m/Y").'</label>
                    <br>                    
                    </td>
                    </tr>
                    </table>
                    <br>
                    <table id="table_info_equip">
                    <tr>
                    <td>
                    <label>Assinatura de Devolução:</label>
                    <textarea type="text" id="observacoes"  name="observacoes" class="form-control mx-sm-4" ></textarea>
                    <label>Data de Devolução:</label>
                    <br>
                    <label>Observações:</label>
                    <br>                    
                    </td>
                    </tr>
                    </table>
                    </p>');

/* Renderiza */
$dompdf->render();

$pdf = $dompdf->output(); // Cria o pdf

    $arquivo = "../../uploads/".$nome.'.pdf'; // Caminho onde será salvo o arquivo.
    
    if (file_put_contents($arquivo,$pdf)) { //Tenta salvar o pdf gerado
    
        $stmt = $conn->prepare("UPDATE usuarios SET caminho_download = :caminho_download WHERE idusuarios = $id");
        $stmt -> bindParam(':caminho_download', $arquivo);
        $stmt->execute();

        echo "<script language='JavaScript'>
                alert('PDF gerado com sucesso!!'); 
                javascript:window.location='gera_termo.php';              
            </script>";
    } else {
        echo "<script language='JavaScript'>
                alert('Erro ao gerar PDF!!');               
            </script>";
    }

/* Exibe */
/*$dompdf->stream("$nome.pdf");*/

?>