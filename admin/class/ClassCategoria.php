<?php

require_once('Conexao.php');

class categoriaClass
{


    //ATRIBUTOS
    public $idCategoria;
    public $nomeCategoria;
    public $fotoCategoria;
    public $altCategoria;
    public $statusCategoria;

    //METODOS

    //LISTAR TODOS
    public function listarTodos()
    {
        $sql = "SELECT * FROM tbl_categorias ORDER BY idCategoria ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta
    }

    public function listarAtivos()
    {
        $sql = "SELECT * FROM tbl_categorias WHERE statusCategoria = 'ATIVO' ORDER BY idCategoria ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta
    }

    public function listarInativos()
    {
        $sql = "SELECT * FROM tbl_categorias WHERE statusCategoria = 'INATIVO' ORDER BY idCategoria ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta
    }

    //INSERIR NO BANCO DE DADOS
    public function Inserir()
    {
        $sql = "INSERT INTO tbl_categorias 
        (nomeCategoria,
        fotoCategoria,
        altCategoria,
        statusCategoria)   
        VALUES(
                '" . $this->nomeCategoria . "',
                '" . $this->fotoCategoria . "',
                '" . $this->altCategoria . "',
                '" . $this->statusCategoria . "'
            )";
        //aqui ele ta especificando quais parametros ele vai alimentar e logo em seguida alimentando a mesma 


        $conn = conexao::LigarConexao(); //esse ta ligando a nossa conexão
        $conn->exec($sql); //esse exec executa uma função sql

    }

    //ATIVAR BANNER NO BANCO DE DADOS
    public function Ativar($id)
    {
        print_r("aaaaaaa");
        $sql = "update tbl_categorias set statusCategoria = 'ATIVO' where idCategoria = $id;";
        $conn = Conexao::LigarConexao();
        $conn->exec($sql);
        echo "<script> document.location='index.php?p=categoria&status=todos' </script>";
    }

    //DESATIVAR BANNER NO BANCO DE DADOS
    public function Desativar($id)
    {
        print_r("aaaaaaa");
        $sql = "update tbl_categorias set statusCategoria = 'INATIVO' where idCategoria = $id;";
        $conn = Conexao::LigarConexao();
        $conn->exec($sql);
        echo "<script> document.location='index.php?p=categoria&status=todos' </script>";
    }
}
