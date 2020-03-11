<?php


namespace common\models;


use Yii;
use yii\base\Model;

class UpdatePassword extends Model
{
    public $oldPassword;
    public $newPassword;
    public $repeatNewPassword;


    public function rules()
    {
        return [
            [['oldPassword'], 'required', 'message' => '旧密码不能为空'],
            [['newPassword'], 'required', 'message' => '新密码不能为空'],
            [['repeatNewPassword'], 'required', 'message' => '新密码不能为空'],
            ['repeatNewPassword', 'compare', 'compareAttribute' => 'newPassword' , 'message' => '两次输入的密码不同'],
            ['oldPassword', 'validatePassword'],
        ];
    }

    /**
     * 修改密码
     * @return bool
     */
    public function update()
    {
        if ($this->validate()) {
            $user = User::find()->where([
                'username' => Yii::$app->user->identity->username
            ])->one();
            $user->setPassword($this->newPassword);
            if ($user->save()) {
                return true;
            }
        }

        return false;
    }

    /**
     * 验证密码
     * @param $attribute
     * @param $params
     */
    public function validatePassword($attribute, $params)
    {
        $user = User::find()->where([
            'username' => Yii::$app->user->identity->username
        ])->one();
        if (!$user || !$user->validatePassword($this->oldPassword)) {
            $this->addError($attribute, '旧密码错误.');
        }
    }


}
