<?php
/**
 * Created by IntelliJ IDEA.
 * User: lyz1990
 * Date: 16-1-27
 * Time: 下午1:28
 */

namespace App\Transformers;


class PostTransformer extends Transformer
{

    public function transform($post)
    {
        return [
            'id' => $post['id'],
            'category_id' => $post['category_id'],
            'title' => $post['title'],
            'slug' => $post['slug'],
            'content' => $post['content'],
            'published_at' => $post['published_at'],
            'created_at' => $post['created_at'],
            'updated_at' => $post['updated_at']
        ];
    }
}