<?php

namespace App\Models\User;

use App\Models\BaseModel;

class Comment extends BaseModel
{
    protected $item = "comment";
    public function getComment($id)
    {
        $sql = "SELECT * from $this->item
        join product on $this->item.id_pro = product.id
        join account on $this->item.id_user = account.id
        where id_pro = '$id'";
        // var_dump($sql);
        // die;
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addComment($id_user, $id_pro, $comment)
    {
        $sql = "INSERT INTO $this->item(id_user,id_pro,comment)VALUES('?,'?','?')";
        $this->setQuery($sql);
        return $this->execute([$id_user, $id_pro, $comment]);
    }
}
