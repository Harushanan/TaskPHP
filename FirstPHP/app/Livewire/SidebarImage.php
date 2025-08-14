<?php

namespace App\Livewire;


use Livewire\Component;
use Livewire\WithFileUploads; // trait import


use App\Models\Sidebar;


class SidebarImage extends Component
{
    use WithFileUploads;

    public $myimage;          
    public $editImage;      
    public $editId;        
    public $allImages;  

    public function uploadImage()
    {
        $this->validate([
            'myimage' => 'required|image|max:2048', // 2MB limit
        ]);

        $filename = time() . '_' . $this->myimage->getClientOriginalName();

        // Save file in storage/app/public/slidebarimages
        $this->myimage->storeAs('slidebarimages', $filename, 'public');

        // Save path in DB
        Sidebar::create([
            'image_path' => 'storage/slidebarimages/' . $filename,
        ]);

        session()->flash('success', 'Image uploaded successfully!');
        $this->myimage=null;

    }

    public function deleteImage($id) {
        $sidebar = Sidebar::find($id);

        $sidebar->delete();
        session()->flash('success', 'Image deleted successfully!');
    }

    public function editImageForm($id) {
        $this->editId = $id;
        $sidebar = Sidebar::find($id);
        $this->myimage = null;
    }

    public function updateImage($id) {
        $this->validate([
            'editImage' => 'required|image|max:2048',
        ]);

        $sidebar = Sidebar::find($id);

        // Delete old image if exists
        if ($sidebar->image_path && file_exists(public_path($sidebar->image_path))) {
            unlink(public_path($sidebar->image_path));
        }

        $path = $this->editImage->store('sidebar', 'public');
        $sidebar->update([
            'image_path' => '/storage/' . $path,
        ]);

        session()->flash('success', 'Image updated successfully!');
        $this->editId = null;
        $this->editImage = null;
        $this->allImages = Sidebar::latest()->get();
    }

    


    



    

    public function render()
    {
        $this->allImages = Sidebar::all();
        return view('livewire.sidebar-image');

    }
    
    
    

    

    

    

}
