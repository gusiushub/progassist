<?php
/**
 * Created by PhpStorm.
 * User: zolow
 * Date: 19.03.2018
 * Time: 5:02
 */

namespace app\models;

use Yii;
use yii\base\Model;

class CommentForm extends Model
{
    public $comment;

    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'],'string','length'=>[3,250]]
        ];
    }

    public function saveComment($article_id)
    {
        $comment = new Comment;
        $comment->text = $this->comment;
        $comment = Yii::$app->user->id;
    }
}