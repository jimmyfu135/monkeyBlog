<?php

use yii\db\Schema;
use yii\db\Migration;

class m160206_035045_category extends Migration
{
    //saveUp：包含有事务的方法
    public function safeUp()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql'){
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%category}}',[
            'id' => $this->primaryKey(),//主键
            'name' => $this->string(20)->notNull()->unique(),//类别名称
            'remark' => $this->string(100),//说明
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ],$tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }

}
