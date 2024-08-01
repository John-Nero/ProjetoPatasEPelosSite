<?php

require_once('Conexao.php');
class galeriaClass
{

    //ATRIBUTOS
    public $idGaleria;
    public $nomeGaleria;
    public $nomeCliente;
    public $fotoGaleria;
    public $altGaleria;
    public $statusGaleria;
    public $formatoFoto;

    //METODOS

    public function __construct($id = false)
    {
        if ($id) {
            $this->idGaleria = $id;                    // Define o ID do banner se fornecido e chama o método Carregar()
            $this->Carregar();
        }
    }

    //METODOS
    public function Carregar()
    {
        $sql = "SELECT * FROM tbl_galeria WHERE idGaleria = $this->idGaleria;"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao();                // Estabelece a conexão com o banco de dados
        $resultado = $conn->query($sql);                // Executa a consulta SQL

        $Galeria = $resultado->fetch();                 // Obtém os dados do Galeria da consulta

        //Atribui os dados do Galeria às propriedades da classe
        $this->idGaleria            = $Galeria['idGaleria'];
        $this->nomeGaleria          = $Galeria['nomeGaleria'];
        $this->nomeCliente          = $Galeria['nomeGaleria'];
        $this->fotoGaleria          = $Galeria['fotoGaleria'];
        $this->altGaleria           = $Galeria['altGaleria'];
        $this->statusGaleria        = $Galeria['statusGaleria'];
        $this->formatoFoto          = $Galeria['formatoFoto'];
    }

    //LISTAR TODOS
    public function ListarTodos()
    {
        $sql = "SELECT * FROM tbl_galeria ORDER BY idGaleria ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta
    }

    //LISTAR ATIVOS
    public function ListarAtivos()
    {
        $sql = "SELECT * FROM tbl_galeria  WHERE statusGaleria = 'ATIVO' ORDER BY idGaleria ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta
    }

    public function ListarInativos()
    {
        $sql = "SELECT * FROM tbl_galeria  WHERE statusGaleria = 'INATIVO' ORDER BY idGaleria ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta
    }

    public function Inserir()
    {
        $sql = "INSERT INTO tbl_galeria
        (nomeGaleria,
        nomeCliente,
        fotoGaleria,
        altGaleria,
        statusGaleria,
        formatoFoto)   
                VALUES(
                        '" . $this->nomeGaleria     . "',
                        '" . $this->nomeCliente     . "',
                        '" . $this->fotoGaleria     . "',
                        '" . $this->altGaleria      . "',
                        '" . $this->statusGaleria   . "',
                        '" . $this->formatoFoto     . "'
                    )";
        //aqui ele ta especificando quais parametros ele vai alimentar e logo em seguida alimentando a mesma 


        $conn = conexao::LigarConexao(); //esse ta ligando a nossa conexão
        $conn->exec($sql); //esse exec executa uma função sql

    }

    public function Atualizar()
    {
        $sql = "UPDATE tbl_banner
                SET 
                        nomeGaleria     = '$this->nomeGaleria',
                        nomeCliente     = '$this->nomeCliente',
                        fotoGaleria     = '$this->fotoGaleria',
                        altGaleria      = '$this->altGaleria',
                        statusGaleria   = '$this->statusGaleria',
                        formatoFoto     = '$this->formatoFoto'
                WHERE   idGaleria       = $this->idGaleria;";
        $conn = Conexao::LigarConexao();
        $conn->exec($sql);
        echo "<script> document.location='index.php?p=galeria&status=todos' </script>";
    }

    //ATIVAR DEPOIEMNTO NO BANCO DE DADOS
    public function Ativar($id)
    {
        $sql = "update tbl_galeria set statusGaleria = 'ATIVO' where idGaleria = $id;";
        $conn = Conexao::LigarConexao();
        $conn->exec($sql);
        echo "<script> document.location='index.php?p=galeria&status=todos' </script>";
    }

    //DESATIVAR DEPOIEMNTO NO BANCO DE DADOS
    public function Desativar($id)
    {
        $sql = "update tbl_galeria set statusGaleria = 'INATIVO' where idGaleria = $id;";
        $conn = Conexao::LigarConexao();
        $conn->exec($sql);
        echo "<script> document.location='index.php?p=galeria&status=todos' </script>";
    }
}
