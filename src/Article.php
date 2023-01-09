<?php

namespace App\src;

class Article
{
    public $title;

    public function getSlug()
    {
        $slug = strtolower($this->title);
        $slug = trim(preg_replace('/[^\w]+/',' ', $slug));
        return preg_replace('/\s+/', '_', $slug);
    }
}