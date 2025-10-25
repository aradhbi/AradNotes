<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Interest;
use App\Models\Skill;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function index()
    {
        $about = About::with(['skills', 'interests'])->first();
        $allSkills = Skill::all();
        $allInterests = Interest::all();
        return view('admin.about.index', compact('about','allSkills','allInterests'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $about = About::firstOrNew([]);
        $about->title = $request->input('title');
        $about->description = $request->input('description');
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('about', 's3');
            $about->image = $imagePath;
        }
        $about->save();
        return redirect()->route('admin.about')->with('success', 'درباره من با موفقیت ذخیره شد.');
    }
    public function updateSkillsAndInterests(Request $request)
    {
        $skillsInput = $request->input('skills', []);
        $interestsInput = $request->input('interests', []);

        // ثبت موارد جدید در skills
        $skillIds = [];
        foreach ($skillsInput as $skill) {
            if (is_numeric($skill)) {
                $skillIds[] = $skill;
            } else {
                // مورد جدید، اول چک می‌کنیم آیا قبلا هست یا نه
                $existing = Skill::firstOrCreate(['title' => $skill]);
                $skillIds[] = $existing->id;
            }
        }

        // ثبت موارد جدید در interests
        $interestIds = [];
        foreach ($interestsInput as $interest) {
            if (is_numeric($interest)) {
                $interestIds[] = $interest;
            } else {
                $existing = Interest::firstOrCreate(['title' => $interest]);
                $interestIds[] = $existing->id;
            }
        }

        $about = About::first();

        $about->skills()->sync($skillIds);
        $about->interests()->sync($interestIds);

        return redirect()->back()->with('success', 'مهارت‌ها و علایق بروزرسانی شدند.');
    }




}
