<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $blogs = include base_path('database/dummyblogs.php');

        return view('blog.index', [
            'blogs' => $blogs,
        ]);
    }

    public function show(string $slug): View
    {
        $blogs = include base_path('database/dummyblogs.php');

        $blog = array_values(array_filter($blogs, fn ($item) => $item['slug'] === $slug))[0] ?? null;

        abort_if($blog === null, 404);

        // Raw HTML is stripped and unsafe links are dropped because the view
        // prints this value unescaped.
        $contentHtml = Str::markdown($blog['content'], [
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);

        $readingMinutes = max(1, (int) ceil(str_word_count(strip_tags($contentHtml)) / 200));

        $otherBlogs = array_slice(
            array_values(array_filter($blogs, fn ($item) => $item['slug'] !== $slug)),
            0,
            2
        );

        return view('blog.show', [
            'blog' => $blog,
            'contentHtml' => $contentHtml,
            'readingMinutes' => $readingMinutes,
            'otherBlogs' => $otherBlogs,
        ]);
    }
}
