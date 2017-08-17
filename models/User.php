<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{

    public function setPassword($password_hash)
    {
        $this->password_hash = sha1($password_hash);
    }

    public function validatePassword($password_hash)//проверяет соответствие паролей
    {
        return $this->password_hash === sha1($password_hash);
    }

    //-------------------------------Realization IdentityInterface

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public function getId()
    {
        return $this->id;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {

    }


    public function getAuthKey()
    {

    }

    public function validateAuthKey($authKey)
    {

    }
}
