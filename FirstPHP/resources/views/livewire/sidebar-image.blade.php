<div>
    <div style="display: flex; flex-wrap: wrap; gap: 2rem; padding: 2rem; justify-content: center; align-items: flex-start;">

    <!-- Sidebar Form -->
    <div style="flex: 1 1 300px; background: #fff7f0; padding: 1.5rem; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); align-self: flex-start;">
        <h3 style="margin-bottom: 1rem; color: #ff7f50;">Upload Slider Image</h3>
    

        <form wire:submit.prevent="uploadImage" enctype="multipart/form-data">
            @csrf
            <input type="file" wire:model="myimage" required style="margin-bottom: 1rem;"><br>
            @error('image') <span style="color:red;">{{ $message }}</span> @enderror
            <button type="submit" style="background-color: #ff7f50; color: white; padding: 0.5rem 1rem; border: none; border-radius: 6px; cursor: pointer;">Upload</button>
        </form>

        @if(session()->has('success'))
            <p style="color: green; text-align: center;">{{ session('success') }}</p>
        @endif
    </div>

    <!-- Main Table -->
    <div style="flex: 2 1 500px; background: #ffffff; padding: 1.5rem; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #fcd5ce; text-align: left;">
                    <th style="padding: 0.75rem;">Image</th>
                    <th style="padding: 0.75rem;">Updated Date</th>
                    <th style="padding: 0.75rem;">Updated Time</th>
                    <th style="padding: 0.75rem;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($allImages as $x)
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 0.75rem;">
                            <img src="{{{asset($x->image_path) }}}" width="100" alt="image" style="border-radius: 8px;">
                        </td>
                        <td style="padding: 0.75rem;">{{ $x->updated_at->format('Y-m-d') }}</td>
                        <td style="padding: 0.75rem;">{{ $x->updated_at->format('h:i A') }}</td>
                        <td style="padding: 0.75rem;">

                            <!-- Edit Button -->
                            @if($editId !== $x->id)
                                <button wire:click="editImageForm({{ $x->id }})" style="background-color: #3b82f6; color: white; border: none; padding: 0.4rem 1rem; border-radius: 6px; cursor: pointer; margin-right: 0.5rem;">
                                    Edit
                                </button>
                            @endif

                            <!-- Delete Button -->
                            <button wire:click="deleteImage({{ $x->id }})" onclick="return confirm('Are you sure you want to delete this image?')" style="background-color: #e63946; color: white; border: none; padding: 0.4rem 1rem; border-radius: 6px; cursor: pointer;">
                                Delete
                            </button>

                            <!-- Edit Form -->
                            @if($editId === $x->id)
                                <div style="margin-top: 1rem;">
                                    <input type="file" wire:model="editImage" required style="margin-bottom: 0.5rem;">
                                    @error('editImage') <span style="color:red;">{{ $message }}</span> @enderror
                                    <br>
                                    <button wire:click="updateImage({{ $x->id }})" style="background-color: #10b981; color: white; border: none; padding: 0.4rem 1rem; border-radius: 6px; cursor: pointer;" onclick="return confirm('Update this image?')">Update</button>
                                    <button wire:click="$set('editId', null)" style="background-color: #6b7280; color: white; border: none; padding: 0.4rem 1rem; border-radius: 6px; cursor: pointer; margin-left: 0.5rem;">Cancel</button>
                                </div>
                            @endif

                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4"><h4 style="text-align: center;">No Image Found</h4></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</div>
