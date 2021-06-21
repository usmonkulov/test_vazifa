<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;


/**
 * This is the model class for table "nomzod".
 *
 * @property int $id
 * @property string $name
 * @property string $family_name
 * @property string $address
 * @property string $country_of_origin
 * @property string $email_adress
 * @property string $phone_number
 * @property int $age
 * @property int $hired
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Nomzod extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    const STATUS_YANGI = 1;
    const STATUS_INTERVYU_BELGILANGAN = 2;
    const STATUS_QABUL_QILINGAN = 3;
    const STATUS_QABUL_QILINMAGAN = 4;

    public $statusList = [
        self::STATUS_YANGI => 'Yangi',
        self::STATUS_INTERVYU_BELGILANGAN => 'Intervyu belgilangan',
        self::STATUS_QABUL_QILINGAN => 'Qabul qilingan',
        self::STATUS_QABUL_QILINMAGAN => 'Qabul qilinmagan',
    ];

    const HIRED_FALSE = 0;
    const HIRED_FRUE = 1;
    public $hiredList = [
        self::HIRED_FALSE => 'Yoq',
        self::HIRED_FRUE => 'Ha',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nomzod';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address'], 'string'],
            [['age', 'hired', 'status'], 'integer'],
            [['age'], 'number'],
            [['name', 'family_name', 'country_of_origin', 'phone_number', 'email_adress', 'age', 'address'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'family_name'], 'string', 'min' => 5],
            [['address'], 'string', 'min' => 10],
            [['name', 'family_name', 'country_of_origin', 'phone_number', 'email_adress'], 'string', 'max' => 255],
            ['email_adress', 'filter', 'filter' => 'trim'],
            ['email_adress', 'required'],
            ['email_adress', 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID raqami',
            'name' => 'Ism',
            'family_name' => 'Familiya',
            'address' => 'Manzil',
            'country_of_origin' => 'Kelib chiqqan mamlakat',
            'email_adress' => 'Elektron pochta',
            'phone_number' => 'Telefon taqami',
            'age' => 'Yoshi',
            'hired' => 'Ishga olingan',
            'status' => 'Holati',
            'created_at' => 'Yaratilgan sana',
            'updated_at' => 'O\'zgartirilgan sana',
        ];
    }

    public function getStatus($status)
    {
        return $this->statusList[$status];
    }
    public function status()
    {
        return [
            self::STATUS_YANGI => 'Yangi',
            self::STATUS_INTERVYU_BELGILANGAN => 'Intervyu belgilangan',
            self::STATUS_QABUL_QILINGAN => 'Qabul qilingan',
            self::STATUS_QABUL_QILINMAGAN => 'Qabul qilinmagan',
        ];
    }


    //ishga kirganmi yoqmi

    public function getHired($hired)
    {
        return $this->hiredList[$hired];
    }
    public function hired()
    {
        return [
            self::HIRED_FALSE => 'Yoq',
            self::HIRED_FRUE => 'Ha',
        ];
    }
}
