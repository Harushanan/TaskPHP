@extends('layouts.master')

@section('content')

<div style="display: flex; flex-wrap: wrap; gap: 2rem; padding: 2rem; justify-content: center; align-items: flex-start;">

    <!-- Sidebar Form -->
    <div style="flex: 1 1 300px; background: #fff7f0; padding: 1.5rem; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); align-self: flex-start;">
        <h3 style="margin-bottom: 1rem; color: #ff7f50;">Upload Slider Image</h3>
        <form action="{{route('addslidebarimge')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="image">Choose Image:</label><br><br>
            <input type="file" name="image" id="image" required style="margin-bottom: 1rem;"><br>
            <button type="submit" style="background-color: #ff7f50; color: white; padding: 0.5rem 1rem; border: none; border-radius: 6px; cursor: pointer;">Upload</button>
        </form>

        @if(session('success'))
          <p style="color: green; text-align: center;">{{ session('success') }}</p>
        @endif

        @error('image')
          <p style="color: red; text-align: center;">{{ $message }}</p>
        @enderror

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
                @if(count($allimg)>0)

                @foreach($allimg as $x)
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 0.75rem;">
                        <img src="{{ $x->image_path }}" width="100" alt="image" style="border-radius: 8px;">
                    </td>
                    <td style="padding: 0.75rem;">{{$x->updated_at->format('Y-m-d')}}</td>
                    <td style="padding: 0.75rem;">{{ $x->updated_at->format('h:i A') }}</td>
                    <td style="padding: 0.75rem;">
                        <a href="">
                            <button style="background-color: #33cd25b1; color: white; border: none; padding: 0.4rem 1rem; border-radius: 6px; cursor: pointer; margin-right: 0.5rem;">Edit</button>
                        </a>
                        
                        <form action="{{ route('sidebar.destroy', $x->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button style="background-color: #e63946; color: white; border: none; padding: 0.4rem 1rem; border-radius: 6px; cursor: pointer;" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach
                
                @else
                  <tr><td colspan="4"><h4 style="text-align: center;">No Image Found</h4></td></tr>
                @endif

                <!-- Additional rows can be added here -->
            </tbody>
        </table>
    </div>

</div>

@endsection
