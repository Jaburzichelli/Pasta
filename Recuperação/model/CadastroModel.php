<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../service/conexao.php';

class CadastroModel {
    private $db;

    public function __construct() {
        $conn = new usePDO();
        $this->db = $conn->getInstance();
    }

    public function emailExists($email) {
        $sql = "SELECT * FROM pessoa WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->rowCount() > 0;
    }

    public function register($nomedeusuario, $email, $telefone, $senha) {
        $hashed_password = password_hash($senha, PASSWORD_DEFAULT);

        // Cadastra na tabela usuario
        $sql = "INSERT INTO usuario (nome_de_usuario, senha) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$nomedeusuario, $hashed_password]);

        $idPessoa = $this->db->lastInsertId();
        
        $sql = "INSERT INTO pessoa (nome, email, telefone, usuario_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$nomedeusuario, $email, $telefone, $idPessoa]);

        return $idPessoa;
    }
    
    public function verificarUsuario($email) {
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>