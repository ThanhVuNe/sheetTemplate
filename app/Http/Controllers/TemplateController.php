<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\TemplateService;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function __construct(
        private readonly TemplateService $templateService,
        private readonly CategoryService $categoryService){
    }

    public function index(Request $request)
    {
        $categories = $this->categoryService->getAllCategory();
        
        $categoryId = $request->category;
        $templates = $this->templateService->getTemplatesWithCategory($categoryId);

        return view('template.index', compact('categories' ,'templates'));
    }

    public function show($id)
    {
        $template = $this->templateService->getTemplate($id);

        return view('template.show', compact('template'));
    }
}
