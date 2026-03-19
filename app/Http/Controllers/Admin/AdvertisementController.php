<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::latest()->paginate(10);
        return view('admin.advertisements.index', compact('advertisements'));
    }

    public function create()
    {
        return view('admin.advertisements.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'type' => 'required|in:image,script',
            'image' => 'required_if:type,image|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|string',
            'script_code' => 'required_if:type,script|nullable|string',
            'position' => 'required|string',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('ads', 'public');
            $validated['image'] = $path;
        }

        $validated['is_active'] = $request->has('is_active');
        Advertisement::create($validated);

        return redirect()->route('admin.advertisements.index')->with('success', 'Reklam eklendi.');
    }

    public function edit(Advertisement $advertisement)
    {
        return view('admin.advertisements.edit', compact('advertisement'));
    }

    public function update(Request $request, Advertisement $advertisement)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'type' => 'required|in:image,script',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|string',
            'script_code' => 'required_if:type,script|nullable|string',
            'position' => 'required|string',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            if ($advertisement->image && !Str::startsWith($advertisement->image, ['http://', 'https://'])) {
                Storage::disk('public')->delete($advertisement->image);
            }
            $path = $request->file('image')->store('ads', 'public');
            $validated['image'] = $path;
        }

        $validated['is_active'] = $request->has('is_active');
        $advertisement->update($validated);

        return redirect()->route('admin.advertisements.index')->with('success', 'Reklam güncellendi.');
    }

    public function destroy(Advertisement $advertisement)
    {
        if ($advertisement->image) {
            Storage::disk('public')->delete($advertisement->image);
        }
        $advertisement->delete();
        return back()->with('success', 'Reklam silindi.');
    }
}
