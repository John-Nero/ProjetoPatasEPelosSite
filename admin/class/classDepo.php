<?php

require_once('conexao.php');

class depoimentoClass
{

    //ATRIBUTOS
    public $idDepo;
    public $fotoDepo;
    public $altDepo;
    public $nomeDepo;
    public $textoDepo;
    public $avaliDepo;
    public $statusDepo;
    public $idCliete;

    //METODOS

    //LISTAR TODOS
    public function ListarTodos()
    {
        $sql = "SELECT * FROM tbl_depo ORDER BY idDepo ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta
    }

    //LISTAR ATIVOS
    public function ListarAtivos()
    {
        $sql = "SELECT * FROM tbl_depo  WHERE statusDepo = 'ATIVO' ORDER BY idDepo ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta
    }

    public function ListarInativos()
    {
        $sql = "SELECT * FROM tbl_depo  WHERE statusDepo = 'INATIVO' ORDER BY idDepo ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta
    }

    //ATIVAR DEPOIEMNTO NO BANCO DE DADOS
    public function Ativar($id)
    {
        $sql = "update tbl_depo set statusDepo = 'ATIVO' where idDepo = $id;";
        $conn = Conexao::LigarConexao();
        $conn->exec($sql);
        echo "<script> document.location='index.php?p=depoimento&status=todos' </script>";
    }

    //DESATIVAR DEPOIEMNTO NO BANCO DE DADOS
    public function Desativar($id)
    {
        $sql = "update tbl_depo set statusDepo = 'INATIVO' where idDepo = $id;";
        $conn = Conexao::LigarConexao();
        $conn->exec($sql);
        echo "<script> document.location='index.php?p=depoimento&status=todos' </script>";
    }
}
