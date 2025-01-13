<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Filedata;

class FileDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filedata = Filedata::get();
        return Inertia::render('FileData/Index',[
            'filedata' => $filedata
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('FileData/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,pdf|max:10240',  // max size in kilobytes
        ]);

        $file = $request->file('file');

        // Store the file in the 'uploads' directory on the 'public' disk
        $filePath = $file->store('uploads', 'public');

        Filedata::create([
            'file_name' => $request->file_name,
            'file_type' => $request->file_type,
            'file_size' => $request->file_size,
            'file_path' => $filePath,
            'user_id' => Auth::id(), // Store the authenticated user's ID
        ]);

        return redirect()->route('filedata.index')->with('message', 'File Uploaded Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Filedata $filedata)
    {
        return Inertia::render('FileData/Show', [
            'filedata' => $filedata
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filedata $filedata)
    {
        return Inertia::render('FileData/Edit', [
            'filedata' => $filedata
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Filedata $filedata)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,pdf|max:10240',  // max size in kilobytes
        ]);

        $file = $request->file('file');

        // Store the file in the 'uploads' directory on the 'public' disk
        $filePath = $file->store('uploads', 'public');

        $filedata->file_name = $file->getClientOriginalName();
        $filedata->file_type = $file->getClientMimeType();
        $filedata->file_size = $file->getSize();
        $filedata->file_path = $filePath;

        $filedata->save();

        return redirect()->route('filedata.index')->with('message', 'File Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filedata $filedata)
    {
        $filedata ->delete();
        return redirect()->route('filedata.index')->with('message', 'File Deleted Successfully');
    }

}
