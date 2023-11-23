<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property string $city
 * @property string $street
 * @property string $house
 * @property int $entrance
 * @property int $floor
 * @property int $apartment
 * @property int $user_id
 *
 * @property Account[] $accounts
 * @property User $user
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city', 'street', 'house', 'entrance', 'floor', 'apartment'], 'required'],
            [['entrance', 'floor', 'apartment'], 'integer'],
            ['user_id', 'default', 'value'=>Yii::$app->user->getId()],
            [['city', 'street'], 'string', 'max' => 64],
            [['house'], 'string', 'max' => 11],
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
            'city' => 'Город',
            'street' => 'Улица',
            'house' => 'Дом',
            'entrance' => 'Подъезд',
            'floor' => 'Этаж',
            'apartment' => 'Квартира',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Accounts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccounts()
    {
        return $this->hasMany(Account::class, ['address_id' => 'id']);
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
