<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::latest()->paginate(5);
        return view('backend.category.index', compact('category'));
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $attr = $request->validated();
        Category::create($attr + [
            'slug' => Str::slug($request->name),
            'created_by' => Auth::user()->profile->name,
        ]);
        return redirect()->route('category.index')->with('success', __('Category created successfully.'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}