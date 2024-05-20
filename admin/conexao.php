<?php 
class conexao{
    public static function LigarConexao(){
        try {
            //Dados de conexão
            $hostname = 'smpsistema.com.br'; //IP OU URL DO HOST, NO CASO A GENTE USANDO O DO RICARDO AQ
            $dbname = 'u283879542_pethouse'; //NOME DO BANCO DE DADOS QUE VAI SER USADO
            $username = 'u283879542_pethouse'; //USERNAME QUE TEM ACESSO AO BANCO DE DADOS
            $password = 'Senac@pethouse01'; //SENHA PRO ACESSO, SEM ELA SEM BANCO

            //Aqui ta firmando uma nova conexão PDO, basicamente essa conexão é a conexão com o banco caso de certo ele retorna q deu certo caso contrario ele fala q deu pau
            $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            return $pdo;
            echo "Conexão deu certo";
        } catch (PDOException $erro) {
            echo "Deu pau na conexão" . $erro->getMessage();
        }      
    }
}