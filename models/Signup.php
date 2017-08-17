<?php
/**
 * Created by PhpStorm.
 * User: kaa
 * Date: 16.08.2017
 * Time: 7:00
 */

namespace app\models;

use yii\base\Model;
use app\models\User;


class Signup extends Model
{
    public $username;
    public $email;
    public $password_hash;

    public function rules()
    {
        return [
            [['email', 'password_hash', 'username'],'required'],
            ['email','email'],
            ['email','unique','targetClass' => 'app\models\User'],
            ['password_hash', 'string', 'min'=>2, 'max'=>10],


        ];
    }

    public function signup()// запись в бд
    {
        $user = new User();

        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password_hash);
        return $user->save();
    }

    public function attributeLabels()
    {
        return [
          'username' => 'Имя',
          'password_hash' => 'Пароль',
        ];
    }

    public function validatePassword($attribute, $params)
    {
        $user = User::findOne(['email'=>$this->email]);
    }

}