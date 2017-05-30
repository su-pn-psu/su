<?php

namespace backend\modules\borrowreturn\models;

use Yii;

/**
 * This is the model class for table "borrowreturn".
 *
 * @property integer $booking_id
 * @property integer $confirm_status
 * @property string $confirm_comment
 * @property integer $confirm_staff_id
 * @property string $confirm_at
 * @property integer $deliver_status
 * @property integer $deliver_staff_id
 * @property string $deliver_at
 * @property integer $return_status
 * @property string $return_loss
 * @property string $return_because
 * @property integer $return_staff_id
 * @property string $return_at
 * @property string $entry_note
 *
 * @property Booking $booking
 * @property User $confirmStaff
 * @property User $deliverStaff
 * @property User $returnStaff
 */
class Borrowreturn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'borrowreturn';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['booking_id', 'confirm_status', 'confirm_comment', 'confirm_staff_id', 'confirm_at', 'deliver_status', 'deliver_staff_id', 'deliver_at', 'return_status', 'return_loss', 'return_because', 'return_staff_id', 'return_at', 'entry_note'], 'required'],
            [['booking_id', 'confirm_status', 'confirm_staff_id', 'deliver_status', 'deliver_staff_id', 'return_status', 'return_staff_id'], 'integer'],
            [['confirm_at', 'deliver_at', 'return_at'], 'safe'],
            [['entry_note'], 'string'],
            [['confirm_comment', 'return_loss', 'return_because'], 'string', 'max' => 255],
            [['booking_id'], 'exist', 'skipOnError' => true, 'targetClass' => Booking::className(), 'targetAttribute' => ['booking_id' => 'id']],
            [['confirm_staff_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['confirm_staff_id' => 'id']],
            [['deliver_staff_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['deliver_staff_id' => 'id']],
            [['return_staff_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['return_staff_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'booking_id' => 'bookingID',
            'confirm_status' => 'สถานะ-อนุมัติ',
            'confirm_comment' => 'ความเห็น-อนุมัติ',
            'confirm_staff_id' => 'เจ้าหน้าที่-อนุมัติ',
            'confirm_at' => 'วันที่-อนุมัติ',
            'deliver_status' => 'สถานะ-จ่ายของ',
            'deliver_staff_id' => 'เจ้าหน้าที่-จ่ายของ',
            'deliver_at' => 'วันที่-จ่ายของ',
            'return_status' => 'สถานะ-การคืน',
            'return_loss' => 'สิ่งที่ไม่คืน',
            'return_because' => 'ไม่คืนเนื่องจาก',
            'return_staff_id' => 'เจ้าหน้าที่-รับคืน',
            'return_at' => 'วันที่-รับคืน',
            'entry_note' => 'หมายเหตุ',
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
    public function getConfirmStaff()
    {
        return $this->hasOne(User::className(), ['id' => 'confirm_staff_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeliverStaff()
    {
        return $this->hasOne(User::className(), ['id' => 'deliver_staff_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReturnStaff()
    {
        return $this->hasOne(User::className(), ['id' => 'return_staff_id']);
    }
}
