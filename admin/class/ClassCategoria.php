<?php
 
require_once('admin\class\Conexao.php');
 
class ClassCategoria{   // Criar uma classe para atribuir os atributos que tem no banco de dados
 
    // Atributos ou Caracteristicas
    public $idcategoria; // tem que i niciar minúsculo para identificar ser um atributo
    public $nomeCategoria;
    public $fotoCategoria;
    public $altCategoria;
    public $statusCategoria;

 
    // Criar método
 
        // Listar
 
        public function ListarC(){ // função, tem que iniciar maiúsculo para identificar que é um método
            $sql = "SELECT * FROM tbl_categorias WHERE statusCategoria = 'ATIVO' ORDER BY nomeCategoria ASC;";
 
            $conn = Conexao::LigarConexao();
 
            $resultado = $conn->query($sql); // Prepara e executa uma instrução SQL sem espaços reservados
 
            $lista = $resultado->fetchAll(); // Retornar uma matriz de dados (tabelinha), busca as linhas restantes de um conjunto de resultados, matriz de dados com informações que tem no banco de dados
 
            return $lista; // Retornar a minha matriz de dados
        }
}