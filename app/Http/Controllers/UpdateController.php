<?php

namespace App\Http\Controllers;

use App\Models\Update;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function index()
    {
        $updates = Update::orderByDesc('id')->get();
        return view('news.index', compact('updates'));
    }
    public function create()
    {
        return view('news.create');
    }

    public function create_submit(Request $request)
    {
        $request->merge([
            'content' => str_replace(PHP_EOL,"<br>",$request->content),
        ]);
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $update = auth()->user()->news()->create($validated);
        return redirect()->route('news.show', $update->id);
    }

    public function show($id)
    {
        $update = Update::findOrFail($id);
        return view('news.show', compact('update'));
    }

    public function edit($id)
    {
        $update = Update::findOrFail($id);
        return view('news.edit', compact('update'));
    }

    public function edit_submit(Request $request, $id)
    {
        $request->merge([
            'content' => str_replace(PHP_EOL,"<br>",$request->content),
        ]);
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $update = Update::findOrFail($id);
        $update->update($validated);
        return redirect()->route('news.show', $update->id);
    }

    public function delete($id)
    {
        $update = Update::findOrFail($id);
        $update->delete();
        return redirect()->route('news.index');
    }
}
