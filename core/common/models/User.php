<?php

namespace common\models;

use vinacms\tools\upload\UploadImageBehavior;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $full_name
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $about_me
 * @property string $phone_number
 * @property string $avatar
 * @property string $auth_key
 * @property integer $status
 * @property integer $roles
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @var
     */
    public $roles;
    public $password_confirm;
    const STATUS_DEACTIVATED = 0;
    const STATUS_ACTIVE = 1;

    const ROLE_BANNED = 'BANNED';
    const ROLE_MEMBER = 'MEMBER';
    const ROLE_EDITOR = 'EDITOR';
    const ROLE_MANAGER = 'MANAGER';
    const ROLE_ADMIN = 'ADMIN';
    const ROLE_SUPER_ADMIN = 'SUPER_ADMIN';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['roles', 'default', 'value' => self::ROLE_MEMBER],
            ['roles', 'in', 'range' => [
                self::ROLE_BANNED,
                self::ROLE_MEMBER,
                self::ROLE_EDITOR,
                self::ROLE_MANAGER,
                self::ROLE_ADMIN,
                self::ROLE_SUPER_ADMIN
            ]],
            ['roles', 'safe'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [
                self::STATUS_ACTIVE,
                self::STATUS_DEACTIVATED
            ]],

            [['phone_number'], 'string', 'max' => 30],
            [['phone_number'], 'match', 'pattern' => '/^(?:00|\+)[0-9]{4}-?[0-9]{7}$/'],

            ['full_name', 'filter', 'filter' => 'strip_tags'],
            ['full_name', 'trim'],
            ['full_name', 'required'],
            ['full_name', 'string', 'max' => 70],

            ['about_me', 'string'],

            ['avatar', 'image'],
            ['password', 'safe'],
            ['password_confirm', 'compare', 'compareAttribute' => 'password', 'message' => \Yii::t('app', 'Password does not match the confirm password.')],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            [
                'email',
                'unique',
                'targetClass' => User::className(),
                'message' => \Yii::t('app', 'This email address has already been taken.'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['email' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public static function statuses()
    {
        return [
            self::STATUS_ACTIVE => Yii::t('app', 'Active'),
            self::STATUS_DEACTIVATED => Yii::t('app', 'Deactivated'),
        ];
    }

    public function getStatusLabel()
    {
        return static::statuses()[$this->status];
    }

    public static function roles()
    {
        return [
            self::ROLE_SUPER_ADMIN => Yii::t('app', 'Super Admin'),
            self::ROLE_ADMIN => Yii::t('app', 'Admin'),
            self::ROLE_MANAGER => Yii::t('app', 'Manager'),
            self::ROLE_EDITOR => Yii::t('app', 'Editor'),
            self::ROLE_MEMBER => Yii::t('app', 'Member'),
            self::ROLE_BANNED => Yii::t('app', 'Banned'),
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
}
