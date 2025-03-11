<?php

namespace App\Repositories;

use App\Models\Template;
use App\Repositories\Interfaces\TemplateRepositoryInterface;

class TemplateRepository extends Repository implements TemplateRepositoryInterface
{
    public function getModel()
    {
        return Template::class;
    }

    public function getAllWithCategory() {
        return $this->model->with('category')->get();
    }
}
