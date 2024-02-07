<?php 
include 'PHPMailerAutoload.php';

class Email extends PHPMailer{
    private $email_remetent;
    private $nome_remetent;
    private $email_destinatario;
    private $nome_destinatario;
    private $assunto;
    private $texto;
    private $copia;
    //private $bcc;

    function getEmail_remetent() {
        return $this->email_remetent;
    }

    function setEmail_remetent($email_remetent) {
        $this->email_remetent = $email_remetent;
    }

    function getNome_remetent() {
        return $this->nome_remetent;
    }

    function setNome_remetent($nome_remetent) {
        $this->nome_remetent = $nome_remetent;
    }

    function getNome_destinatario() {
        return $this->nome_destinatario;
    }

    function setNome_destinatario($nome_destinatario) {
        $this->nome_destinatario = $nome_destinatario;
    }

    function getEmail_destinatario() {
        return $this->email_destinatario;
    }

    function setEmail_destinatario($email_destinatario) {
        $this->email_destinatario = $email_destinatario;
    }

    function getAssunto() {
        return $this->assunto;
    }

    function setAssunto($assunto) {
        $this->assunto = $assunto;
    }

    function getTexto() {
        return $this->texto;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

    function getCopia() {
        return $this->copia;
    }

    function setCopia($copia) {
        $this->copia = $copia;
    }

    function getBcc() {
        return $this->bcc;
    }

    function setBcc($bcc) {
        $this->bcc = $bcc;
    }

    public function __construct(){
        // DEFINIÇÃO DOS DADOS DE AUTENTICAÇÃO - Você deve auterar conforme o seu domínio!
        $this->IsSMTP(); // Define que a mensagem será SMTP
        //$this->Host = "smtp.jatai.go.gov.br"; // Seu endereço de host SMTP
        $this->Host = "smtp.gmail.com"; // Seu endereço de host SMTP
        $this->SMTPAuth = true; // Define que será utilizada a autenticação -  Mantenha o valor "true"
        $this->Port = 587; // Porta de comunicação SMTP - Mantenha o valor "587"
        //$this->SMTPSecure = false; // Define se é utilizado SSL/TLS - Mantenha o valor "false"
        $this->SMTPSecure = 'tls'; // Define se é utilizado SSL/TLS - Mantenha o valor "false"
        $this->SMTPAutoTLS = false; // Define se, por padrão, será utilizado TLS - Mantenha o valor "false"
        //$this->Username = 'desenvolvimento@jatai.go.gov.br'; // Conta de email existente e ativa em seu domínio
        $this->Username = 'pmjdesenvolvimento@gmail.com'; // Conta de email existente e ativa em seu domínio
        $this->Password = 'divisaodetitelc'; // Senha da sua conta de emai
        // Definição de HTML/codificação
        $this->IsHTML(true); // Define que o e-mail será enviado como HTML
        $this->CharSet = 'utf-8'; // Charset da mensagem (opcional)
    }

    public function Enviar()
    {
        /** DADOS DO REMETENTE */
        $this->Sender = $this->nome_remetent; // Conta de email existente e ativa em seu domínio
        $this->From = $this->nome_remetent; // Sua conta de email que será remetente da mensagem
        $this->FromName = $this->nome_remetent; // Nome da conta de email
        /** DADOS DO DESTINATÁRIO */
        $this->AddAddress($this->email_destinatario, $this->nome_destinatario == null ? '' : $this->nome_destinatario); // Define qual conta de email receberá a mensagem
        $this->copia == null ? '' : $this->AddCC($this->copia); // Define qual conta de email receberá uma cópia
        //$this->getBcc() == null ? '' : $this->AddBCC($this->getBcc()); // Define qual conta de email receberá uma cópia oculta
        /** DADOS DA MENSAGEM */
        $this->Subject  = $this->assunto == null ? '' : $this->assunto ; // Assunto da mensagem
        /** TRATAMENTO DO CORPO DO TEXTO */
        $regex_linha = '/[\n]/';
        $regex_linha_sub = '<br>';
        $corpo = preg_replace($regex_linha,$regex_linha_sub,$this->texto);
        $this->Body = $corpo; // texto da mensagem
        // ENVIO DO EMAIL
        $enviado = $this->Send();
        // Limpa os destinatários e os anexos
        $this->ClearAllRecipients();
        // Exibe uma mensagem de resultado do envio (sucesso/erro)
        if ($enviado) {
            return true;
        } else {
            return $this->ErrorInfo;
            /** LOG DE ERRO NO ENVIO DE EMAIL */
        }
    }


}