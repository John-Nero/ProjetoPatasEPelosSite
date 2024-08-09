<?php

require_once('Conexao.php');

class funcionarioClass
{

    //ATRIBUTOS
    public $idFuncionario;
    public $nomeFuncionario;
    public $enderecoFuncionario;
    public $telefoneFuncionario;
    public $emailFuncionario;
    public $senhaFuncionario;
    public $fotoFuncionario;
    public $altFuncionario;
    public $statusFuncionario;
    public $dataFuncionario;
    public $especialidadeFuncionario;
    public $descFuncionario;


    //METODOS

    //VERIFICAR LOGIN
    public function VerificarLogin()
    {
        $sql = "SELECT * FROM tbl_funcionario WHERE emailFuncionario = :email AND senhaFuncionario = :senha AND statusFuncionario = 'ATIVO'";
        $conn = Conexao::LigarConexao();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $this->emailFuncionario);
        $stmt->bindParam(':senha', $this->senhaFuncionario);
        $stmt->execute();
        $funcionario = $stmt->fetch();

        if ($funcionario) {
            return $funcionario['idFuncionario'];
        } else {
            return false;
        }
    }

    //LISTAR TODOS
    public function ListarTodos()
    {
        $sql = "SELECT * FROM tbl_funcionario ORDER BY idFuncionario ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta
    }

    //LISTAR ATIVOS
    public function ListarAtivos()
    {
        $sql = "SELECT * FROM tbl_funcionario  WHERE statusFuncionario = 'ATIVO' ORDER BY idFuncionario ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)
        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta
    }

    public function ListarInativos()
    {
        $sql = "SELECT * FROM tbl_funcionario  WHERE statusFuncionario = 'INATIVO' ORDER BY idFuncionario ASC"; //Comando que vai la pro sql  

        $conn = conexao::LigarConexao(); //variavel de conexao
        $resultado = $conn->query($sql); //aqui a variavel resultado ta recebendo uma pesquisa ($query) da conexao com o banco de dados($conn) e essa pesquisa ta passando um comando($sql)

        $lista = $resultado->fetchAll(); //a variavel lista ta recebendo os dados (matriz) la do banco de dados
        return $lista; //e por fim retorna isso pra quem ta chamando o metodo como resposta
    }

    //ATIVAR DEPOIEMNTO NO BANCO DE DADOS
    public function Ativar($id)
    {
        $sql = "update tbl_funcionario set statusFuncionario = 'ATIVO' where idFuncionario = $id;";
        $conn = Conexao::LigarConexao();
        $conn->exec($sql);
        echo "<script> document.location='index.php?p=funcionario&status=todos' </script>";
    }

    //DESATIVAR DEPOIEMNTO NO BANCO DE DADOS
    public function Desativar($id)
    {
        $sql = "update tbl_funcionario set statusFuncionario = 'INATIVO' where idFuncionario = $id;";
        $conn = Conexao::LigarConexao();
        $conn->exec($sql);
        echo "<script> document.location='index.php?p=funcionario&status=todos' </script>";
    }
}
// Verifica se o formulário foi enviado verificando se a chave 'email' está presente no array $_POST
if (isset($_POST['email'])) {
    $funcionario = new funcionarioClass();
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $funcionario->emailFuncionario = $email;
    $funcionario->senhaFuncionario = $senha;

    if ($idFuncionario = $funcionario->VerificarLogin()) {

        session_start(); // Inicia uma sessão
        $_SESSION['idF$idFuncionario'] = $idFuncionario; // Define a variável de sessão 'idfuncionario' com o valor de $idfuncionario


        echo json_encode(['success' => true, 'message' => 'Login OK']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Login Invalido']);
    }
}
