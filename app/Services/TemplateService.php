<?php

namespace App\Services;

use App\Repositories\Interfaces\TemplateRepositoryInterface;

class TemplateService
{
    public function __construct(
       private readonly TemplateRepositoryInterface $templateRepository
    ) {
    }

    public function getTemplatesWithCategory($categoryId = null) {
        return $this->templateRepository->getAllWithCategory($categoryId);
    }

    public function getTemplate($id) {
        return $this->templateRepository->find($id);
    }
}
