<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginFormAdmin extends Model
{
    public $username;
    public $password;
    public $rememberMe = false;

    private $_user;
    public $verifyCode;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username'], 'required', 'message' => '用户名不能为空'],
            [['password'], 'required', 'message' => '密码不能为空'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, '用户名或者密码错误.');
            }
        }
    }

    public function login()
    {
        $aa = $this->getUser();
        $bb = $aa->id;
        $cc = Yii::$app->authManager->getAssignments($bb);
        if ($this->validate()) {
            if ($cc) {
                $update = User::findOne($bb);
                $update->last_login_time = time();
                if ($update->save()) {
                    return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 10 : 0);
                }
                return false;
            }else {
                echo "<script> alert('对不起，你不是管理员，你没有权限登录后台管理系统'); </script>";
            }
        }
        return false;
    }


    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
