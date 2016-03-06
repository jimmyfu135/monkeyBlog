<?php

use yii\db\Migration;

class m160222_082241_article extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql'){
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('article', [
            'id' => $this->primaryKey(),//主键
            'title' => $this->string(50)->notNull(),//标题
            'content' => $this->text(),//内容
            //1：未审核；
            //2：已审核；     
            'status' => $this->integer()->defaultValue(1),//状态
            'user_id' => $this->integer(11)->notNull(),//所属用户
            'category_id' => $this->integer(11)->notNull(),//所属类别
            'created_at' => $this->integer()->notNull(),//创建于
            'updated_at' => $this->integer()->notNull(),//修改于       
        ],$tableOptions);
        
        $this->addForeignKey('useridkey', 'article', 'user_id', 'user', 'id');
        $this->addForeignKey('categoryidkey', 'article', 'category_id', 'category', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('categoryidkey', 'article');
        $this->dropForeignKey('useridkey', 'article');
        $this->dropTable('article');
    }
}
