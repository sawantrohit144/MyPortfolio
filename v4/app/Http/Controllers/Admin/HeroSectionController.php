<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class HeroSectionController extends Controller
{
    public function index()
    {
        $hero = HeroSection::first();
        return view('admin.hero.index', compact('hero'));
    }

    public function create()
    {
        $count = HeroSection::count();
        if ($count > 0) {
            return redirect()->route('admin.hero.index')
                ->with('error', 'You can only have one Hero Section. Please edit or delete the existing one.');
        }
        return view('admin.hero.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'available' => 'nullable|boolean',
            'badge_text' => 'nullable|string',
            'headline' => 'nullable|string',
            'highlighted_name' => 'nullable|string',
            'typed_texts' => 'nullable|string',
            'primary_button_text' => 'nullable|string',
            'primary_button_link' => 'nullable|string',
            'primary_button_icon' => 'nullable|string',
            'secondary_button_text' => 'nullable|string',
            'secondary_button_link' => 'nullable|string',
            'secondary_button_icon' => 'nullable|string',
            'scroll_text' => 'nullable|string',
        ]);

        // ✅ Convert comma-separated text to JSON
        $data['typed_texts'] = json_encode(array_filter(array_map('trim', explode(',', $data['typed_texts'] ?? ''))));

        HeroSection::create($data);

        return redirect()->route('admin.hero.index')->with('success', 'Hero section created successfully.');
    }

    public function edit(HeroSection $hero)
    {
        return view('admin.hero.edit', compact('hero'));
    }

    public function update(Request $request, HeroSection $hero)
    {
        $data = $request->validate([
            'available' => 'nullable|boolean',
            'badge_text' => 'nullable|string',
            'headline' => 'nullable|string',
            'highlighted_name' => 'nullable|string',
            'typed_texts' => 'nullable|string',
            'primary_button_text' => 'nullable|string',
            'primary_button_link' => 'nullable|string',
            'primary_button_icon' => 'nullable|string',
            'secondary_button_text' => 'nullable|string',
            'secondary_button_link' => 'nullable|string',
            'secondary_button_icon' => 'nullable|string',
            'scroll_text' => 'nullable|string',
        ]);

        $data['typed_texts'] = json_encode(array_filter(array_map('trim', explode(',', $data['typed_texts'] ?? ''))));

        $hero->update($data);

        return redirect()->route('admin.hero.index')->with('success', 'Hero section updated successfully.');
    }

    public function destroy(HeroSection $hero)
    {
        $hero->delete();
        return redirect()->route('admin.hero.index')->with('success', 'Hero section deleted successfully.');
    }
}
