<?php

require_once('Conexao.php');

class bannerClass
{
    //ATRIBUTOS
    public $idBanner;
    public $nomeBanner;
    public $fotoBanner;
    public $altBanner;
    public $statusBanner;
    public $paginaBanner;

    //CONSTRUTOR (SERVE PRA CARREGA AS INFORMAÇÕES DE UM CLIENTE DO BANCO)
    public function __construct($id = false)
    {
        if ($id) {
            $this->idBanner = $id;                    // Define o ID do banner se fornecido e chama o método Carregar()
            $this->Carregar();
        }
    }

    //METODOS
    public function Carregar()
    {
        $sql = "SELECT * FROM tbl_banner WHERE idBanner = $this->idBanner;"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao();                // Estabelece a conexão com o banco de dados
        $resultado = $conn->query($sql);                // Executa a consulta SQL

        $cliente = $resultado->fetch();                 // Obtém os dados do banner da consulta

        //Atribui os dados do banner às propriedades da classe
        $this->idBanner            = $cliente['idBanner'];
        $this->nomeBanner          = $cliente['nomeBanner'];
        $this->fotoBanner          = $cliente['fotoBanner'];
        $this->altBanner           = $cliente['altBanner'];
        $this->statusBanner        = $cliente['statusBanner'];
        $this->paginaBanner        = $cliente['paginaBanner'];
    }

    //LISTAR TODOS OS ITENS NO BANCO DE DADOS
    public function ListarTodos()
    {
        $sql = "SELECT * FROM tbl_banner ORDER BY nomeBanner ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta

    }

    //LISTAR TODOS OS ITENS DA PAGINA HOME NO BANCO DE DADOS
    public function ListarTodosHome()
    {
        $sql = "SELECT * FROM tbl_banner WHERE paginaBanner = 'HOME' ORDER BY nomeBanner ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta

    }

    //LISTAR TODOS OS ITENS DA PAGINA SERVIÇO NO BANCO DE DADOS
    public function ListarTodosServico()
    {
        $sql = "SELECT * FROM tbl_banner WHERE paginaBanner = 'SERVICO' ORDER BY nomeBanner ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta

    }

    //LISTAR TODOS OS ITENS ATIVOS NO BANCO DE DADOS
    public function ListarAtivosTodos()
    {
        $sql = "SELECT * FROM tbl_banner WHERE statusBanner = 'ATIVO' ORDER BY nomeBanner ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta

    }

    //LISTAR TODOS OS ITENS ATIVOS DA PAGINA SERVIÇO NO BANCO DE DADOS
    public function ListarAtivosHome()
    {
        $sql = "SELECT * FROM tbl_banner WHERE statusBanner = 'ATIVO' AND  paginaBanner = 'HOME' ORDER BY nomeBanner ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta

    }

    //LISTAR TODOS OS ITENS ATIVOS DA PAGINA SERVIÇO NO BANCO DE DADOS
    public function ListarAtivosServico()
    {
        $sql = "SELECT * FROM tbl_banner WHERE statusBanner = 'ATIVO' AND paginaBanner = 'SERVICO' ORDER BY nomeBanner ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta

    }

    //LISTAR TODOS OS ITENS DESATIVADOS NO BANCO DE DADOS
    public function ListarDesativadosTodos()
    {
        $sql = "SELECT * FROM tbl_banner WHERE statusBanner = 'INATIVO' ORDER BY nomeBanner ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta

    }

    //LISTAR TODOS OS ITENS DESATIVADOS DA PAGINA HOME NO BANCO DE DADOS
    public function ListarDesativadosHome()
    {
        $sql = "SELECT * FROM tbl_banner WHERE statusBanner = 'INATIVO' AND  paginaBanner = 'HOME' ORDER BY nomeBanner ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta

    }

    //LISTAR TODOS OS ITENS DESATIVADOS DA PAGINA SERVIÇO NO BANCO DE DADOS
    public function ListarDesativadosServico()
    {
        $sql = "SELECT * FROM tbl_banner WHERE statusBanner = 'INATIVO' AND  paginaBanner = 'SERVICO' ORDER BY nomeBanner ASC"; //Comando que vai la pro sql  

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

    //INSERIR NO BANCO DE DADOS
    public function Atualizar()
    {
        $sql = "UPDATE tbl_banner
        SET 
            nomeBanner = '$this->nomeBanner',
            fotoBanner = '$this->fotoBanner',
            altBanner = '$this->altBanner',
            statusBanner = '$this->statusBanner',
            paginaBanner = '$this->paginaBanner'
        WHERE idBanner = $this->idBanner;";
        $conn = Conexao::LigarConexao();
        $conn->exec($sql);
        echo "<script> document.location='index.php?p=banner&status=todos&pagina=todas' </script>";
    }


    //ATIVAR BANNER NO BANCO DE DADOS
    public function Ativar($id)
    {
        $sql = "update tbl_banner set statusBanner = 'ATIVO' where idBanner = $id;";
        $conn = Conexao::LigarConexao();
        $conn->exec($sql);
        echo "<script> document.location='index.php?p=banner&status=todos&pagina=todas' </script>";
    }

    //DESATIVAR BANNER NO BANCO DE DADOS
    public function Desativar($id)
    {
        $sql = "update tbl_banner set statusBanner = 'INATIVO' where idBanner = $id;";
        $conn = Conexao::LigarConexao();
        $conn->exec($sql);
        echo "<script> document.location='index.php?p=banner&status=todos&pagina=todas' </script>";
    }
}
