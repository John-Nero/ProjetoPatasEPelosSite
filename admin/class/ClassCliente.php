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

    public function __construct($id = false)
    {
        if ($id) {
            $this->idCliente = $id;                    // Define o ID do cliente se fornecido e chama o método Carregar()
            $this->Carregar();
        }
    }

    //CARREGAR
    public function Carregar()
    {
        $sql = "SELECT * FROM tbl_cliente WHERE idCliente = $this->idCliente;"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao();                // Estabelece a conexão com o banco de dados
        $resultado = $conn->query($sql);                // Executa a consulta SQL

        $cliente = $resultado->fetch();                 // Obtém os dados do cliente da consulta

        //Atribui os dados do cliente às propriedades da classe
        $this->idCliente            = $cliente['idCliente'];
        $this->nomeCliente          = $cliente['nomeCliente'];
        $this->enderecoCliente      = $cliente['enderecoCliente'];
        $this->telefoneCliente      = $cliente['telefoneCliente'];
        $this->emailCliente         = $cliente['emailCliente'];
        $this->senhaCliente         = $cliente['senhaCliente'];
        $this->fotoCliente          = $cliente['fotoCliente'];
        $this->altCliente           = $cliente['altCliente'];
        $this->statusCliente        = $cliente['statusCliente'];
    }

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

    //ATUALIZAR NO BANCO DE DADOS
    public function Atualizar()
    {
        $sql = "UPDATE  tbl_cliente 
                SET     nomeCliente     = '$this->nomeCliente',
                        enderecoCliente = '$this->enderecoCliente',
                        telefoneCliente = '$this->telefoneCliente',
                        emailCliente    = '$this->emailCliente',
                        senhaCliente    = '$this->senhaCliente',
                        fotoCliente     = '$this->fotoCliente',
                        altCliente      = '$this->altCliente',
                        statusCliente   = '$this->statusCliente'
                WHERE   idCliente       =  $this->idCliente";

        $conn = conexao::LigarConexao();                // Estabelece a conexão com o banco de dados
        $conn->exec($sql);                              // Executa a query SQL de atualização

        echo "<script>document.location='index.php?p=cliente&status=todos'</script>"; // Redireciona para a página de clientes após a atualização
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
