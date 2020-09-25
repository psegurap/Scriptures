<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Faker\Factory;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        // DB::table('users')->truncate();
        // DB::table('categories')->truncate();
        // DB::table('tags')->truncate();
        // DB::table('series')->truncate();
        // DB::table('subscribers')->truncate();
        // DB::table('collaborators')->truncate();
        // DB::table('team')->truncate();
        // DB::table('articles')->truncate();
        // DB::table('reviews_articles')->truncate();
        // DB::table('articles_collaborators')->truncate();
        // DB::table('articles_categories')->truncate();
        DB::table('articles_tags')->truncate();

        // factory(App\User::class, 10)->create();
        // factory(App\Category::class, 10)->create();
        // factory(App\Tag::class, 10)->create();
        // factory(App\Serie::class, 10)->create();
        // factory(App\Subscriber::class, 10)->create();
        // factory(App\Collaborator::class, 10)->create();
        // factory(App\Team::class, 10)->create();

        //-------------- ARTICLES ---------------//
        // factory(App\Article::class, 20)->create();
        
        // $filters = DB::table('users')->where('filter', 1)->get();
        // $articles = DB::table('articles')->get();
        // foreach ($filters as $filter) {
        //     foreach ($articles as $article) {
        //         DB::table('reviews_articles')->insert(
        //             [
        //                 'article_id' => $article->id, 
        //                 'desicion' => 'Approved', 
        //                 'comment' => $faker->sentence($nbWords = 10, $variableNbWords = true), 
        //                 'user_id' => $filter->id, 
        //                 'deleted_at' => NULL, 
        //                 'created_at' => now(), 
        //                 'updated_at' => now(), 
        //             ]
        //         );
        //     }
        // }

        // $articles = DB::table('articles')->get();
        // foreach ($articles as $article) {
        //     DB::table('articles_collaborators')->insert(
        //         [
        //             'article_id' => $article->id, 
        //             'collaborator_id' => $faker->randomElement(array_column(DB::table('collaborators')->get()->toArray(), 'id')), 
        //             'created_at' => now(), 
        //             'updated_at' => now(), 
        //         ]
        //     );
        // }

        // $articles = DB::table('articles')->get();
        // foreach ($articles as $article) {
        //     DB::table('articles_categories')->insert(
        //         [
        //             'article_id' => $article->id, 
        //             'category_id' => $faker->randomElement(array_column(DB::table('categories')->get()->toArray(), 'id')), 
        //             'created_at' => now(), 
        //             'updated_at' => now(), 
        //         ]
        //     );
        // }

        $articles = DB::table('articles')->get();
        foreach ($articles as $article) {
            DB::table('articles_tags')->insert(
                [
                    'article_id' => $article->id, 
                    'tag_id' => $faker->randomElement(array_column(DB::table('tags')->get()->toArray(), 'id')), 
                    'created_at' => now(), 
                    'updated_at' => now(), 
                ]
            );
        }

    }
}
