<?php
 
require_once('admin/class/Conexao.php');
 
class ClassProduto{   // Criar uma classe para atribuir os atributos que tem no banco de dados
 
    // Atributos ou Caracteristicas
    public $idProduto; // tem que i niciar minúsculo para identificar ser um atributo
    public $nomeProduto;
    public $valorProduto;
    public $dataValProduto;
    public $mensagemContato;
    public $qtdeProduto;
    public $barrasProduto;
    public $fotoProduto;
 
    // Criar método
 
        // Listar
 
        public function Listar(){ // função, tem que iniciar maiúsculo para identificar que é um método
            $sql = "SELECT * FROM tbl_produto WHERE statusProduto = 'DESATIVADO' ORDER BY nomeProduto ASC;";
 
            $conn = Conexao::LigarConexao();
 
            $resultado = $conn->query($sql); // Prepara e executa uma instrução SQL sem espaços reservados
 
            $lista = $resultado->fetchAll(); // Retornar uma matriz de dados (tabelinha), busca as linhas restantes de um conjunto de resultados, matriz de dados com informações que tem no banco de dados
 
            return $lista; // Retornar a minha matriz de dados
        }

        public function ListarCao(){
            $sql = "SELECT * FROM tbl_produto WHERE statusProduto = 'ATIVO' AND idCategoria = 1 ORDER BY nomeProduto ASC;";
 
            $conn = Conexao::LigarConexao();
 
            $resultado = $conn->query($sql); // Prepara e executa uma instrução SQL sem espaços reservados
 
            $lista = $resultado->fetchAll(); // Retornar uma matriz de dados (tabelinha), busca as linhas restantes de um conjunto de resultados, matriz de dados com informações que tem no banco de dados
 
            return $lista; // Retornar a minha matriz de dados
        }

        public function ListarGato(){
            $sql = "SELECT * FROM tbl_produto WHERE statusProduto = 'ATIVO' AND idCategoria = 2 ORDER BY nomeProduto ASC;";
 
            $conn = Conexao::LigarConexao();
 
            $resultado = $conn->query($sql); // Prepara e executa uma instrução SQL sem espaços reservados
 
            $lista = $resultado->fetchAll(); // Retornar uma matriz de dados (tabelinha), busca as linhas restantes de um conjunto de resultados, matriz de dados com informações que tem no banco de dados
 
            return $lista; // Retornar a minha matriz de dados
        }

        public function ListarPassaro(){
            $sql = "SELECT * FROM tbl_produto WHERE statusProduto = 'ATIVO' AND idCategoria = 3 ORDER BY nomeProduto ASC;";
 
            $conn = Conexao::LigarConexao();
 
            $resultado = $conn->query($sql); // Prepara e executa uma instrução SQL sem espaços reservados
 
            $lista = $resultado->fetchAll(); // Retornar uma matriz de dados (tabelinha), busca as linhas restantes de um conjunto de resultados, matriz de dados com informações que tem no banco de dados
 
            return $lista; // Retornar a minha matriz de dados
        }

        public function ListarPeixe(){
            $sql = "SELECT * FROM tbl_produto WHERE statusProduto = 'ATIVO' AND idCategoria = 4 ORDER BY nomeProduto ASC;";
 
            $conn = Conexao::LigarConexao();
 
            $resultado = $conn->query($sql); // Prepara e executa uma instrução SQL sem espaços reservados
 
            $lista = $resultado->fetchAll(); // Retornar uma matriz de dados (tabelinha), busca as linhas restantes de um conjunto de resultados, matriz de dados com informações que tem no banco de dados
 
            return $lista; // Retornar a minha matriz de dados
        }

        public function ListarHamster(){
            $sql = "SELECT * FROM tbl_produto WHERE statusProduto = 'ATIVO' AND idCategoria = 5 ORDER BY nomeProduto ASC;";
 
            $conn = Conexao::LigarConexao();
 
            $resultado = $conn->query($sql); // Prepara e executa uma instrução SQL sem espaços reservados
 
            $lista = $resultado->fetchAll(); // Retornar uma matriz de dados (tabelinha), busca as linhas restantes de um conjunto de resultados, matriz de dados com informações que tem no banco de dados
 
            return $lista; // Retornar a minha matriz de dados
        }

        public function ListarTataruga(){
            $sql = "SELECT * FROM tbl_produto WHERE statusProduto = 'ATIVO' AND idCategoria = 6 ORDER BY nomeProduto ASC;";
 
            $conn = Conexao::LigarConexao();
 
            $resultado = $conn->query($sql); // Prepara e executa uma instrução SQL sem espaços reservados
 
            $lista = $resultado->fetchAll(); // Retornar uma matriz de dados (tabelinha), busca as linhas restantes de um conjunto de resultados, matriz de dados com informações que tem no banco de dados
 
            return $lista; // Retornar a minha matriz de dados
        }

        public function ListarChinchila(){
            $sql = "SELECT * FROM tbl_produto WHERE statusProduto = 'ATIVO' AND idCategoria = 7 ORDER BY nomeProduto ASC;";
 
            $conn = Conexao::LigarConexao();
 
            $resultado = $conn->query($sql); // Prepara e executa uma instrução SQL sem espaços reservados
 
            $lista = $resultado->fetchAll(); // Retornar uma matriz de dados (tabelinha), busca as linhas restantes de um conjunto de resultados, matriz de dados com informações que tem no banco de dados
 
            return $lista; // Retornar a minha matriz de dados
        }
}