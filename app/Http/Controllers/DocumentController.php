<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index(){
        $docs = Document::all();
        $recents = Document::with('user','category')->orderBy('created_at', 'desc')->take(4)->get();
        return view('docs.index',compact('docs','recents'));
    }

    public function upload(DocumentRequest $request){
        // --------upload---------
        $validated = $request->validated();
        $file = $validated["path"];
        $fileName = $file->store("files","public");
        //-------------------------
        Document::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'downloads' => $request->downloads,
            'path' => $fileName
        ]);

        return redirect()->route('home')->with([
            'success' => 'file uploaded successfully'
        ]);
    }

    public function download($id){
        
        $file = Document::find($id);
        $file->downloads++;
        $file->save();
        // dd($file->downloads);

        return response()->download(storage_path("app/public/{$file->path}"));
    }

    public function explore($id){
        $doc = Document::with('user','category')->find($id);
        
        return view('docs.exploreDoc',compact('doc'));
    }

    public function filterByCategory($id){
        $docs = Document::where('category_id',$id)->get();

        return view('docs.index',compact('docs'));
    }
}
