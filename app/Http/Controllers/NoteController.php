<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function showAllNotes(){
        $notes = Note::orderBy('updated_at', 'desc')->get();
        return view('notes',['notes'=> $notes]);
    }

    public function viewNote(Request $request)
    {
    $note = Note::find($request->id);
    return view('note',['note'=>$note]);

    }

    public function createNote()
    {
        return view('create-note');
    }

    public function storeNote(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
        ]);

        $note = new Note();
        $note->title = $validated['title'];
        $note->description = $validated['description']; 
        $note->content = $validated['content'];
        $note->save();

        return redirect()->route('showAllNotes')->with('success', 'Note created successfully.');
    }

    public function editNote(Request $request)
    {
    $note = Note::find($request->id);
    return view('edit-note',['note'=>$note]);

    }

    public function updateNote(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'content' => 'required|string|max:10000',
        ]);

        $note = Note::find($request->id);

        $note=new Note();
        $note->title = $validated['title'];
        $note->description = $validated['description']; 
        $note->content = $validated['content'];
        $note->save();

        return redirect()->route('viewNote', ['id' => $note->id])->with('success', 'Note updated successfully.');
    }

    public function deleteNote(Request $request)
    {
        $note=Note::find($request->id);
        if ($note) {
            $note->delete();
        }

        return redirect()->route('showAllNotes')->with('success', 'Note deleted successfully.');
    }
}
