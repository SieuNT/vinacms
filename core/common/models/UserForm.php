<?php

namespace common\models;

use Yii;
use yii\db\Exception;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $full_name
 * @property string $phone_number
 * @property string $address
 * @property string $avatar
 * @property string $about_me
 * @property string $email
 * @property string $password
 * @property string $password_confirm
 * @property array $roles
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class UserForm extends \yii\db\ActiveRecord
{

    public $password;
    public $password_confirm;
    public $roles;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['roles', 'default', 'value' => User::ROLE_MEMBER],
            ['roles', 'in', 'range' => [
                User::ROLE_BANNED,
                User::ROLE_MEMBER,
                User::ROLE_EDITOR,
                User::ROLE_MANAGER,
                User::ROLE_ADMIN,
                User::ROLE_SUPER_ADMIN
            ]],
            ['roles', 'safe'],
            ['status', 'default', 'value' => User::STATUS_ACTIVE],
            ['status', 'in', 'range' => [
                User::STATUS_ACTIVE,
                User::STATUS_DEACTIVATED
            ]],

            [['full_name', 'email'], 'required'],
            [['about_us'], 'string'],
            [['status'], 'integer'],
            [['full_name'], 'string', 'max' => 70],

            [['phone_number'], 'string', 'max' => 30],
            [['phone_number'], 'match', 'pattern' => '/\(?\d+\)?[-.\s]?\d+[-.\s]?\d+/'],

            [['address', 'avatar', 'email'], 'string', 'max' => 255],
            [['email'], 'unique', 'targetClass' => '\common\models\User', 'message' => \Yii::t('app','This email address has already been taken.')],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['password_confirm', 'compare', 'compareAttribute' => 'password', 'message' => \Yii::t('app', 'Password does not match the confirm password.')],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'full_name' => Yii::t('app', 'Full Name'),
            'phone_number' => Yii::t('app', 'Phone Number'),
            'address' => Yii::t('app', 'Address'),
            'avatar' => Yii::t('app', 'Avatar'),
            'about_me' => Yii::t('app', 'About Me'),
            'email' => Yii::t('app', 'Email'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function create()
    {
        $user = new User();
        $user->full_name = $this->full_name;
        $user->email = $this->email;
        $user->phone_number = $this->phone_number;
        $user->avatar = $this->avatar;
        $user->about_me = $this->about_me;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $transaction = \Yii::$app->db->beginTransaction();
        try {
            $user->save();
            $uid = $user->getId();
            $auth = \Yii::$app->authManager;
            $auth->assign($auth->getRole($this->roles), $uid);
            $transaction->commit();
            return true;
        } catch (Exception $exception) {
            $transaction->rollBack();
            throw new Exception($exception->getMessage());
        }
    }
}
