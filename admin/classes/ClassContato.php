<?php
require_once('conexao.php');

class ClassContato{
    public $idContato;
    public $nomeContato;
    public $telefoneContato;
    public $mesagemContato;
    public $statusContato;
    public $dataContato;
    public $horaContato;

    public function Listar(){
        $sql = "SELECT * FROM tbl_contato WHERE statusContato = 'ATIVO' ORDER BY dataContato ASC"; //COMANDO QUE VAI SER EXECUTADO NO BANCO DE DAODS
        $conn = conexao::LigarConexao(); //LIGA A CONEXÃO COM O BANCO
        $resultado = $conn->query(sql); // A VARIAVEL TA RECEBENDO A PESQUISA E FAZENDO ELA NO BANCO
        $lista = $resultado->fetchAll(); // A LISTA TA RECEBENDO OS DADOS LA DO BANCO E TRANSFORMANDO EM ARRAY 
        return $lista; //TA MANDANDO COMO RESPOSTA PRA QUEM CHAMA ESSE METODO
    }

    public function Inserir(){
        $sql = "INSERT INTO tbl_contato (nomeContato, emailContato, telefoneContato, messagemContato, statusContato, DataContato, horaContato) 
                VALUES('". $this->nomeContato ."','". $this->emailContato ."','". $this->telefoneContato ."','". $this->mesagemContato ."','". $this->statusContato ."')";
                 //COMANDO QUE VAI LA NO DB
         $conn = conexao::LigarConexao(); //LIGA A CONEXÃO COM O BANCO
         $conn->exec($sql); //EXECUTA O COMANDO LA NO DB
    } 

}