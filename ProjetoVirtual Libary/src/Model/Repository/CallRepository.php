<?php

namespace QI\VirtualLibary\Model\Repository;

use QI\VirtualLibary\Model\Book;
use \PDO;

class CallRepository{
    private $connection;

    public function __construct(){
        $this->connection = Connection::getConnection();
    }

    /**
     * Insert a new book in database
     * @param Book $book
     * @return bool
     */
    public function insert($book){
        $stmt = $this->connection->prepare("insert into books values(null,?,?,?,?,?,?);");
        $stmt->bindParam(1,$book->titlebook,PDO::PARAM_INT);
        $stmt->bindParam(2,$book->authorname->id,PDO::PARAM_INT);
        $stmt->bindParam(3,$book->genderbook,PDO::PARAM_INT);
        $stmt->bindParam(4,$book->numberchapters,PDO::PARAM_INT);
        $stmt->bindParam(5,$book->description);
        return $stmt->execute();
    }

    public function findAll(){
        $stmt = $this->connection->query("SELECT c.*,u.name FROM calls c inner join users u on c.user_id = u.id;");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function delete($id){
      $stmt = $this->connection->query("delete from books where id=$id");
      return $stmt->execute();
    }
}

   

