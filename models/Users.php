<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 30.08.2015
 * Time: 13:41
 */

namespace app\models;

use yii\db\ActiveRecord;

class Users extends ActiveRecord
{

    public $captcha;

    /**
     * @return string the name of the table associated with this ActiveRecord class.
     */
    public static function tableName()
    {
        return 'users';
    }

    public function rules(){
        return [
            [['name', 'email', 'password'], 'required'],
            ['email', 'email'],
            [['captcha'], 'captcha'],
        ];
    }
}

