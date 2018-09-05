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
    
    /*
	* function allWithLimit
    * @param int
    * @return array
    */
    public function allWithLimit($limit)
    {
        $req = $this->database->prepareWithLimit(
            'SELECT posts.id, posts.title, posts.intro, posts.content, posts.author, posts.image,
            MONTH(date_post) AS month,
            DAY(date_post) AS day,
            YEAR(date_post) AS year,
            DATE_FORMAT(date_post, \'%H:%i:%s\') AS hour
            FROM '. $this->table .'
            ORDER BY date_post DESC
            LIMIT :limit, 4',
            $limit
        );
        return $req;
    }
}
