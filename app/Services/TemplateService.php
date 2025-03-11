<?php

namespace App\Services;

use App\Repositories\Interfaces\TemplateRepositoryInterface;

class TemplateService
{
    public function __construct(
       private readonly TemplateRepositoryInterface $templateRepository
    ) {
    }

    public function getTemplatesWithCategory() {
        return $this->templateRepository->getAllWithCategory();
    }
}
