<?php

    /*
        CLASSE RESPONS�VEL POR INTERAGIR COM OS DADOS DO USU�RIO.
    */

    namespace App\Entity;

    // Depend�ncias necess�rias:
    use \App\Db\Database;
    use \PDO;


    class Usuario
    {
        // Vari�vel respons�vel por armazenar o ID do usu�rio:
        public $id;

        // Vari�vel respons�vel por armazenar o NOME do usu�rio:    
        public $nome;

        // Vari�vel respons�vel por armazenar o EMAIL do usu�rio:
        public $email;

        // Vari�vel respons�vel por armazenar o NOME DE USUARIO do usu�rio:
        public $username;

        // Vari�vel respons�vel por armazenar a HASH da SENHA do usu�rio:
        public $senha;


        // M�todo respons�vel por cadastrar um novo usu�rio no banco de dados:
        public function cadastrar()
        {
            // Inst�nciando o banco de dados:
            $objDatabase = new Database('usuarios');

            // Inserindo um novo usu�rio:
            $this->id = $objDatabase->insert([
                                              "nome"  => $this->nome,
                                              "email" => $this->email,
                                              "username" => $this->username,
                                              "senha" => $this->senha  
                                            ]);

            // Retornando sucesso:
            return true;
        }


        // M�todo respons�vel por retornar uma inst�ncia de usu�rio com base no email recebido:
        public static function getUsuarioPorEmail($email)
        {
            return (new Database('usuarios'))->select('email = "'.$email.'"')->FetchObject(self::class);
        }




    }

?>