<?php

namespace Database\Seeders;

use Aliziodev\LaravelTaxonomy\Enums\TaxonomyType;
use Aliziodev\LaravelTaxonomy\Models\Taxonomy;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        $tech = Taxonomy::create([
            'name'        => __('Technology'),
            'type'        => TaxonomyType::Category->value,
            'description' => __('All about technology'),
            'meta'        => ['icon' => 'laptop', 'color' => '#3b82f6'],
        ]);

        $webDev = Taxonomy::create([
            'name'        => __('Web Development'),
            'type'        => TaxonomyType::Category->value,
            'parent_id'   => $tech->id,
            'description' => __('Web development tutorials and tips'),
        ]);

        $lifestyle = Taxonomy::create([
            'name'        => __('Lifestyle'),
            'type'        => TaxonomyType::Category->value,
            'description' => __('Lifestyle and personal topics'),
            'meta'        => ['icon' => 'heart', 'color' => '#ef4444'],
        ]);

        $business = Taxonomy::create([
            'name'        => __('Business'),
            'type'        => TaxonomyType::Category->value,
            'description' => __('Business insights and entrepreneurship'),
            'meta'        => ['icon' => 'briefcase', 'color' => '#10b981'],
        ]);

        $healthFitness = Taxonomy::create([
            'name'        => __('Health & Fitness'),
            'type'        => TaxonomyType::Category->value,
            'description' => __('Health, fitness and wellness topics'),
            'meta'        => ['icon' => 'activity', 'color' => '#f59e0b'],
        ]);

        $exercise = Taxonomy::create([
            'name'        => __('Exercise'),
            'type'        => TaxonomyType::Category->value,
            'parent_id'   => $healthFitness->id,
            'description' => __('Workout routines and exercise tips'),
        ]);

        $nutrition = Taxonomy::create([
            'name'        => __('Nutrition'),
            'type'        => TaxonomyType::Category->value,
            'parent_id'   => $healthFitness->id,
            'description' => __('Diet and nutrition advice'),
        ]);

        $strengthTraining = Taxonomy::create([
            'name'        => __('Strength Training'),
            'type'        => TaxonomyType::Category->value,
            'parent_id'   => $exercise->id,
            'description' => __('Weight lifting and strength building exercises'),
        ]);

        $cardio = Taxonomy::create([
            'name'        => __('Cardio'),
            'type'        => TaxonomyType::Category->value,
            'parent_id'   => $exercise->id,
            'description' => __('Cardiovascular and endurance training'),
        ]);

        $mealPlanning = Taxonomy::create([
            'name'        => __('Meal Planning'),
            'type'        => TaxonomyType::Category->value,
            'parent_id'   => $nutrition->id,
            'description' => __('Meal prep and planning strategies'),
        ]);

        $supplements = Taxonomy::create([
            'name'        => __('Supplements'),
            'type'        => TaxonomyType::Category->value,
            'parent_id'   => $nutrition->id,
            'description' => __('Nutritional supplements and vitamins'),
        ]);

        $tags = [
            __('PHP'), __('Laravel'), __('JavaScript'), __('Tutorial'), __('Tips'), __('Beginner'), __('Advanced'), __('Lifestyle'),
            __('Business'), __('Entrepreneurship'), __('Marketing'), __('Fitness'), __('Health'), __('Workout'), __('Diet'), __('Nutrition'),
        ];

        foreach ($tags as $tagName) {
            Taxonomy::create([
                'name' => $tagName,
                'type' => TaxonomyType::Tag->value,
            ]);
        }

        $posts = [
            [
                'title'      => __('Getting Started with Laravel'),
                'content'    => __('This is a comprehensive guide to getting started with Laravel framework. Laravel is a powerful PHP framework that makes web development enjoyable and creative. In this tutorial, we\'ll cover the basics of setting up a Laravel project, understanding the MVC architecture, and creating your first routes and controllers.'),
                'excerpt'    => __('Learn the basics of Laravel framework in this beginner-friendly tutorial.'),
                'categories' => [$webDev->id],
                'tags'       => [__('Laravel'), __('PHP'), __('Tutorial'), __('Beginner')],
            ],
            [
                'title'      => __('Advanced PHP Techniques'),
                'content'    => __('Explore advanced PHP techniques that will make you a better developer. We\'ll dive into design patterns, performance optimization, and modern PHP features that every professional developer should know.'),
                'excerpt'    => __('Master advanced PHP concepts and improve your coding skills.'),
                'categories' => [$webDev->id],
                'tags'       => [__('PHP'), __('Advanced'), __('Tips')],
            ],
            [
                'title'      => __('Work-Life Balance in Tech'),
                'content'    => __('Maintaining a healthy work-life balance is crucial for developers. The tech industry can be demanding, but with the right strategies, you can maintain productivity while preserving your personal well-being.'),
                'excerpt'    => __('Tips for maintaining work-life balance in the tech industry.'),
                'categories' => [$lifestyle->id],
                'tags'       => [__('Tips'), __('Lifestyle')],
            ],
            [
                'title'      => __('Laravel Best Practices for :year', ['year' => now()->year]),
                'content'    => __('Learn the latest Laravel best practices that will help you write cleaner, more maintainable code. This guide covers everything from project structure to security considerations.'),
                'excerpt'    => __('Discover the latest Laravel best practices for modern web development.'),
                'categories' => [$webDev->id],
                'tags'       => [__('Laravel'), __('Tips'), __('Advanced')],
            ],
            [
                'title'      => __('JavaScript Fundamentals You Need to Know'),
                'content'    => __('JavaScript is the backbone of modern web development. Whether you\'re a beginner or looking to refresh your knowledge, this tutorial covers the essential concepts every developer should master.'),
                'excerpt'    => __('Master the fundamental concepts of JavaScript programming.'),
                'categories' => [$webDev->id],
                'tags'       => [__('JavaScript'), __('Tutorial'), __('Beginner')],
            ],
            [
                'title'      => __('Building Your First PHP Application'),
                'content'    => __('Ready to build your first PHP application? This step-by-step tutorial will guide you through creating a simple but functional web application using pure PHP.'),
                'excerpt'    => __('A beginner\'s guide to building web applications with PHP.'),
                'categories' => [$webDev->id],
                'tags'       => [__('PHP'), __('Tutorial'), __('Beginner')],
            ],
            [
                'title'      => __('Advanced JavaScript Patterns'),
                'content'    => __('Take your JavaScript skills to the next level with advanced design patterns and techniques. Learn about closures, prototypes, async patterns, and modern ES6+ features.'),
                'excerpt'    => __('Explore advanced JavaScript patterns for professional development.'),
                'categories' => [$webDev->id],
                'tags'       => [__('JavaScript'), __('Advanced'), __('Tips')],
            ],
            [
                'title'      => __('Healthy Coding Habits for Developers'),
                'content'    => __('Developing good coding habits is essential for long-term success. Learn practical tips for writing clean code, managing time effectively, and staying motivated throughout your development journey.'),
                'excerpt'    => __('Essential habits every developer should cultivate for success.'),
                'categories' => [$lifestyle->id],
                'tags'       => [__('Tips'), __('Lifestyle'), __('Beginner')],
            ],
            [
                'title'      => __('Laravel Performance Optimization Techniques'),
                'content'    => __('Learn how to optimize your Laravel applications for maximum performance. This advanced guide covers database optimization, caching strategies, and code optimization techniques.'),
                'excerpt'    => __('Advanced techniques for optimizing Laravel application performance.'),
                'categories' => [$webDev->id],
                'tags'       => [__('Laravel'), __('Advanced'), __('PHP')],
            ],
            [
                'title'      => __('Modern JavaScript Development Tools'),
                'content'    => __('Discover the essential tools that every JavaScript developer should know. From build tools to testing frameworks, this guide covers the modern JavaScript ecosystem.'),
                'excerpt'    => __('Essential tools for modern JavaScript development workflows.'),
                'categories' => [$webDev->id],
                'tags'       => [__('JavaScript'), __('Tips'), __('Tutorial')],
            ],
            [
                'title'      => __('Starting Your First Business: A Complete Guide'),
                'content'    => __('Thinking about starting your own business? This comprehensive guide covers everything from idea validation to launching your first product. We\'ll discuss market research, business planning, and essential entrepreneurship principles.'),
                'excerpt'    => __('Everything you need to know about starting your first business venture.'),
                'categories' => [$business->id],
                'tags'       => [__('Business'), __('Entrepreneurship'), __('Tips'), __('Beginner')],
            ],
            [
                'title'      => __('Effective Strength Training for Beginners'),
                'content'    => __('New to strength training? Learn the fundamental exercises, proper form, and progressive overload principles that will help you build muscle safely and effectively. This guide covers everything from basic movements to creating your first workout routine.'),
                'excerpt'    => __('A beginner\'s guide to safe and effective strength training.'),
                'categories' => [$strengthTraining->id],
                'tags'       => [__('Fitness'), __('Workout'), __('Beginner'), __('Health')],
            ],
            [
                'title'      => __('Meal Planning Made Simple: A Weekly Approach'),
                'content'    => __('Transform your nutrition with effective meal planning strategies. Learn how to plan, prep, and organize your meals for the week ahead, saving time and ensuring you stick to your health goals.'),
                'excerpt'    => __('Simple strategies for effective weekly meal planning.'),
                'categories' => [$mealPlanning->id],
                'tags'       => [__('Nutrition'), __('Diet'), __('Health'), __('Tips')],
            ],
        ];

        foreach ($posts as $postData) {
            $post = Post::create([
                'title'        => $postData['title'],
                'slug'         => str()->slug($postData['title'], language: app()->getLocale()),
                'content'      => $postData['content'],
                'excerpt'      => $postData['excerpt'],
                'is_published' => true,
                'published_at' => now(),
            ]);

            $post->attachTaxonomies($postData['categories']);

            $tagIds = Taxonomy::whereIn('name', $postData['tags'])
                ->where('type', TaxonomyType::Tag->value)
                ->pluck('id')
                ->toArray();

            $post->attachTaxonomies($tagIds);
        }
    }
}
