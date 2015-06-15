<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "mylist".
 *
 * @property integer $id
 * @property string $header
 * @property string $content
 * @property string $img
 * @property string $author
 * @property string $date
 */
class Mylist extends \yii\db\ActiveRecord
{
    public $image;
    public $filename;
    public $string;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mylist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['header', 'content'], 'required'],
            [['content'], 'string'],
            [['date'], 'safe'],
            [['header','author'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
    return [
        'id' => 'ID',
        'header' => 'Header',
        'content' => 'Content',
        'img' => 'Img',
        'author' => 'Author',
        'date' => 'Date',
    ];
    }

    public function beforeSave($insert){
        $this->date = date("y-m-d");
        $this->author= Yii::$app->user->identity->username;
        if ($this->isNewRecord) {
            //generate & upload
            $this->string = substr(uniqid('img'), 0, 12); //imgRandomString
            $this->image = UploadedFile::getInstance($this, 'img');
            $this->filename = 'static/images/' . $this->string . '.' . $this->image->extension;
            $this->image->saveAs($this->filename);

            //save
            $this->img = $this->filename;
        }else{
            $this->image = UploadedFile::getInstance($this, 'img');
            if($this->image){
                $this->image->saveAs($this->img);
            }
        }

        return parent::beforeSave($insert);
    }
}
