<?php

namespace App\Http\Controllers;

use App\Services\TemplateService;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function __construct(
        private readonly TemplateService $templateService){
    }

    public function index()
    {
        $templates = $this->templateService->getTemplatesWithCategory();

        return view('template.index', compact('templates'));
    }

    public function show($id)
    {
        $template = Template::find($id);

        if (!$template) {
            return response()->json(['message' => 'Template not found'], 404);
        }

        return response()->json($template);
    }
}
