<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 
class usePDO
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "auth";
    private $instance;
 
    function getInstance()
    {
        if (empty($this->instance)) {
            $this->instance = $this->conection();
        }
        return $this->instance;
    }
 
    private function conection()
    {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage() . "<br>");
        }
    }
}
// Arquivo de conexão com o banco de dados

// Configurações do banco de dados

function instancia(){
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "auth";
    
    // Criar conexão
    $conexao = new mysqli($servidor, $usuario, $senha, $banco);
    
    // Verificar conexão
    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }
    
    // Definir charset para UTF-8
    $conexao->set_charset("utf8");
    return $conexao;
}
