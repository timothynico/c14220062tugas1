<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ResourceController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|'
        ]);
        if ($validated) {
            $title = $request->title;
            $description = $request->description;
            $image = $request->file("image");
            $path = null;
            if ($image !== null) {
                $path = Storage::putFile('images', $image);
                session()->flash('image', $path);
            }
            Promotion::create([
                "title" => $title,
                "description" => $description,
                "image" => $path,
            ]);
            return redirect()->route('add')->with('success', 'Promotion successfully added!');;    
        } else {
            return back()->withInput();
        }
    }

    // show all promotions
    public function index(){
        $promotions = Promotion::orderBy('id', 'desc')->get();
        
        return view('home', [
            "promotions" => $promotions
        ]);
    }

    // show edit promotions
    public function showEdit(){
        $promotions = Promotion::orderBy('id', 'asc')->get();
        
        return view('edit', [
            "promotions" => $promotions
        ]);
    }

    // detail promotion
    public function show($id){
        $promotion = Promotion::where('id', $id)->firstOrFail();
    
        $promotion->updated_at = Carbon::parse($promotion->updated_at)->format('d F Y H:i');
    
        return view('detail', [
            "promotion" => $promotion
        ]);
    }

    // post edit promotion
    public function edit(Request $request, $id){
    $promotion = Promotion::findOrFail($id);

    $validated = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|',
    ]);
    if($validated){
        $image = $request->file('image');

        if ($image !== null) {
            // hapus gambar yang lama
            Storage::disk('public')->delete($promotion->image);
            // masukan yang baru
            $path = Storage::putFile('images', $image);
            $promotion->image = $path;
        }
    
        $promotion->title = $request->title;
        $promotion->description = $request->description;
    
        $promotion->save();
    
        return redirect()->route('edit')->with('success', 'Promotion is edited successfully!');
    }else {
        return back()->withInput();
    }

    }
    
    // delete
    public function destroy($id){
        $promotion = Promotion::find($id);
    
        if ($promotion) {
            if ($promotion->image && Storage::disk('public')->exists($promotion->image)) {
                Storage::disk('public')->delete($promotion->image);
            }
    
            $promotion->delete();
        }
    
        return redirect()->route('edit')->with('success', 'Deleted promotion successfully.');
    }
    
}
