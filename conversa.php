<?php
    session_start();
    require 'classes/chat.class.php';
	$id_de = $_SESSION['id_user'];
	$id_para = $_SESSION['id_suporte'];

    $chat = NEW Chat();

    $resultado = $chat->consultaMsg($id_de,$id_para);

    if ($resultado->rowCount() <= 0) {
       	echo "<code>Diga olá!</code>";
    } else {
    	while ( $row = $resultado->fetch()) {
	
	?>

	<?php
	if ($row['id_user'] == $id_de) {
	?>
	<div align="right"><p class="chat-i"><?php echo $row['mensagem']; ?></p></div>	
	<?php
	}else if ($row['id_user'] == $id_para) {
	?>
	<div align="left"><p class="chat-you"><?php echo $row['mensagem']; ?></p></div>
	<?php
	}}} ?> 



