<?php
namespace App\Repositories\Interfaces;

use App\Repositories\Interfaces\RepositoryInterface;

interface TemplateRepositoryInterface extends RepositoryInterface
{
    public function getAllWithCategory($categoryId = null);
}
