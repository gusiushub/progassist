<?php

namespace app\models;

use yii\base\Model;

class Login extends Model
{
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['email','password'], 'required'],
            ['email','email'],
            ['password','validatePassword']//собственная функция для валидации пароля
        ];
    }
    public function validatePassword($attribute,$params)
    {
        //если нет ошибок в валидации
        if(!$this->hasErrors()){
            //получаем пользователя для дальнейшего сравнения пароля
            $user = $this->getUser();
            if (!user || !$user->validatePassword($this->password)){
                //если мы не нашли в базе такого пользователя
                //или введенный пароль пользователя не совпадает с паролем в базе то
                $this->addError($attribute,'Пароль или email не верны');
                //добавляем новую ошибку для атрибута password о том что пароль или email введены не верно
            }
        }
    }
    public function getUser()
    {
        //пользователя мы получаем по ввведенному email
        return User::findOne(['email'=>$this->email]);
    }

}