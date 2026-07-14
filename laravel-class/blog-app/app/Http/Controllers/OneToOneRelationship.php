<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Blog;

class OneToOneRelationship extends Controller
{
    public function createAuthor(){
        return view('onetoone.author');
    }

    public function storeAuthor(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);         
        $author = Author::create($validatedData);
        return redirect()->route('blog')->with('success', 'Author: Firstname Lastname successfully');
      
    }

    public function createBlog(){
        $All_authors = Author::all();
        return view('onetoone.blog',compact('All_authors'));
    }

    public function storeBlog(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author_id' => 'required|exists:authors,id',
        ]);
        $blog = Blog::create($validatedData);
        return redirect()->route('blog.list')->with('success', 'Blog created successfully');
    }



    public function authorBlogList(){
         $authors_with_blogs = Author::with('blog')->get();
         //dd($authors_with_blogs);
        $blogs_with_authors = Blog::with('author')->get();
        //dd($blogs_with_authors);
        
        return view('onetoone.bloglist',compact('authors_with_blogs', 'blogs_with_authors'));
    }


    public function authorBlog($id){
          $author = Author::find($id);
        //  dd($author->blog);

        // $author_name = $author->name;
        // dd($author_name);

        // //blog title
        //  $blog_title = $author->blog->title;
        // dd($blog_title);

         $blog = Blog::find($id);
        // $author_name = $blog->author->name;
        // dd($author_name);
         $blog_title = $blog->title;
         dd($blog_title);

    }
}
