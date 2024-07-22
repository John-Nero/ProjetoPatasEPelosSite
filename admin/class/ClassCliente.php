<?php

require_once('Conexao.php');

class clienteClass
{

    //ATRIBUTOS
    public $idCliente;
    public $nomeCliente;
    public $enderecoCliente;
    public $telefoneCliente;
    public $emailCliente;
    public $senhaCliente;
    public $fotoCliente;
    public $altCliente;
    public $statusCliente;
    public $datCadCliente;


    //METODOS

    //LISTAR TODOS
    public function listarTodos()
    {
        $sql = "SELECT * FROM tbl_cliente ORDER BY idCliente ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta
    }

    public function listarAtivos()
    {
        $sql = "SELECT * FROM tbl_cliente WHERE statusCliente = 'ATIVO' ORDER BY idCliente ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta
    }

    public function listarInativos()
    {
        $sql = "SELECT * FROM tbl_cliente WHERE statusCliente = 'INATIVO' ORDER BY idCliente ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta
    }

    //INSERIR NO BANCO DE DADOS
    public function Inserir()
    {
        $sql = "INSERT INTO tbl_cliente 
        (nomeCliente,
        enderecoCliente,
        telefoneCliente,
        emailCliente,
        senhaCliente,
        fotoCliente,
        altCliente,
        statusCliente)  
        VALUES(
                '" . $this->nomeCliente . "',
                '" . $this->enderecoCliente . "',
                '" . $this->telefoneCliente . "',
                '" . $this->emailCliente . "',
                '" . $this->senhaCliente . "',
                '" . $this->fotoCliente . "',
                '" . $this->altCliente . "',
                '" . $this->statusCliente . "'
            )";
        //aqui ele ta especificando quais parametros ele vai alimentar e logo em seguida alimentando a mesma 


        $conn = conexao::LigarConexao(); //esse ta ligando a nossa conexão
        $conn->exec($sql); //esse exec executa uma função sql

    }

    //ATIVAR BANNER NO BANCO DE DADOS
    public function Ativar($id)
    {

        $sql = "update tbl_cliente set statusCliente = 'ATIVO' where idCliente = $id;";
        $conn = Conexao::LigarConexao();
        $conn->exec($sql);
        echo "<script> document.location='index.php?p=cliente&status=todos' </script>";
    }

    //DESATIVAR BANNER NO BANCO DE DADOS
    public function Desativar($id)
    {
     
        $sql = "update tbl_cliente set statusCliente = 'INATIVO' where idCliente = $id;";
        $conn = Conexao::LigarConexao();
        $conn->exec($sql);
        echo "<script> document.location='index.php?p=cliente&status=todos' </script>";
    }
}
