<?php

namespace App\Repositories;

use App\Models\Template;
use App\Repositories\Interfaces\TemplateRepositoryInterface;

class TemplateRepository extends Repository implements TemplateRepositoryInterface
{
    const SIZE = 8;

    public function getModel()
    {
        return Template::class;
    }

    public function getAllWithCategory($categoryId = null) {
        return $this->model->with('category')
            ->when(isset($categoryId) && $categoryId !== '', function ($query) use ($categoryId) {
                return $query->where('category_id', $categoryId);
            })
            ->paginate(self::SIZE)->withQueryString();
    }
}
