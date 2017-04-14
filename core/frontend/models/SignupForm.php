<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use yii\db\Exception;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $full_name;
    public $username;
    public $email;
    public $password;
    public $password_confirm;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['full_name', 'filter', 'filter' => 'strip_tags'],
            ['full_name', 'trim'],
            ['full_name', 'required'],
            ['full_name', 'string', 'max' => 70],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => \Yii::t('app','This email address has already been taken.')],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['password_confirm', 'compare', 'compareAttribute' => 'password', 'message' => \Yii::t('app', 'Password does not match the confirm password.')],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->email = $this->email;
        $user->full_name = $this->full_name;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $transaction = \Yii::$app->db->beginTransaction();
        try {
            $user->save();
            $uid = $user->getId();
            $auth = \Yii::$app->authManager;
            $auth->assign($auth->getRole(User::ROLE_MEMBER), $uid);
            $transaction->commit();
            return $user;
        } catch (Exception $exception) {
            $transaction->rollBack();
            throw new Exception($exception->getMessage());
        }
    }
}
