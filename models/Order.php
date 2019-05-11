<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id ID
 * @property int $customer_id
 * @property int $order_id
 * @property string $mobile ¥ÎŽ¢ªº¤âÉóŽ¼
 * @property string $created_at ­qãªº³Ð«Øg¶¡
 * @property string $updated_at ­qãªº­×§ïg¶¡
 * @property int $status 0 ¥¼ŽÀ²z 1ŽÀ²z¤¤ 2¤wŽÀ²z
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'order_id', 'mobile', 'created_at', 'updated_at'], 'required'],
            [['customer_id', 'order_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['mobile'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'order_id' => 'Order ID',
            'mobile' => 'Mobile',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    //订单属于那个客户
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id'=> 'customer_id'])->asArray();
    }
}
