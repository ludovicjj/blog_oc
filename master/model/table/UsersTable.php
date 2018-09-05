<?php
namespace master\model\table;

class UsersTable extends Table
{
    /*
    * function usersExists
    * @param string username
    * @param string mail
    * @return array
    */
    public function usersExists($username, $mail)
    {
        $req = $this->database->prepare(
            'SELECT COUNT(*) AS user
            FROM '. $this->table .'
            WHERE username = ? OR mail = ?',
            [$username, $mail],
            true
        );
        return $req;
    }
    
    /*
    * function addUser
    * @param string username
    * @param string password
    * @param string mail
    */
    public function addUser($username, $password, $mail)
    {
        $this->database->prepare(
            'INSERT INTO '. $this->table .' SET username = ?, password = ?, mail = ?',
            [$username, $password, $mail]
        );
    }
    
    /*
    * function loginUser
    * @param string username
    * @param string password
    * @return array
    */
    public function loginUser($username, $password)
    {
        $user = $this->database->prepare(
            'SELECT * FROM '.$this->table .' WHERE username = ? AND password = ?',
            [$username, $password],
            true
        );
        return $user;
    }
}
