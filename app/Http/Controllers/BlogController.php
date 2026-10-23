<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('is_published', true)->latest()->take(6)->get();

        return view('anasayfa', compact('blogs'));
    }

    public function list(Request $request)
    {
        $query = Blog::where('is_published', true)->latest();

        if ($request->filled('kategori')) {
            $query->where('category', $request->query('kategori'));
        }

        if ($request->filled('etiket')) {
            $query->whereJsonContains('tags', $request->query('etiket'));
        }

        $blogs = $query->paginate(10)->withQueryString();

        if ($request->ajax()) {
            return response()->json([
                'html' => view('blogs._list-items', compact('blogs'))->render(),
                'next_page_url' => $blogs->nextPageUrl(),
            ]);
        }

        return view('blogyazilari', array_merge(
            ['blogs' => $blogs],
            $this->sidebarData()
        ));
    }

    public function show(string $slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $blog->increment('views_count');

        return view('blogdetay', array_merge(
            ['blog' => $blog],
            $this->sidebarData()
        ));
    }

    private function sidebarData(): array
    {
        $publishedBlogs = Blog::where('is_published', true);

        $categories = (clone $publishedBlogs)
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        $tags = (clone $publishedBlogs)
            ->get(['tags'])
            ->flatMap(function (Blog $blog) {
                return $blog->tags ?? [];
            })
            ->filter()
            ->unique()
            ->sort()
            ->values();

        $mostReadBlogs = (clone $publishedBlogs)
            ->orderByDesc('views_count')
            ->take(5)
            ->get();

        $latestBlogs = (clone $publishedBlogs)
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->take(5)
            ->get();

        return compact('categories', 'tags', 'mostReadBlogs', 'latestBlogs');
    }
}
