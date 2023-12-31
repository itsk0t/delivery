<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Orders extends ActiveRecord {
    public static function tableName() {
        return 'orders';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created', 'updated'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function getItems() {
        return $this->hasMany(OrderItems::class, ['order_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['name', 'phone', 'comments', 'address_id'], 'required'],
            [['amount', 'status'], 'integer'],
            [['comments'], 'string'],
            [['created', 'updated'], 'safe'],
            [['name', 'phone'], 'string', 'max' => 32],
            ['user_id', 'default', 'value' => Yii::$app->user->getId()],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::class, 'targetAttribute' => ['address_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Ваше имя',
            'phone' => 'Номер телефона',
            'address' => 'Адрес доставки',
            'comments' => 'Комментарий к заказу',
        ];
    }

    public function addItems($basket) {
        $products = $basket['products'];
        foreach ($products as $product_id => $product) {
            $item = new OrderItems();
            $item->order_id = $this->id;
            $item->product_id = $product_id;
            $item->name = $product['name'];
            $item->price = $product['price'];
            $item->quantity = $product['count'];
            $item->cost = $product['price'] * $product['count'];
            $item->insert();
        }
    }
    public function getAddress()
    {
        return $this->hasOne(Address::class, ['id' => 'address_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getStatus()
    {
        switch ($this->status) {
            case 0: return 'Обрабатывается';
            case 1: return 'Готовится';
            case 2: return 'Собирается';
            case 3: return 'В пути';
            case 4: return 'Отменен';
        }
    }

    public function getColor()
    {
        switch ($this->status) {
            case 0: return '25';
            case 1: return '50';
            case 2: return '75';
            case 3: return '100';
            case 4: return '-danger';
        }
    }
}