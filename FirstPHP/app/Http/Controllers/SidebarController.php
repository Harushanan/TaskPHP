<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sidebar;

class SidebarController extends Controller
{
    public function addslidebarimge(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('slidebarimages'), $imagename);
            $imagepath = 'slidebarimages/' . $imagename;

            Sidebar::create([
                'image_path' => $imagepath, 
            ]);

            return redirect()->back()->with('success', 'Image uploaded successfully!');
        } else {
            return redirect()->back()->with('error', 'Image upload failed.');
        }
    }

    public function deletslidebarimge($id){
        $getimge = Sidebar::findOrfail($id);
        $getimge->delete();

        return redirect()->back();

    }
}
