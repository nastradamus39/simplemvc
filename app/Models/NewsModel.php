<?php


namespace Models;

use Core\BaseModel;

class NewsModel extends BaseModel{


    protected $table = 'news';

    protected $onPage = 10;

    public function select($page, $onPage)
    {

        $statement = $this->dbn->prepare("SELECT * from {$this->table} LIMIT :start, :onpage;");

        $start = ($page-1)*$onPage;

        $statement->bindValue(":start", $start, PDO::PARAM_INT);
        $statement->bindValue(":onpage", $onPage, PDO::PARAM_INT);
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }


}