<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentBlock;
use App\Traits\HasContentBlocks;
use App\Models\Page;

class PageController extends Controller
{

    use HasContentBlocks;
    public function index()
    {
        $pages = Page::all();
        return view('page', compact('pages'));
    }
    public function saveContentBlock(Request $request)
    {
        $page = new Page();
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|in:text,image',
            'page_id' => 'required|exists:pages,id',
        ]);

        $page = Page::findOrFail($validatedData['page_id']);
        
    
        if ($validatedData['type'] === 'text') {
            $page->addContentBlock('text', [
                'title' => $validatedData['title'], 
                'content' => $validatedData['content']
            ]);
        }
    
        elseif ($validatedData['type'] === 'image') {
            if($request->hasFile('image')) {
                
                $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
                $imagePath = $request->file('image')->move(public_path('images'), $imageName);
                $page->addContentBlock('image', [
                    'title' => $validatedData['title'], 
                    'content' => $imagePath
                ]);
            }
        }       
        return redirect()->back()->with('success', 'Content block added successfully');
    }

}
