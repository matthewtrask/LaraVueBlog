<?php
/**
 * Created by IntelliJ IDEA.
 * User: lyz1990
 * Date: 16-1-27
 * Time: 下午1:27
 */
namespace App\Transformers;

abstract class Transformer
{
    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($item);

}