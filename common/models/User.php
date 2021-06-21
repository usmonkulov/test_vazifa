<?php
namespace common\models;

use common\rbac\models\Role;
use kartik\password\StrengthValidator;
use yii\behaviors\TimestampBehavior;
use Yii;
use yii\helpers\FileHelper;

/**
 * This is the user model class extending UserIdentity.
 * Here you can implement your custom user solutions.
 * 
 * @property Role[] $role
 * @property Article[] $articles
 */
class User extends UserIdentity
{
    public $images;

    // the list of status values that can be stored in user table
    const STATUS_ACTIVE   = 10;
    const STATUS_INACTIVE = 1;
    const STATUS_DELETED  = 0;   

    /**
     * List of names for each status.
     * @var array
     */
    public $statusList = [
        self::STATUS_ACTIVE   => 'Faol',
        self::STATUS_INACTIVE => 'Faol emas',
        self::STATUS_DELETED  => 'O\'chirilgan'
    ];

    /**
     * We made this property so we do not pull hashed password from db when updating
     * @var string
     */
    public $password;

    /**
     * @var \common\rbac\models\Role
     */
    public $item_name;

    /**
     * Returns the validation rules for attributes.
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['username', 'match',  'not' => true,
                // we do not want to allow users to pick one of spam/bad usernames 
                'pattern' => '/\b('.Yii::$app->params['user.spamNames'].')\b/i',
                'message' => Yii::t('yii', 'Ushbu foydalanuvchi nomiga ega bo\'lishning iloji yo\'q.')],
            ['username', 'unique', 
                'message' => Yii::t('yii', 'Ushbu foydalanuvchi nomi allaqachon olingan.')],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 
                'message' => Yii::t('yii', 'Ushbu elektron pochta manzili allaqachon olingan.')],

            // password field is required on 'create' scenario
            ['password', 'required', 'on' => 'create'],
            // use passwordStrengthRule() method to determine password strength
            $this->passwordStrengthRule(),

            ['status', 'required'],
            ['item_name', 'string', 'min' => 3, 'max' => 64],
            [['images'], 'file',  'extensions' => ['png','jpg','jpeg','gif']],
        ];
    }

    /**
     * Set password rule based on our setting value (Force Strong Password).
     *
     * @return array Password strength rule.
     */
    private function passwordStrengthRule()
    {
        // get setting value for 'Force Strong Password'
        $fsp = Yii::$app->params['fsp'];

        // password strength rule is determined by StrengthValidator 
        // presets are located in: vendor/kartik-v/yii2-password/presets.php
        $strong = [['password'], StrengthValidator::className(), 'preset'=>'normal'];

        // normal yii rule
        $normal = ['password', 'string', 'min' => 6];

        // if 'Force Strong Password' is set to 'true' use $strong rule, else use $normal rule
        return ($fsp) ? $strong : $normal;
    }

    /**
     * Returns a list of behaviors that this component should behave as.
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * Returns the attribute labels.
     *
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID raqami',
            'username' => 'Foydalanuvchi nomi',
            'images' => 'Rasm',
            'password' => 'Parol',
            'email' => 'Elektron pochta',
            'status' => 'Holati',
            'created_at' => 'Yaratilgan sana',
            'updated_at' => 'O\'zgartirilgan sana',
            'item_name' => 'Huquqi'
        ];
    }

    /**
     * Relation with Role model.
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        // User has_one Role via Role.user_id -> id
        return $this->hasOne(Role::className(), ['user_id' => 'id']);
    }

//------------------------------------------------------------------------------------------------//
// USER FINDERS
//------------------------------------------------------------------------------------------------//

    /**
     * Finds user by username.
     *
     * @param  string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }  

    /**
     * Finds user by email.
     *
     * @param  string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    } 

    /**
     * Finds user by password reset token.
     *
     * @param  string $token Password reset token.
     * @return null|static
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => User::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by account activation token.
     *
     * @param  string $token Account activation token.
     * @return static|null
     */
    public static function findByAccountActivationToken($token)
    {
        return static::findOne([
            'account_activation_token' => $token,
            'status' => User::STATUS_INACTIVE,
        ]);
    }
  
//------------------------------------------------------------------------------------------------//
// HELPERS
//------------------------------------------------------------------------------------------------//

    /**
     * Returns the user status in nice format.
     *
     * @param  integer $status Status integer value.
     * @return string          Nicely formatted status.
     */
    public function getStatusName($status)
    {
        return $this->statusList[$status];
    }

    /**
     * Returns the role name.
     * If user has any custom role associated with him we will return it's name, 
     * else we return 'member' to indicate that user is just a member of the site with no special roles.
     *
     * @return string
     */
    public function getRoleName()
    {
        // if user has some role assigned, return it's name
        if ($this->role) {
            return $this->role->item_name;
        }
        
        // user does not have role assigned, but if he is authenticated '@'
        return '@uthenticated';
    }

    /**
     * Generates new password reset token.
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
    
    /**
     * Removes password reset token.
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * Finds out if password reset token is valid.
     * 
     * @param  string $token Password reset token.
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * Generates new account activation token.
     */
    public function generateAccountActivationToken()
    {
        $this->account_activation_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes account activation token.
     */
    public function removeAccountActivationToken()
    {
        $this->account_activation_token = null;
    }

    public function upload()
    {
        $directory = 'upload' . DIRECTORY_SEPARATOR . 'store' . DIRECTORY_SEPARATOR;
        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }
        $filename = $this->getImage();
        $file = 'upload/store/' . $filename->filePath;
        if($this->validate()){
            $path = 'upload/store/' . $this->images->baseName . '.' . $this->images->extension;
            $this->images->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            @unlink($file);
            return true;
        }else{
            return false;
        }
    }

}
