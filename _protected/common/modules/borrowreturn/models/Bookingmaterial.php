<?php

namespace backend\modules\borrowreturn\models;

use Yii;

/**
 * This is the model class for table "bookingmaterial".
 *
 * @property integer $booking_id
 * @property integer $material_id
 * @property string $return_condition
 *
 * @property Booking $booking
 * @property Material $material
 */
class Bookingmaterial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bookingmaterial';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['booking_id', 'material_id'], 'required'],
            [['booking_id', 'material_id'], 'integer'],
            [['return_condition'], 'string'],
            [['booking_id'], 'exist', 'skipOnError' => true, 'targetClass' => Booking::className(), 'targetAttribute' => ['booking_id' => 'id']],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'booking_id' => 'bookingID',
            'material_id' => 'materialID',
            'return_condition' => 'สภาพตอนคืน',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooking()
    {
        return $this->hasOne(Booking::className(), ['id' => 'booking_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterial()
    {
        return $this->hasOne(Material::className(), ['id' => 'material_id']);
    }
}
