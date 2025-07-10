@extends('layouts.app')
@section('title', $post->title)
@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <div class="lg:col-span-3">
            <div class="bg-white rounded-lg shadow p-6">
                <header class="mb-6">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>
                    <div class="flex flex-wrap gap-2 mb-4">
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
                    <div class="text-sm text-gray-500 mb-6">
                        {{ __('Published on :published_at', ['published_at' => $post->published_at->format('Y-m-d H:i:s')]) }}
                    </div>
                </header>
                <div class="prose prose-lg max-w-none">
                    {!! nl2br(e($post->content)) !!}
                </div>
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ route('posts.index') }}"
                       class="inline-flex items-center text-blue-600 hover:text-blue-800">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        {{ __('Back to all posts') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="lg:col-span-1">
            @if($relatedPosts->isNotEmpty())
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Related Posts') }}</h3>
                    <div class="space-y-4">
                        @foreach($relatedPosts as $relatedPost)
                            <article class="border-b border-gray-200 pb-4 last:border-b-0">
                                <h4 class="text-sm font-medium mb-2">
                                    <a href="{{ route('posts.show', $relatedPost) }}"
                                       class="text-blue-600 hover:text-blue-800">
                                        {{ $relatedPost->title }}
                                    </a>
                                </h4>
                                <div class="flex flex-wrap gap-1 mb-2">
                                    @foreach($relatedPost->taxonomiesOfType('tag') as $tag)
                                        <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded">
                                            #{{ $tag->name }}
                                        </span>
                                    @endforeach
                                </div>
                                <div class="text-xs text-gray-500">
                                    {{ $relatedPost->published_at->format('Y-m-d H:i:s') }}
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endif
            @if($post->taxonomiesOfType('category')->isNotEmpty())
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Categories') }}</h3>
                    <div class="space-y-2">
                        @foreach($post->taxonomiesOfType('category') as $category)
                            <div>
                                <a href="{{ route('posts.index', ['category' => $category->slug]) }}"
                                   class="text-blue-600 hover:text-blue-800">
                                    {{ $category->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            @if($post->taxonomiesOfType('tag')->isNotEmpty())
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Tags') }}</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($post->taxonomiesOfType('tag') as $tag)
                            <a href="{{ route('posts.index', ['tag' => $tag->slug]) }}"
                               class="bg-gray-100 text-gray-800 text-sm px-3 py-1 rounded-full hover:bg-gray-200">
                                #{{ $tag->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
