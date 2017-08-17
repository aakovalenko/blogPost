<?php

namespace app\models;

use yii\base\Model;


/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $email;
    public $password_hash;
    public $rememberMe = true;

    public function rules()
    {
        return [
            [['email', 'password_hash'],'required'],
            ['email','email'],
            ['email','unique','targetClass' => 'app\models\LoginForm'],
            ['password_hash', 'string', 'min'=>2, 'max'=>10],
            ['password_hash', 'validatePassword'] //собственная функция для дальнейшего сравнения пароля

        ];
    }

    public function attributeLabels()
    {
        return [
          'password_hash' => 'Пароль',
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) //если нет ошибок в валидации
        {

            $user = $this->getUser();// получаем пользователя для дальнейшего сравнения пароля

            if(!$user || !$user->validatePassword($this->password_hash))
            {
               // если мы Не нашли в базе такого пользователя
          //  или введенный пароль и пароль и пользователь в базе НЕ равны ТО
                $this->addError($attribute, 'Пароль или пользователь введены неверно');
                //добавляем новую ошибку для атрибута password_hash о том что пароль или емайл введены неверно
            }
        }
    }

    public function getUser()
    {
        return User::findOne(['email'=>$this->email]); //а получаем его по введеному емейлу
    }
}
