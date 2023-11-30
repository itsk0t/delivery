<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "applications".
 *
 * @property int $id
 * @property int $user_id
 * @property int $basket_id
 * @property string $date
 * @property string $comment
 * @property int $status
 * @property int $delivery_method
 * @property int $payment_method
 *
 * @property Account[] $accounts
 * @property Basket $basket
 * @property User $user
 */
class Applications extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'applications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'basket_id', 'date', 'comment', 'delivery_method', 'payment_method'], 'required'],
            [['user_id', 'basket_id', 'status', 'delivery_method', 'payment_method'], 'integer'],
            [['date'], 'safe'],
            [['comment'], 'string'],
            [['basket_id'], 'exist', 'skipOnError' => true, 'targetClass' => Basket::class, 'targetAttribute' => ['basket_id' => 'id']],
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
            'basket_id' => 'Basket ID',
            'date' => 'Date',
            'comment' => 'Comment',
            'status' => 'Status',
            'delivery_method' => 'Delivery Method',
            'payment_method' => 'Payment Method',
        ];
    }

    /**
     * Gets query for [[Accounts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccounts()
    {
        return $this->hasMany(Account::class, ['application_id' => 'id']);
    }

    /**
     * Gets query for [[Basket]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBasket()
    {
        return $this->hasOne(Basket::class, ['id' => 'basket_id']);
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

    public function getStatus()
    {
        switch ($this->status) {
            case 0: return 'Оформляется';
            case 1: return 'Готовится';
            case 2: return 'На сборке';
            case 3: return 'В пути';
            case 4: return 'Отказ';
        }
    }
}
