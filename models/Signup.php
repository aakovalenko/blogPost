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
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['email', 'password'],'required'],
            ['email','email'],
            ['email','unique','targetClass' => 'app\models\User'],
            ['password', 'string', 'min'=>2, 'max'=>10]

        ];
    }

    public function signup()// запись в бд
    {
        $user = new User();

        $user->email = $this->email;
        $user->setPassword($this->password);
        return $user->save();
    }
}