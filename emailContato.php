<?php
include_once ('phpmailer/PHPMailerAutoload.php');

        /*$nome ="Larissa";
        $email="midiajatai@gmail.com";
        $assunto="Teste";
        $texto="Teste do formulário de Contato do SWGV";*/

        //$nome = $_POST['nome'];
       // $email = $_POST['email'];
        //$assunto = $_POST['assunto'];
       // $texto = $_POST['texto'];
           
        $mail = new PHPMailer();
     
        // DEFINIÇÃO DOS DADOS DE AUTENTICAÇÃO - Você deve auterar conforme o seu domínio!
        $mail->IsSMTP(); // Define que a mensagem será SMTP
        //$mail->Host = "smtp.jatai.go.gov.br"; // Seu endereço de host SMTP
        $mail->Host = "smtp.gmail.com"; // Seu endereço de host SMTP
        $mail->SMTPAuth = true; // Define que será utilizada a autenticação -  Mantenha o valor "true"
        $mail->Port = 465; // Porta de comunicação SMTP - Mantenha o valor "587"
        //$mail->SMTPSecure = false; // Define se é utilizado SSL/TLS - Mantenha o valor "false"
        $mail->SMTPSecure = 'ssl'; // Define se é utilizado SSL/TLS - Mantenha o valor "false"
        $mail->SMTPAutoTLS = false; // Define se, por padrão, será utilizado TLS - Mantenha o valor "false"
        //$mail->Username = 'desenvolvimento@jatai.go.gov.br'; // Conta de email existente e ativa em seu domínio
        $mail->Username = 'softwareswgv@gmail.com'; // Conta de email existente e ativa em seu domínio
        $mail->Password = 'S&@84483195'; // Senha da sua conta de email
     
        // DADOS DO REMETENTE
        //$mail->Sender = "desenvolvimento@jatai.go.gov.br"; // Conta de email existente e ativa em seu domínio
        $mail->Sender = "larissa.ssilva@gmail.com"; // Conta de email existente e ativa em seu domínio
        //$mail->From = "desenvolvimento@jatai.go.gov.br"; // Sua conta de email que será remetente da mensagem
        $mail->From = "larissa.ssilva@gmail.com"; // Sua conta de email que será remetente da mensagem
        $mail->FromName = 'SWGV Contato'; // Nome da conta de email
     
        // DADOS DO DESTINATÁRIO
        $mail->AddAddress('larissa.ssilva@gmail.com', 'Larissa'); // Define qual conta de email receberá a mensagem
        //$mail->AddAddress('recebe2@dominio.com.br'); // Define qual conta de email receberá a mensagem
        //$mail->AddCC('prilonga@gmail.com'); // Define qual conta de email receberá uma cópia
        //$mail->AddBCC('copiaoculta@dominio.info'); // Define qual conta de email receberá uma cópia oculta
     
        // Definição de HTML/codificação
        $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
        $mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
  
        $mail->Subject  = $assunto; // Assunto da mensagem
        $mail->Body .= "Nome: ".$nome."<br>";//corpo da mensagem
        $mail->Body .= "Email: ".$email."<br>";
        $mail->Body .= "Texto ".$texto."<br>";

        // ENVIO DO EMAIL
        $enviado = $mail->Send();
        // Limpa os destinatários e os anexos
        $mail->ClearAllRecipients();
     
        // Exibe uma mensagem de resultado do envio (sucesso/erro)
        if ($enviado) {
            echo "E-mail enviado com sucesso!";
            return 1;
        } else {
            echo "Não foi possível enviar o e-mail.";
            echo "<b>Detalhes do erro:</b> " . $mail->ErrorInfo;
            return 2;
        }
    



?>