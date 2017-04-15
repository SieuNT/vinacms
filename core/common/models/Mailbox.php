<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "mailbox".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $source
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $secret_key
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 *
 */
class Mailbox extends \yii\db\ActiveRecord
{
    public $secret_key = '';
    public $content;
    public $created_at;
    public $updated_at;
    public $source;
    public $name;
    public $email;
    public $phone;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mailbox';
    }

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
            [['content'], 'string'],
            [['created_at', 'updated_at', 'secret_key'], 'safe'],
            [['source', 'secret_key', 'name', 'email', 'phone'], 'string', 'max' => 255],
            [['name', 'email', 'phone'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'secret_key' => Yii::t('app', 'Mã bí mật'),
            'source' => Yii::t('app', 'Nguồn'),
            'name' => Yii::t('app', 'Họ và Tên'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Số điện thoại'),
            'content' => Yii::t('app', 'Nội dung'),
            'created_at' => Yii::t('app', 'Ngày liên hệ'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
