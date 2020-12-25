<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
// use App\Http\Requests\CategoryValidateRequest;
use App\Http\Requests\CategoryValidateRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CategoriesController extends Controller
{
    // Allow access for publishers and admins
    public function __construct()
    {
        $this->middleware('publisher');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('parent_id', 0)->get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'parent_id' => 'required',
        ]);

        Category::create($data);

        return back()->with('success', 'Dodali ste kategoriju');
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
    public function destroy(Category $category)
    {
        // Fetch all subcategories
        $subcategories = Category::where('parent_id', $category->id)->get();

        // Delete all subcategories for this category
        foreach ($subcategories as $subcategory) {
            $subcategory->delete();
        }

        // delete parrent category
        $category->delete();

        return back()->with('success', 'Obrisali ste kategoriju');
    }

    /**
     * 
     * Custom methods
     * 
     */
    
    // Creating unique slug via ajax request
    public function createSlug(Request $request)
    {
        // Method from package, creating unique slug
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
