<?php
namespace master\model\table;

class PostsTable extends Table
{
    /*
    * function paging
    * @return array
    */
    public function paging()
    {
        $req = $this->database->query(
            'SELECT COUNT(*) AS page FROM '. $this->table .'',
            true
        );
        return $req;
    }
}
