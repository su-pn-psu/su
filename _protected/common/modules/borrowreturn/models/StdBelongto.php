<?php

namespace backend\modules\borrowreturn\models;

use Yii;

/**
 * This is the model class for table "std_belongto".
 *
 * @property integer $id
 * @property string $title
 * @property string $detail
 *
 * @property Booking[] $bookings
 */
class StdBelongto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'std_belongto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['detail'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'ชื่อสังกัด',
            'detail' => 'รายละเอียด',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['belongto_id' => 'id']);
    }
}
