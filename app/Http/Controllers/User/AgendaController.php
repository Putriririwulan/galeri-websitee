<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Agenda;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::published()
                        ->orderBy('event_date', 'asc')
                        ->orderBy('event_time', 'asc')
                        ->paginate(12);
        
        return view('user.agendas.index', compact('agendas'));
    }

    public function show(Agenda $agenda)
    {
        // Only show published agendas
        if (!$agenda->is_published) {
            abort(404);
        }

        return view('user.agendas.show', compact('agenda'));
    }
}
