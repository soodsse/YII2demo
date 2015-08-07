<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $status
 * @property string $meta_title
 * @property string $meta_desc
 * @property string $meta_keyword
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'slug', 'description', 'status', 'meta_title', 'meta_desc', 'meta_keyword'], 'required'],
            [['description', 'status', 'meta_desc'], 'string'],
            [['title', 'slug', 'meta_title'], 'string', 'max' => 100],
            [['meta_keyword'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'description' => 'Description',
            'status' => 'Status',
            'meta_title' => 'Meta Title',
            'meta_desc' => 'Meta Desc',
            'meta_keyword' => 'Meta Keyword',
        ];
    }
}
