<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|unique:blogs',
            'author_name' => 'required',
            'status'      => 'required',
        ]);

        $category = new Category();
        $category->title         = $request->title;
        $category->slug          = Str::slug($request->title);
        $category->description   = $request->description;
        $category->status        = $request->status;
        $category->author_name   = $request->author_name;
        $category->save();

        return redirect('/category')->with('success', "Category Successfully Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $category = Category::find($id);
        return view('admin.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $category = Category::find($id);

        $request->validate([
            'title'       => 'required|unique:categories,title,'.$id,
            'author_name' => 'required',
            'status'      => 'required',
        ]);

        $category->title         = $request->title;
        $category->slug          = Str::slug($request->title);
        $category->description   = $request->description;
        $category->status        = $request->status;
        $category->author_name   = $request->author_name;
        $category->save();

        return redirect()->back()->with('success', "Category Successfully Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        Category::destroy($id);

        return redirect()->back()->with('success', "Category Successfully Deleted!");
    }
}
