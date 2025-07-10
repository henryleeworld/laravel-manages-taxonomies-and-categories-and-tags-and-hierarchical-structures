<?php

namespace App\Http\Controllers;

use Aliziodev\LaravelTaxonomy\Enums\TaxonomyType;
use Aliziodev\LaravelTaxonomy\Facades\Taxonomy;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Post::published()->with('taxonomies');

        if ($request->filled('category')) {
            $category = Taxonomy::findBySlug($request->category, TaxonomyType::Category);
            if ($category) {
                $query->withTaxonomyHierarchy($category->id);
            }
        }

        if ($request->filled('tag')) {
            $query->withTaxonomySlug($request->tag, TaxonomyType::Tag);
        }

        $posts = $query->latest('published_at')->paginate(10);
        $categories = Taxonomy::tree(TaxonomyType::Category);
        $tags = Taxonomy::findByType(TaxonomyType::Tag);

        return view('posts.index', compact('posts', 'categories', 'tags'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load('taxonomies');
        $relatedPosts = $this->getRelatedPosts($post);

        return view('posts.show', compact('post', 'relatedPosts'));
    }

    private function getRelatedPosts(Post $post)
    {
        $tagIds = $post->taxonomiesOfType(TaxonomyType::Tag->value)->pluck('id')->toArray();

        if (empty($tagIds)) {
            return collect();
        }

        return Post::published()
            ->where('id', '!=', $post->id)
            ->withAnyTaxonomies($tagIds)
            ->limit(3)
            ->get();
    }
}
