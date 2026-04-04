<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['content'] = $request->input('content');

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('pages', 'public');
        }

        Page::create($validated);

        return redirect()->route('admin.pages.index')->with('success', 'Sayfa başarıyla oluşturuldu.');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($page->slug == 'hakkimda' && $request->has('about_sections')) {
            $sections = $request->input('about_sections');
            $content = '
                <p style="font-size: 24px; font-family: \'Playfair Display\', serif; font-style: italic; color: #1a1a1a; line-height: 1.6; margin-bottom: 48px; border-left: 4px solid #c2a35d; padding-left: 32px;">
                    "' . $sections['intro_quote'] . '"
                </p>

                <p>' . $sections['bio_1'] . '</p>

                <div style="margin: 60px 0; padding: 40px; background: #fdfdfd; border: 1px solid #f0f0f0; border-radius: 8px; text-align: center; position: relative;">
                    <i class="fas fa-quote-left" style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); font-size: 32px; color: #c2a35d; background: white; padding: 10px;"></i>
                    <p style="font-family: \'Playfair Display\', serif; font-size: 20px; font-style: italic; color: #1a1a1a; margin-bottom: 0; line-height: 1.8;">
                        "' . $sections['middle_quote'] . '"
                    </p>
                </div>

                <p>' . $sections['bio_2'] . '</p>

                <h2 style="font-family: \'Playfair Display\', serif; font-size: 32px; margin: 60px 0 24px; color: #1a1a1a;">' . $sections['section_2_title'] . '</h2>
                <p>' . $sections['section_2_text'] . '</p>

                <h2 style="font-family: \'Playfair Display\', serif; font-size: 32px; margin: 60px 0 24px; color: #1a1a1a;">' . $sections['section_3_title'] . '</h2>
                <p>' . $sections['section_3_text'] . '</p>

                <div style="margin-top: 100px; padding-top: 60px; border-top: 1px solid #eeeeee; text-align: center;">
                    <h3 style="font-family: \'Playfair Display\', serif; font-size: 20px; margin-bottom: 32px; letter-spacing: 3px; color: #c2a35d; font-weight: 700;">' . $sections['footer_title'] . '</h3>
                    <p style="font-size: 15px; color: #666; line-height: 2; max-width: 600px; margin: 0 auto;">
                        ' . $sections['footer_text'] . '
                    </p>
                    <div style="margin-top: 40px; color: #c2a35d;">
                        <i class="fas fa-heart"></i>
                    </div>
                </div>';
            $validated['content'] = $content;
        }

        if ($request->hasFile('image')) {
            if ($page->image && Storage::disk('public')->exists($page->image)) {
                Storage::disk('public')->delete($page->image);
            }
            $validated['image'] = $request->file('image')->store('pages', 'public');
        }

        $page->update($validated);

        return redirect()->route('admin.pages.index')->with('success', 'Sayfa başarıyla güncellendi.');
    }

    public function destroy(Page $page)
    {
        if ($page->image && Storage::disk('public')->exists($page->image)) {
            Storage::disk('public')->delete($page->image);
        }
        $page->delete();
        return redirect()->route('admin.pages.index')->with('success', 'Sayfa başarıyla silindi.');
    }
}
