<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property string $remark
 * @property integer $created_at
 * @property integer $updated_at
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'required','message' => '不能为空'],
            [['name'], 'string', 'max' => 20],
            [['remark'], 'string', 'max' => 100],
            [['name'], 'unique','message' => '类别名称不能重复']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '类别名称',
            'remark' => '说明',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }

    public function beforeSave($insert){
        if(parent::beforeSave($insert)){
            $time = time();
            if($this->isNewRecord){
                $this->created_at = $time;
            }
            $this->updated_at = $time;
            return true;
        }
        return false;
    }
}
