<?php

require_once('conexao.php');

class bannerClass
{
    //ATRIBUTOS
    public $idBanner;
    public $nomeBanner;
    public $fotoBanner;
    public $altBanner;
    public $statusBanner;
    public $paginaBanner;

    //METODOS

    //LISTAR TODOS OS ITENS NO BANCO DE DADOS

    public function ListarTodos()
    {
        $sql = "SELECT * FROM tbl_banner ORDER BY nomeBanner ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta

    }

    //LISTAR TODOS OS ITENS ATIVOS NO BANCO DE DADOS

    public function ListarAtivos()
    {
        $sql = "SELECT * FROM tbl_banner WHERE statusBanner = 'ATIVO' ORDER BY nomeBanner ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta

    }

    //LISTAR TODOS OS ITENS DESATIVADOS NO BANCO DE DADOS

    public function ListarDesativados()
    {
        $sql = "SELECT * FROM tbl_banner WHERE statusBanner = 'DESATIVADO' ORDER BY nomeBanner ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta

    }

    //INSERIR NO BANCO DE DADOS
    public function Inserir()
    {
        $sql = "INSERT INTO tbl_banner 
        (nomeBanner,
        fotoBanner,
        altBanner,
        statusBanner,
        paginaBanner)   
        VALUES(
                '" . $this->nomeBanner . "',
                '" . $this->fotoBanner . "',
                '" . $this->altBanner . "',
                '" . $this->statusBanner . "',
                '" . $this->paginaBanner . "'
            )";
        //aqui ele ta especificando quais parametros ele vai alimentar e logo em seguida alimentando a mesma 


        $conn = conexao::LigarConexao(); //esse ta ligando a nossa conexão
        $conn->exec($sql); //esse exec executa uma função sql

    }
}
