<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account".
 *
 * @property int $id
 * @property int $user_id
 * @property int $application_id
 * @property int $address_id
 *
 * @property Address $address
 * @property Applications $application
 * @property User $user
 */
class Account extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'account';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'application_id', 'address_id'], 'required'],
            [['user_id', 'application_id', 'address_id'], 'integer'],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::class, 'targetAttribute' => ['address_id' => 'id']],
            [['application_id'], 'exist', 'skipOnError' => true, 'targetClass' => Applications::class, 'targetAttribute' => ['application_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'application_id' => 'Application ID',
            'address_id' => 'Address ID',
        ];
    }

    /**
     * Gets query for [[Address]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Address::class, ['id' => 'address_id']);
    }

    /**
     * Gets query for [[Application]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplication()
    {
        return $this->hasOne(Applications::class, ['id' => 'application_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
