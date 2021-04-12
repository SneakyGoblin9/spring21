<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function gallery()
    {
        return view('frontend.gallery');
    }

    public function blog()
    {
        $posts = \Canvas\Post::published()->orderByDesc('published_at')->paginate(9);

        return view('frontend.blog', [
            'posts' => $posts,
        ]);
    }

    public function blog_single($slug)
    {
        $posts = \Canvas\Post::with('tags', 'topic')->published()->get();
        $post = $posts->firstWhere('slug', $slug);

        if (optional($post)->published) {
            $data = [
                'author' => $post->author,
                'post'   => $post,
                'meta'   => $post->meta,
            ];

            // IMPORTANT: You must include this event for Canvas to store view data
            event(new \Canvas\Events\PostViewed($post));

            return view('posts.show', compact('data'));
        } else {
            abort(404);
        }
    }

    public function getPostsByTag(string $slug)
    {
        if (\Canvas\Tag::where('slug', $slug)->first()) {
            $data = [
                'posts' => \Canvas\Post::whereHas('tags', function ($query) use ($slug) {
                    $query->where('slug', $slug);
                })->published()->orderByDesc('published_at')->get(),
                'slug' => $slug,
            ];

            return view('posts.tag', compact('data'));
        } else {
            abort(404);
        }
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
