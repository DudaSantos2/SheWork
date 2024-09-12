<?php



if (!empty($_POST)) {

	

	

				 require("class.phpmailer.php");

				 $nome = "Simetria Digital";

				 $emailfrom = "noreply@simetriadigital.com.br";

				 $emailto = "contato@simetriaplanosdesaude.com.br";

				 $assunto = "Cotacao_plano_de_saude";

				 $mensagem = "<body><b>Cliente:</b> ". $_POST['form_name']." <br><br>Telefone: ".$_POST['form_phone']."<br>Email: ".$_POST['form_email']."<br>Mensagem: ".$_POST['form_message']."<br>Deseja Cotação para: ".$_POST['plano']."<br>A Cotação é para: ".$_POST['tipo']."</body>";



				 $mail = new PHPMailer();

				 //$mail->Mailer = "smtp";

				 $mail->IsHTML(true);

				 $mail->IsSMTP(); // enable SMTP

				 $mail->From = $emailfrom;//-------->QUEM ESTÁ ENVIANDO O EMAIL

				 $mail->FromName = $nome;

				 $mail->AddAddress($emailto); ////-------->QUEM IRÁ RECEBER O EMAIL

				 $mail->Subject = $assunto;

				 $mail->Body = $mensagem;

				 $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only

				 $mail->Host = "127.1.1.1";

				 $mail->SMTPAuth = "TRUE"; // Habilitar a autenticação email

				 $mail->Username = "noreply@simetriadigital.com.br";

				 $mail->Password = "x0i6r#3U";

				 //$mail->SMTPSecure = "ssl";

				 $mail->Port = 465;

				 $enviado=$mail->Send();

				 $mail->ClearAllRecipients();

				 $mail->ClearAttachments();

				 if(!$enviado){

					echo "Ocorreu erros ao enviar o e-mail";

					echo "Mailer Error: " . $mail->ErrorInfo;

				 }else{ 

				 	$url = 'http://' . $_SERVER["SERVER_NAME"];

				 	header('Location: '.$url.'/contato-enviado-com-sucessso.html');           

				  	echo "Email Enviado com sucesso";

				 }  



   

}

?>