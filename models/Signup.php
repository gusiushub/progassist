<?php

namespace app\models;


use yii\base\Model;

class Signup extends Model
{
    public $email;
    public $password;
    public $username;

    public function rules()
    {
        return [
            [['email','password','username'], 'required'],
            ['email','email'],
            //Проверка уникальности username
            ['username','unique','targetClass'=>'app\models\User'],
            //Проверка уникальности email
            ['email','unique','targetClass'=>'app\models\User'],
            ['password','string','min'=>2,'max'=>10]
        ];
    }
    public function signup()
    {
        $user = new User();
        $user->email = $this->email;
        $user->username = $this->username;
        $user->password = sha1($this->password);
        return $user->save();
    }
}