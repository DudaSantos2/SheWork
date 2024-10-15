<?php

$assunto = "Contato Site She Work"; // Assunto do e-mail
$fromMail = "contatoshework@gmail.com"; // E-mail que envia
$replyto = ""; // Responder para
$mailto = "inhegas4@gmail.com"; // E-mail para onde enviar
$url = 'http://localhost:8080/pit/'; // URL do site
$paginaSucesso = "index-sucesso.php"; // Redirecionar para página caso o e-mail tenha sido enviado

// Pega os valores dos campos do formulário
$Nome = $_POST["nome"];
$Fone = $_POST["telefone"];
$Email = $_POST["email"];
$Mensagem = $_POST["mensagem"];
$urldestino = "http://localhost:8080/pit/painel.php?go=index-sucesso";

// Monta o corpo do e-mail
$Vai = "E-mail de contato\n
Nome: $Nome\n\n
E-mail: $Email\n\n
Telefone: $Fone\n\n
Mensagem: $Mensagem\n";

$res = mail($fromMail, $assunto, $Vai, ["From" => $Email]);

if ($res) {
    header("Location: $urldestino");
}

var_dump($res);

/*require_once("../phpmailer/class.phpmailer.php");

function smtpmailer($para, $de, $de_nome, $assunto, $corpo)
{
    global $error;
    $mail = new PHPMailer();
    $mail->isSMTP(); // Ativar SMTP
    $mail->SMTPDebug = 0; // Debug: 1 = erros e mensagens, 2 = mensagens apenas
    $mail->SMTPAuth = true; // Autenticação ativada
    $mail->SMTPSecure = 'ssl'; // SSL REQUERIDO pelo Gmail
    $mail->Host = 'smtp.gmail.com'; // SMTP utilizado
    $mail->Port = 465; // Porta
    $mail->Username = 'contatoshework@gmail.com'; // Nome de usuário do SMTP
    $mail->Password = 'txaqliiipavhitxj'; // Senha do SMTP
    $mail->SetFrom($de, $de_nome); // E-mail e nome do remetente
    $mail->addReplyTo($de, $de_nome); // E-mail e nome para responder
    $mail->Subject = $assunto; // Assunto
    $mail->Body = $corpo; // Corpo do e-mail
    $mail->addAddress($para); // Endereço do destinatário

    if (!$mail->Send()) {
        $error = 'Mail error: ' . $mail->ErrorInfo;
        return false;
    } else {
        $error = 'Mensagem enviada!';
        return true;
    }
}

// Enviar o e-mail
if (smtpmailer($mailto, $fromMail, 'She Work', $assunto, $Vai)) {
    header("Location: $urldestino"); // Redireciona para uma página de obrigado
    exit();
}

if (!empty($error)) {
    echo $error; // Exibe mensagem de erro
}*/

