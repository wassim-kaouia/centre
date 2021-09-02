<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        // $blogs = Blog::exists() ? Blog::paginate(10) : null;
        $blogs = Blog::paginate(10);
        return view('blog.index', ['blogs' => $blogs]);
    }

    public function create()
    {
        return view('blog.add');
    }

    public function show(Request $request, $id)
    {
        $blog = Blog::find($id);

        $lasts = Blog::orderBy('created_at', 'desc')->take(5)->get();

        return view('front.blog_detail', [
            'blog' => $blog,
            'lasts' => $lasts,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'couverture' => 'required|mimes:png,jpg,jpeg',
            'content' => 'required|string',
            'title' => 'required|string',
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;

        //upload logo - partenaire
        if (request()->has('couverture')) {
            $couverture = request()->file('couverture');
            $couvertureName = time() . '.' . $couverture->getClientOriginalExtension();
            $couverturePath = public_path('/images/couverture/');
            $couverture->move($couverturePath, $couvertureName);
            $blog->couverture = "/images/couverture/" . $couvertureName;
        }

        $blog->user_id = $request->user;
        $blog->save();

        session()->flash('success', 'Blog Crée avec Succée !');
        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $blog = Blog::find($id);

        return view('blog.edit', ['blog' => $blog]);
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        $blog->title = $request->title == '' ? $blog->title : $request->title;
        $blog->content = $request->content == '' ? $blog->content : $request->content;

        //upload logo - partenaire
        if (request()->has('couverture')) {
            //delete od one
            $coverture_path = public_path($blog->couverture);
            if (File::exists($coverture_path)) {
                File::delete($coverture_path);
            }
            $couverture = request()->file('couverture');
            $couvertureName = time() . '.' . $couverture->getClientOriginalExtension();
            $couverturePath = public_path('/images/couverture/');
            $couverture->move($couverturePath, $couvertureName);
            $blog->couverture = "/images/couverture/" . $couvertureName;
        }
        $blog->save();
        session()->flash('success', 'Blog Mise à jour avec Succée !');
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $blog = Blog::find($request->blog_id);
        //delete the cover img
        $coverture_path = public_path($blog->couverture);
        if (File::exists($coverture_path)) {
            File::delete($coverture_path);
        }
        $blog->delete();

        session()->flash('success', 'Blog Supprimé avec Succée !');
        return redirect()->back();
    }
}
