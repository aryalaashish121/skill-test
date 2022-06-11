<?php

namespace App\Actions;

use App\Models\Category;

class CreateCategory
{
    /**
     * Store a new category in storage.
     *
     * @param string $title
     * @param string $description
     * @return Category
     */
    public function execute(string $title, string $description): Category
    {
        $category = Category::create([
            'title' => $title,
            'description' => $description
        ]);

        return $category;
    }
}