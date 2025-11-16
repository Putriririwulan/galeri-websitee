<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::orderBy('event_date', 'desc')
                        ->orderBy('event_time', 'desc')
                        ->paginate(10);
        
        return view('admin.agendas.index', compact('agendas'));
    }

    public function create()
    {
        return view('admin.agendas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'is_published' => 'boolean'
        ], [
            'title.required' => 'Judul agenda harus diisi',
            'description.required' => 'Deskripsi agenda harus diisi',
            'event_date.required' => 'Tanggal agenda harus diisi',
            'event_time.required' => 'Jam agenda harus diisi',
        ]);

        $validated['is_published'] = $request->has('is_published');

        Agenda::create($validated);

        return redirect()->route('agendas.index')
            ->with('success', 'Agenda berhasil ditambahkan');
    }

    public function show(Agenda $agenda)
    {
        return view('admin.agendas.show', compact('agenda'));
    }

    public function edit(Agenda $agenda)
    {
        return view('admin.agendas.edit', compact('agenda'));
    }

    public function update(Request $request, Agenda $agenda)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'is_published' => 'boolean'
        ], [
            'title.required' => 'Judul agenda harus diisi',
            'description.required' => 'Deskripsi agenda harus diisi',
            'event_date.required' => 'Tanggal agenda harus diisi',
            'event_time.required' => 'Jam agenda harus diisi',
        ]);

        $validated['is_published'] = $request->has('is_published');

        $agenda->update($validated);

        return redirect()->route('agendas.index')
            ->with('success', 'Agenda berhasil diperbarui');
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return redirect()->route('agendas.index')
            ->with('success', 'Agenda berhasil dihapus');
    }

    public function togglePublish(Agenda $agenda)
    {
        $agenda->update([
            'is_published' => !$agenda->is_published
        ]);

        $status = $agenda->is_published ? 'dipublikasikan' : 'disembunyikan';
        
        return redirect()->back()
            ->with('success', "Agenda berhasil {$status}");
    }
}
