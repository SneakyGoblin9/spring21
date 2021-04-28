<?php

namespace App\Http\Controllers;

use App\Image;
use Canvas\Post;
use Canvas\Tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index', [
            'images' => Image::whereNotIn('category_id', [1, 6])->get(),
            'featured' => Image::where('category_id', 1)->get(),
        ]);
    }



    public function about()
    {
        return view('frontend.about');
    }

    public function gallery()
    {
        $images = Image::whereNotIn('category_id', [1, 6])
            ->join('categories', 'categories.id', '=', 'images.category_id')
            ->get()->groupBy('name');

        return view('frontend.gallery', [
            'images' => $images,
        ]);
    }

    public function blog()
    {
        $posts = \Canvas\Post::published()->orderByDesc('published_at')->paginate(9);

        return view('frontend.blog', [
            'posts' => $posts,
        ]);
    }


    public function donate()
    {
        return view('frontend.donate');
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

            $tags = Tag::get();
            $recent = \Canvas\Post::published()->whereDate('published_at', '<', $data['post']->published_at)->get();

            return view('posts.show', compact('data', 'tags', 'recent'));
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
                })->published()->orderByDesc('published_at')->paginate(9),
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
