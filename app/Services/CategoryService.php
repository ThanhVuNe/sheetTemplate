<?php

namespace App\Services;

use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryService
{
    public function __construct(
       private readonly CategoryRepositoryInterface $categoryRepository
    ) {
    }

    public function getAllCategory() {
        return $this->categoryRepository->getAll();
    }

    public function getCategoryWithTemplates() {
        return $this->categoryRepository->getAllWithTemplates();
    }
}
