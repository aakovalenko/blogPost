<?php
/**
 * Created by PhpStorm.
 * User: andri
 * Date: 17.08.17
 * Time: 9:51
 */

namespace app\models;

use dektrium\user\models\RegistrationForm as BaseRegistrationForm;


class Captcha extends BaseRegistrationForm
{
    /**
     * @var string
     */
    public $captcha;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['captcha', 'required'];
        $rules[] = ['captcha', 'captcha'];

        $rules['usernameLength'] = ['username', 'string', 'min' => 2, 'max' => 255];

        return $rules;
    }
}

