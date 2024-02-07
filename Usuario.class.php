<?php
class Usuario{

    private $id;
    private $cpf;
    private $nome;
    private $datanascimento;
    private $email;
    private $telefone;
    private $whatsapp;
    private $RG;
    private $orgaoExpedidor;
    private $ufrg;
    private $logradouro;
    private $numero;
    private $bairro;
    private $cep;
    private $cidade;
    private $estado;
    private $complemento;
    private $cnh;
    private $categoria;
    private $datavalidade;
    private $dataprimeiracnh;

    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $regra = '/[^a-zA-Z0-9_]/';
        $id = preg_replace($regra,"",$id);
        $this->id = $id;
    }

    public function getCpf()
    {
        return $this->$cpf;
    }
    
    public function setCpf($cpf)
    {
        $this->cpf= $cpf;
    }

    public function getNome()
    {
        return $this->$nome;
    }
    
    public function setNome($nome)
    {
        $this->nome= $nome;
    }

    public function getDataNascimento()
    {
        return $this->$datanascimento;
    }
    
    public function setDataNascimento($datanascimento)
    {
        $this->datanascimento= $datanascimento;
    }
    
    public function getEmail()
    {
        return $this->$email;
    }
    
    public function setEmail($email)
    {
        $this->email= $email;
    }
    private $telefone;
    private $whatsapp;
    private $RG;
    private $orgaoExpedidor;
    private $ufrg;
    private $logradouro;
    private $numero;
    private $bairro;
    private $cep;
    private $cidade;
    private $estado;
    private $complemento;
    private $cnh;
    private $categoria;
    private $datavalidade;
    private $dataprimeiracnh;
}
?>