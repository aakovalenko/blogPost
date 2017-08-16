<?php

namespace app\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord
{
    public function setPassword($password_hash){
        $this->password_hash = sha1($password_hash);
    }
}
