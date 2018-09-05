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
    
    /*
    * function postWithId
    * @return array
    */
    public function postWithId($id_posts)
    {
        $req = $this->database->prepare(
            'SELECT posts.id, posts.title, posts.intro, posts.content, posts.author, posts.image,
            MONTH(date_post) AS month,
            DAY(date_post) AS day,
            YEAR(date_post) AS year,
            DATE_FORMAT(date_post, \'%H:%i:%s\') AS hour
            FROM '. $this->table .'
            WHERE id = ?',
            [$id_posts],
            true
        );
        return $req;
    }
    
    /*
    * function all
    * @return array
    */
    public function all()
    {
        $req = $this->database->query(
            'SELECT posts.id, posts.title, posts.intro, posts.content, posts.author, posts.image,
            MONTH(date_post) AS month,
            DAY(date_post) AS day,
            YEAR(date_post) AS year,
            DATE_FORMAT(date_post, \'%H:%i:%s\') AS hour
            FROM '. $this->table .'
            ORDER BY date_post DESC'
        );
        return $req;
    }
    
    /*
	* function addPost
    * @pram string title
    * @pram string intro
    * @pram string content
    * @pram string author
    * @pram string image
    */
    public function addPost($title, $intro, $content, $author, $image)
    {
        $this->database->prepare(
            'INSERT INTO '. $this->table .' SET title = ?, intro = ?, content = ?, author = ?, image = ?',
            [$title, $intro, $content, $author, $image]
        );
    }
    
    /*
    * function editPostWithId
    * @pram string title
    * @pram string intro
    * @pram string content
    * @pram string author
    * @pram string image
    * @param int id
    */
    public function editPostWithId($title, $intro, $content, $author, $image, $id_posts)
    {
        $this->database->prepare(
            'UPDATE '. $this->table .'
            SET title = ?, intro = ?, content = ?, author = ?, image = ?, date_post = NOW()
            WHERE id = ?',
            [$title, $intro, $content, $author, $image, $id_posts]
        );
    }
    
    /*
    * function deletePostAndComments
    * @param int id
    */
    public function deletePostAndComments($id_posts)
    {
        $req = $this->database->prepare(
            'DELETE FROM '. $this->table .'
            WHERE id = ?',
            [$id_posts]
        );
        $req = $this->database->prepare(
            'DELETE FROM comments
            WHERE post_id = ?',
            [$id_posts]
        );
    }
}
