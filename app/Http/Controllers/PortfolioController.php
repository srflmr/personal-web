<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $projects = include base_path('database/dummyportfolios.php');

        return view('portfolio.index', [
            'projects' => $projects,
        ]);
    }

    public function show(string $slug): View
    {
        $projects = include base_path('database/dummyportfolios.php');

        $project = array_values(array_filter($projects, fn ($item) => $item['slug'] === $slug))[0] ?? null;

        abort_if($project === null, 404);

        return view('portfolio.show', [
            'project' => $project,
        ]);
    }
}
