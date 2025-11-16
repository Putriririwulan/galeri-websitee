<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TentangKami;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function index()
    {
        $data = TentangKami::first();
        return view('admin.tentangkami.index', compact('data'));
    }

    public function create()
    {
        return view('admin.tentangkami.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        TentangKami::create($request->all());

        return redirect()->route('admin.tentangkami.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = TentangKami::findOrFail($id);
        return view('admin.tentangkami.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = TentangKami::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('admin.tentangkami.index')->with('success', 'Data berhasil diupdate');
    }

    
}
