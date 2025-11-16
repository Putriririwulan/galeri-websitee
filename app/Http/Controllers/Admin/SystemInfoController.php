<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemInfo;

class SystemInfoController extends Controller
{
    public function edit()
    {
        $systemInfo = SystemInfo::firstOrCreate(
            ['id' => 1],
            [
                'system_name' => 'Galeri Sekolah',
                'system_version' => 'v1.0',
                'database_type' => 'MySQL',
                'status' => 'aktif'
            ]
        );
        
        return view('admin.system-info.edit', compact('systemInfo'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'system_name' => 'required|string|max:255',
            'system_version' => 'required|string|max:50',
            'database_type' => 'required|string|max:50',
            'status' => 'required|in:aktif,maintenance'
        ]);

        $systemInfo = SystemInfo::firstOrCreate(['id' => 1]);
        $systemInfo->update($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Informasi sistem berhasil diupdate!');
    }
}
