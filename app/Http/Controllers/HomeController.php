<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $projects = include base_path('database/dummyportfolios.php');
        $blogs = include base_path('database/dummyblogs.php');

        // Both files are ordered newest first, so the first three are the latest.
        return view('home', [
            'profile' => $this->profile(),
            'featuredProjects' => array_slice($projects, 0, 3),
            'latestBlogs' => array_slice($blogs, 0, 3),
        ]);
    }

    public function about(): View
    {
        return view('about', [
            'profile' => $this->profile(),
        ]);
    }

    public function contact(): View
    {
        return view('contact');
    }

    /**
     * @return array{name: string, role: string, tagline: string}
     */
    private function profile(): array
    {
        return Arr::only(config('site'), ['name', 'role', 'tagline']);
    }
}
