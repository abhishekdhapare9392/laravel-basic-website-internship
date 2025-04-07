<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->search);
        $blogs = [];
        if ($request->search) {
            $blogs = Blog::where('title', 'like', '%' . $request->search . '%')->orWhere('body', 'like', '%' . $request->search . '%')->with('author', function ($query) {
                    $query->select('id', 'name');
            })->paginate(10)->withQueryString();
        } else {
            $blogs = Blog::query()->with('author', function ($query) {
                    $query->select('id', 'name');
            })->paginate(10)->withQueryString();
        }

        // dd($blogs);
        // $users = User::all();
        // $blogs = Blog::paginate(10);
        return view('admin.blogs.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('admin.blogs.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|min:3',
            'body' => 'required|string|max:2555|min:250',
            'author_id' => 'required|exists:users,id',
        ]);

        // dd($validated);
        Blog::create($validated);

        return redirect()->route('admin.blogs')->with('success', 'Blog created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        // dd($id);

        $blog = Blog::where('id',$id)->first();
        // dd($blog);
        return view('admin.blogs.edit', ['blog' => $blog]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|min:3',
            'body' => 'required|string|max:2555',
        ]);

        // dd($validated);
        Blog::where('id',$id)->update($validated);

        return redirect()->route('admin.blogs')->with('success', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blog::where('id',$id)->delete();
        return redirect()->route('admin.blogs')->with('success', 'Blog deleted successfully');
    }
}
