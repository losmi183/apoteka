<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
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

        $actions = Action::where('active', 1)->get();

        return view('admin.products.create', compact('categories', 'actions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {           
        // Check if image is uploaded
        if ($request->hasFile('image')) {
            // Create name based on unique slug and save at default storage location
            $name = $request->slug . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('images/products', $name);
        } else {
            $path = '';  
        }

        Product::create([
            'ime' => $request->ime,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'proizvodjac' => $request->proizvodjac,
            'cena' => $request->cena * 100,
            'popust' => $request->popust,
            'action_id' => $request->action_id == '' ? null : $request->action_id,
            'pakovanje' => $request->pakovanje,
            'dostupnost' => $request->dostupnost,
            // Price in DB saved in cents
            'opis' => $request->opis,
            // Image is formated as relative path to storage + filename + ext
            'image' => $path,
        ]);  
        
        return redirect()->route('products')->with('success', 'Proizvod je uspešno kreiran'); 
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

        $actions = Action::where('active', 1)->get();

        return view('admin.products.edit', compact('product', 'subcategories', 'actions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // Check if image is uploaded
        if ($request->hasFile('image')) {
           
            // Delete old image
            Storage::exists($request->image) ? Storage::delete($request->image) : '';

            // Create name based on unique slug and save at default storage location
            $name = $request->slug . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('images/products', $name);
        } else {
            $path = '';  
        }

        $product->update([
            'ime' => $request->ime,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'proizvodjac' => $request->proizvodjac,
            'action_id' => $request->action_id,
            'popust' => $request->popust,
            'pakovanje' => $request->pakovanje,
            'dostupnost' => $request->dostupnost,
            // Price in DB saved in cents
            'cena' => $request->cena * 100,
            'opis' => $request->opis,
            // Image is formated as relative path to storage + filename + ext
            'image' => $path
        ]);

        return redirect()->route('products')->with('success', 'Proizvod je uspešno izmenjen');
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
        Storage::exists($product->image) ? Storage::delete($product->image) : '';

        $product->delete();

        return redirect()->route('products')->with('success', 'Proizvod je uspešno obrisan');
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

    // Return discount for selected action
    public function discount(Action $action)
    {
        return response()->json(['discount' => $action->discount]);
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
