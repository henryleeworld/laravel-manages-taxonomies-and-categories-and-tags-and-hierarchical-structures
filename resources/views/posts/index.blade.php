@extends('layouts.app')
@section('title', __('Posts'))
@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <div class="lg:col-span-3">
            <div class="bg-white rounded-lg shadow p-6">
                <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ __('Latest Posts') }}</h1>
                @forelse($posts as $post)
                    <article class="border-b border-gray-200 pb-6 mb-6 last:border-b-0">
                        <h2 class="text-xl font-semibold mb-2">
                            <a href="{{ route('posts.show', $post) }}" class="text-blue-600 hover:text-blue-800">
                                {{ $post->title }}
                            </a>
                        </h2>
                        <div class="flex flex-wrap gap-2 mb-3">
                            @foreach($post->taxonomiesOfType('category') as $category)
                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">
                                {{ $category->name }}
                            </span>
                            @endforeach

                            @foreach($post->taxonomiesOfType('tag') as $tag)
                                <span class="bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded">
                                #{{ $tag->name }}
                            </span>
                            @endforeach
                        </div>
                        <p class="text-gray-700 mb-3">{{ $post->excerpt }}</p>
                        <div class="text-sm text-gray-500">
						    {{ __('Published on :published_at', ['published_at' => $post->published_at->format('Y-m-d H:i:s')]) }}
                        </div>
                    </article>
                @empty
                    <p class="text-gray-500">{{ __('No posts found.') }}</p>
                @endforelse
                {{ $posts->links() }}
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h3 class="text-lg font-semibold mb-4">{{ __('Categories') }}</h3>
                <ul class="space-y-2">
                    @foreach($categories as $category)
                        <li>
                            <a href="{{ route('posts.index', ['category' => $category->slug]) }}"
                               class="text-blue-600 hover:text-blue-800">
                                {{ $category->name }}
                            </a>
                            @if($category->children->isNotEmpty())
                                <ul class="ml-4 mt-2 space-y-1">
                                    @foreach($category->children as $child)
                                        <li>
                                            <a href="{{ route('posts.index', ['category' => $child->slug]) }}"
                                               class="text-sm text-gray-600 hover:text-gray-800">
                                                {{ $child->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-4">{{ __('Tags') }}</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($tags as $tag)
                        <a href="{{ route('posts.index', ['tag' => $tag->slug]) }}"
                           class="bg-gray-100 text-gray-800 text-sm px-3 py-1 rounded-full hover:bg-gray-200">
                            #{{ $tag->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
