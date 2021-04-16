<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
            'name' => 'News'
        ]);
        $category2 = Category::create([
            'name' => 'Design'
        ]);
        $category3 = Category::create([
            'name' => 'Partnership'
        ]);
        $category4 = Category::create([
            'name' => 'Hiring'
        ]);
        $category5 = Category::create([
            'name' => 'News'
        ]);

        $author1 = User::create([
             'name' => 'Sourav Maity',
             'email' => 'sourav123@gmail.com',
             'password' => Hash::make('12345678'),
        ]);
        $author2 = User::create([
             'name' => 'Rahul Maity',
             'email' => 'rahul123@gmail.com',
             'password' => Hash::make('12345678'),
        ]);
      

        $post1 = $author1->posts()->create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa odit ab magni delectus? Excepturi accusamus, esse pariatur id tenetur soluta.',
            'content'  => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum sunt illo quam minus sit? Dolorum laboriosam incidunt possimus reiciendis iusto minima velit fuga distinctio quos voluptatum, assumenda quasi libero sit voluptatibus aspernatur dolore facilis molestias repellat cupiditate voluptates minus culpa eos consectetur. Nobis quod, doloremque voluptas libero tempore reiciendis ad sint nihil consectetur mollitia qui rerum in vel, exercitationem, assumenda totam atque est. Dolorem, perspiciatis facere beatae in, nam ab cupiditate neque asperiores earum ratione culpa tempora. Quae, expedita excepturi ex dolores beatae tempora quod. Incidunt qui nesciunt dolorem? Incidunt tempora neque quas dolorum sint eum facere architecto maiores velit!",
            'category_id' => $category1->id,
             'image' => 'posts/1.jpg'
            ]);

        $post2 = $author1->posts()->create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa odit ab magni delectus? Excepturi accusamus, esse pariatur id tenetur soluta.',
            'content'  => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum sunt illo quam minus sit? Dolorum laboriosam incidunt possimus reiciendis iusto minima velit fuga distinctio quos voluptatum, assumenda quasi libero sit voluptatibus aspernatur dolore facilis molestias repellat cupiditate voluptates minus culpa eos consectetur. Nobis quod, doloremque voluptas libero tempore reiciendis ad sint nihil consectetur mollitia qui rerum in vel, exercitationem, assumenda totam atque est. Dolorem, perspiciatis facere beatae in, nam ab cupiditate neque asperiores earum ratione culpa tempora. Quae, expedita excepturi ex dolores beatae tempora quod. Incidunt qui nesciunt dolorem? Incidunt tempora neque quas dolorum sint eum facere architecto maiores velit!",
            'category_id' => $category2->id,
             'image' => 'posts/2.jpg'
            ]);

        $post3 = $author1->posts()->create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa odit ab magni delectus? Excepturi accusamus, esse pariatur id tenetur soluta.',
            'content'  => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum sunt illo quam minus sit? Dolorum laboriosam incidunt possimus reiciendis iusto minima velit fuga distinctio quos voluptatum, assumenda quasi libero sit voluptatibus aspernatur dolore facilis molestias repellat cupiditate voluptates minus culpa eos consectetur. Nobis quod, doloremque voluptas libero tempore reiciendis ad sint nihil consectetur mollitia qui rerum in vel, exercitationem, assumenda totam atque est. Dolorem, perspiciatis facere beatae in, nam ab cupiditate neque asperiores earum ratione culpa tempora. Quae, expedita excepturi ex dolores beatae tempora quod. Incidunt qui nesciunt dolorem? Incidunt tempora neque quas dolorum sint eum facere architecto maiores velit!",
            'category_id' => $category3->id,
            'image' => 'posts/3.jpg'
            ]);

        $post4 = $author2->posts()->create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa odit ab magni delectus? Excepturi accusamus, esse pariatur id tenetur soluta.',
            'content'  => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum sunt illo quam minus sit? Dolorum laboriosam incidunt possimus reiciendis iusto minima velit fuga distinctio quos voluptatum, assumenda quasi libero sit voluptatibus aspernatur dolore facilis molestias repellat cupiditate voluptates minus culpa eos consectetur. Nobis quod, doloremque voluptas libero tempore reiciendis ad sint nihil consectetur mollitia qui rerum in vel, exercitationem, assumenda totam atque est. Dolorem, perspiciatis facere beatae in, nam ab cupiditate neque asperiores earum ratione culpa tempora. Quae, expedita excepturi ex dolores beatae tempora quod. Incidunt qui nesciunt dolorem? Incidunt tempora neque quas dolorum sint eum facere architecto maiores velit!",
            'category_id' => $category4->id,
             'image' => 'posts/4.jpg'
            ]);

        $post5 = $author2->posts()->create([
            'title' => 'New published books to read by a product designer',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa odit ab magni delectus? Excepturi accusamus, esse pariatur id tenetur soluta.',
            'content'  => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum sunt illo quam minus sit? Dolorum laboriosam incidunt possimus reiciendis iusto minima velit fuga distinctio quos voluptatum, assumenda quasi libero sit voluptatibus aspernatur dolore facilis molestias repellat cupiditate voluptates minus culpa eos consectetur. Nobis quod, doloremque voluptas libero tempore reiciendis ad sint nihil consectetur mollitia qui rerum in vel, exercitationem, assumenda totam atque est. Dolorem, perspiciatis facere beatae in, nam ab cupiditate neque asperiores earum ratione culpa tempora. Quae, expedita excepturi ex dolores beatae tempora quod. Incidunt qui nesciunt dolorem? Incidunt tempora neque quas dolorum sint eum facere architecto maiores velit!",
            'category_id' => $category5->id,
             'image' => 'posts/5.jpg'
            ]);
        $post6 = $author2->posts()->create([
            'title' => "This is why it's time to ditch dress codes at work",
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa odit ab magni delectus? Excepturi accusamus, esse pariatur id tenetur soluta.',
            'content'  => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum sunt illo quam minus sit? Dolorum laboriosam incidunt possimus reiciendis iusto minima velit fuga distinctio quos voluptatum, assumenda quasi libero sit voluptatibus aspernatur dolore facilis molestias repellat cupiditate voluptates minus culpa eos consectetur. Nobis quod, doloremque voluptas libero tempore reiciendis ad sint nihil consectetur mollitia qui rerum in vel, exercitationem, assumenda totam atque est. Dolorem, perspiciatis facere beatae in, nam ab cupiditate neque asperiores earum ratione culpa tempora. Quae, expedita excepturi ex dolores beatae tempora quod. Incidunt qui nesciunt dolorem? Incidunt tempora neque quas dolorum sint eum facere architecto maiores velit!",
            'category_id' => $category5->id,
            'image' => 'posts/1.jpg'
            ]);


        $tag1 = Tag::create([
            'name' => 'record'
        ]);
        $tag2 = Tag::create([
            'name' => 'customer'
        ]);
        $tag3 = Tag::create([
            'name' => 'design'
        ]);
        $tag4 = Tag::create([
            'name' => 'job'
        ]);

        $post1->tags()->attach([$tag1->id,$tag2->id]);
        $post2->tags()->attach([$tag2->id,$tag3->id]);
        $post3->tags()->attach([$tag3->id,$tag4->id]);
        $post4->tags()->attach([$tag1->id,$tag2->id]);
        $post5->tags()->attach([$tag2->id,$tag3->id]);
        $post6->tags()->attach([$tag3->id,$tag4->id]);
    }
}
