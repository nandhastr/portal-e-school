<?php

namespace App\Http\Controllers\CrudPortal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PortalModel\Komponen;
use App\Models\PortalModel\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $user = Auth::user();
        $data = [
            'komponen'=>Komponen::all(),
            'event'=>Event::all(),
            'title' => 'Halaman Data Event',
            'user'=> $user,
        ];
        return view('portal.admin.data-event-page', $data);
    
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $request->validate([
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            'backgroundColor' => 'required',
            'borderColor' => 'required',
        ]);

        // simpan ke db
        $event = new Event;
         
        $event->title = $request->title;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->backgroundColor = $request->backgroundColor;
        $event->borderColor = $request->borderColor;
        
        // dd($event); 

        $event->save();
        
        return redirect()->back()->with('success', 'Data berhasil disimpan');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
    }
    }



    // metod update
    public function update(Request $request, string $id)
    {
        //  dd($request->all());
      try {
        $request->validate([
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            'backgroundColor' => 'required',
            'borderColor' => 'required',
        ]);

        // Temukan record berdasarkan ID
        $event = event::findOrFail($id);

            // Perbarui data lainnya
        $event->title = $request->title;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->backgroundColor = $request->backgroundColor;
        $event->borderColor = $request->borderColor;
        $event->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
    }
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(string $id)
    {
        try {
        // Temukan record berdasarkan ID
        $event = event::findOrFail($id);
        // Hapus record dari database
        $event->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
    };
    }
}
