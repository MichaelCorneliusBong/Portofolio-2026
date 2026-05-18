<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        $profile = \App\Models\Profile::first();
        $skills = Skill::orderBy('category')->get();
        return view('home', compact('skills', 'profile'));
    }

    public function projects()
    {
        $projects = Project::where('is_published', true)->latest()->get();
        return view('projects', compact('projects'));
    }

    public function projectDetail($slug)
    {
        $project = Project::where('slug', $slug)->where('is_published', true)->firstOrFail();
        return view('project-detail', compact('project'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:65535',
        ]);

        Contact::create($validated);

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }
}
