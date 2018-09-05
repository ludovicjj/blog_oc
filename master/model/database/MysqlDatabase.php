<?php
namespace master\model\database;

use \PDO;

class MysqlDatabase
{
    private $db_user;
    private $db_pass;
    private $db_host;
    private $db_name;
    private $pdo;
	
    public function __construct($db_user, $db_pass, $db_host, $db_name)
    {
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
        $this->db_name = $db_name;
    }
	
    private function getPdo()
    {
        if ($this->pdo === null) {
            try {
                $this->pdo = new PDO(
                    'mysql:dbname='.$this->db_name .';host='.$this->db_host .';charset=utf8',
                    $this->db_user,
                    $this->db_pass
                );
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        }
        return $this->pdo;
    }
}
