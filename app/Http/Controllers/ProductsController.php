<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductValidateRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category_id = 0, $subcategory_id = 0)
    {
        // If category_id in route, fetch all subcategories
        if($category_id) {
            $subcategories = Category::where('parent_id', $category_id)->get();
        }
        else {
            $subcategories = 0;
        }

        $products = Product::with('category')->with('subcategory')
            ->selectByCategoryId($category_id)
            ->selectBySubcategoryId($subcategory_id)
            ->sortName(request()->ime)
            ->sortPrice(request()->cena)
            ->orderBy('updated_at', 'DESC')
            ->paginate(12);

        return view('admin.products.index', compact('products', 'category_id', 'subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', 0)->get();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductValidateRequest $request)
    {           
        // Check if image is uploaded
        if ($request->hasFile('image')) {
          $imageName = $this->uploadImage($request->file('image'));
        } else {
            $imageName = '';  
        }

        Product::create([
            'ime' => $request->ime,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'proizvodjac' => $request->proizvodjac,
            'akcija' => $request->akcija,
            'pakovanje' => $request->pakovanje,
            'dostupnost' => $request->dostupnost,
            // Price in DB saved in cents
            'cena' => $request->cena * 100,
            'opis' => $request->opis,
            'image' => $imageName,
        ]);  
        
        return redirect()->route('products'); 
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
    public function edit(Product $product)
    {        
        $subcategories = Category::where('parent_id', $product->category_id)->get();

        return view('admin.products.edit', compact('product', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // Check if image is uploaded
        if ($request->hasFile('image')) {
            // Delete old image
            $this->deleteImage($product->image);
            // Upload new image and save name to DB 
            $imageName = $this->uploadImage($request->file('image'));
            $product->image = $imageName;
            $product->save();            
        } 

        $product->update([
            'ime' => $request->ime,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'proizvodjac' => $request->proizvodjac,
            'akcija' => $request->akcija,
            'pakovanje' => $request->pakovanje,
            'dostupnost' => $request->dostupnost,
            // Price in DB saved in cents
            'cena' => $request->cena * 100,
            'opis' => $request->opis,
        ]);

        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // Delete image
        $this->deleteImage($product->image);
        $product->delete();

        return redirect()->route('products');
    }

    /**
     * 
     * Custom Methods
     * 
     */
    public function fetchSubcategories(Request $request)
    {
        $id = $request->category_id;

        $subcategories = Category::where('parent_id', $id)->get();

        return response()->json([
            'data' => $subcategories
        ]);
    }

    // Creating unique slug via ajax request
    public function createSlug(Request $request)
    {
        // Method from package, creating unique slug
        $slug = SlugService::createSlug(Product::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }

    // Upload single file and return filename
    public function uploadImage($file)
    {
        // temp file 
        $image = $file;
        // name based on currenttime and real extension
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images/products');
        // Move temp image to destination, with name
        $image->move($destinationPath, $name);  
        return $name;
    }
    public function deleteImage($file)
    {
        $oldImagePath = public_path('/images/products/'.$file);
        if(File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }
    }
}
