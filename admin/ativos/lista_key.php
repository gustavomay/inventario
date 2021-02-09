<?php

/* 
 * Este script � o responsavel pela lista de hor�rios livres para reserva (inicial).
 * Antes de exibir o resultado para o usu�rio, ele busca somente hor�rios livres.
 *
 */

require_once('../../config/conection.php'); 

// Uma forma de obter $_POST['estado'] mais segura
$cod_key = filter_input(INPUT_POST, 'office_idoffice', FILTER_VALIDATE_INT);

$sqlSaida = "SELECT * FROM office WHERE idoffice = :idoffice"; 

$resSaida = $conn->prepare($sqlSaida);
$resSaida->execute(array(
    ':idoffice' => $cod_key
));
$saidas = $resSaida->fetchAll();
?>

<?php foreach ($saidas as $saida) { ?>
    <label><?php echo $saida['key_office'] ?></label>
<?php }
?>

