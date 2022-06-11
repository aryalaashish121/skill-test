<?php

namespace App\Actions;

use App\Models\Category;

class UpdateCategory
{
    /**
     * Update the category.
     *
     * @param Category $category
     * @param string $title
     * @param string $description
     * @return Category
     */
    public function execute(
        Category $category, 
        string $title, 
        string $description
    ): Category {
        $category->update([
            'title' => $title,
            'description' => $description
        ]);

        return $category;
    }
}