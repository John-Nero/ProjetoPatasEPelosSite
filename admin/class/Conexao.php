<?php
 
class Conexao{
 
    // Método
    public static function LigarConexao(){
 
        // Informações de conexão
        $host = 'smpsistema.com.br';                 // Host do banco de dados
        $dbname = 'u283879542_pethouse';            // Nome do banco de dados
        $username = 'u283879542_pethouse';          // Nome de usuário do banco de dados
        $password = 'Senac@pethouse01';                    // Senha do banco de dados
 
        // Tentativa de conexão
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // Definir o modo de erro do PDO para exceções
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Realiza operações no banco de dados...
            return $pdo;
            //echo "Conexão bem sucedida";
        } catch (PDOException $e) {
            // Se houver algum erro, exibir a mensagem de erro
            echo "Erro na conexão: " . $e->getMessage();
        }
    }
}