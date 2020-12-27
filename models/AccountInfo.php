<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account_info".
 *
 * @property int $id
 * @property string $account
 * @property string $name
 * @property int $gender
 * @property string $email
 * @property string $birthday
 * @property string $memo
 */
class AccountInfo extends \yii\db\ActiveRecord
{
    const FEMALE = 0;
    const MALE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'account_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender'], 'integer'],
            [['birthday'], 'safe'],
            [['memo'], 'string'],
            [['account', 'name', 'birthday', 'gender', 'email'], 'required'],
            [['account', 'name', 'email'], 'string', 'max' => 255],
            [['account'], 'match', 'pattern' => '/^[a-zA-Z0-9]*$/', 'message' => '請輸入英文或數字.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'account' => '帳號',
            'name' => '姓名',
            'gender' => '性別',
            'email' => 'Email',
            'birthday' => '生日',
            'memo' => '備註',
        ];
    }

    public static function getGenderStatusLabels()
    {
        return [
            self::FEMALE => '女性',
            self::MALE => '男性',
        ];
    }

    /* 帳號大小寫驗證
     * 必填:帳號、姓名、性別、生日、信箱
     * 帳號格式:英文+數字
     * 日期格式:生日
     * 信箱格式:信箱
     */
    public function beforeSave($insert)
    {
        $this->account = strtolower($this->account);
        return parent::beforeSave($insert);
    }
}
