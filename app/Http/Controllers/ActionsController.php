<?php

namespace App\Http\Controllers;

use App\Models\Action;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ActionsController extends Controller
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
        $actions = Action::paginate(20);

        return view('admin.actions.index', compact('actions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.actions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:actions',
            'discount' => 'required|numeric|min:0|max:100',
            'active' => 'required|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5200',
        ]);

        // call upload file method
        $path = $this->uploadImage($request);

        Action::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'discount' => $request->discount,
            'active' => $request->active,
            'image' => $path
        ]);

        return redirect()->route('actions.index')->with('success', 'Akcija je kreirana');
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
    public function edit(Action $action)
    {
        return view('admin.actions.edit', compact('action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Action $action)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            // ignore slug unique rule when stay the same ($action->id znaci da ignorise samo slug za taj id, za ostalo radi)
            'slug' => [
                'required',
                'max:255',
                Rule::unique('actions')->ignore($this->id),   
            ],
            'discount' => 'required|numeric|min:0|max:100',
            'active' => 'required|boolean',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5200',
        ]);

        // call upload file method
        $path = $this->uploadImage($request);

        // Ako nije dodat novi fajl $this->uploadImage vraca null
        if(! $path) {            
            Storage::exists($action->image) ? Storage::delete($action->image) : '';            
            // Ako nije uploadovan novi fajl samo prosledjuje staro ime u bazu
            $path = $action->image;
        } 

        $action->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'discount' => $request->discount,
            'active' => $request->active,
            'image' => $path
        ]);
        
        return redirect()->route('actions.index')->with('success', 'Akcija je izmenjena');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Action $action)
    {
        // Storage::exists se odnosi direktno na storage/app/public folder, To je setovano u filesystem.php za public driver
        // i .env gde navodimo koji drajver koristimo: FILESYSTEM_DRIVER=public
        if(Storage::exists($action->image)) {
            Storage::delete($action->image);
        }

        $action->delete();
        return back()->with('success', 'Akcija je obrisana');   
    }

    /**
     * 
     * Helper methods
     * 
     */

    /**
     * Create file name and upload file to storage
     * 
     * @param \Illuminate\Http\Request $request
     * @param string $name     
     * @return string $path
     * 
     */
    public function uploadImage(Request $request)
    {
        // Check if image is uploaded
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            
            // Filename created form unique slug and original extension from tmp image
            $filename = $request->slug . '.' . $file->getClientOriginalExtension();

            // storeAs method return ful path (relativ to storage driver)
            $path = $file->storeAs('images/actions', $filename);

            return $path;
        } 
        else {
            return null;
        }
    }

}
