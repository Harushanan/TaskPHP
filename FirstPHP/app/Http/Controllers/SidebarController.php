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

   
   public function updateslidebarimage(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $sidebar = Sidebar::findOrFail($id);

        if ($request->hasFile('image')) {

            // Delete old image if exists
            if ($sidebar->image_path && file_exists(public_path($sidebar->image_path))) {
                unlink(public_path($sidebar->image_path));
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();

            // Ensure the directory exists
            $destinationPath = public_path('slidebarimages');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move the new image
            $request->file('image')->move($destinationPath, $imageName);

            // Save relative path in DB
            $sidebar->image_path = 'slidebarimages/' . $imageName;
            $sidebar->save();

            return redirect()->back()->with('success', 'Image Updated successfully!');

        }

        return redirect()->back()->with('error', 'No image file found');

    }


}
