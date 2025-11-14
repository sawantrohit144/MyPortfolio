<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class AboutSectionController extends Controller
{
    public function index()
    {
        $about = \App\Models\AboutSection::first();
        return view('admin.about.index', compact('about'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string',
            'lead_text' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'highlights' => 'nullable|string'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/about', 'public');
        }

        // Convert comma-separated highlights to array
        $data['highlights'] = json_encode(array_map('trim', explode(',', $data['highlights'])));

        AboutSection::create($data);

        return redirect()->route('admin.about.index')->with('success', 'About section created successfully.');
    }

    public function edit(AboutSection $about)
    {
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, AboutSection $about)
    {
        $data = $request->validate([
            'title' => 'nullable|string',
            'lead_text' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'highlights' => 'nullable|string'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = 'assets/';
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path($path), $filename);
            $data['image'] = $path . $filename;
        }

        $data['highlights'] = json_encode(array_map('trim', explode(',', $data['highlights'])));

        $about->update($data);

        return redirect()->route('admin.about.index')->with('success', 'About section updated.');
    }

    public function destroy(AboutSection $about)
    {
        $about->delete();
        return redirect()->route('admin.about.index')->with('success', 'About section deleted.');
    }
}
