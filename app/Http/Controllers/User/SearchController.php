<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Agenda;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = trim($request->get('q', ''));

        $results = collect();

        if ($keyword !== '') {
            // Gallery
            $galleries = Gallery::with('category')
                ->where(function ($q) use ($keyword) {
                    $q->where('title', 'like', "%{$keyword}%")
                      ->orWhere('description', 'like', "%{$keyword}%");
                })
                ->get();

            foreach ($galleries as $g) {
                $results->push([
                    'type'        => 'galeri',
                    'title'       => $g->title,
                    'excerpt'     => $g->description,
                    'image'       => $g->cover_image ? asset('storage/'.$g->cover_image) : asset('images/default.jpg'),
                    'url'         => route('user.gallery.show', $g->id),
                    'meta'        => $g->category?->name,
                    'date'        => optional($g->created_at)->format('d M Y'),
                ]);
            }

            // News
            $newsItems = News::where('status', 'published')
                ->where(function ($q) use ($keyword) {
                    $q->where('title', 'like', "%{$keyword}%")
                      ->orWhere('content', 'like', "%{$keyword}%");
                })
                ->get();

            foreach ($newsItems as $n) {
                $results->push([
                    'type'        => 'berita',
                    'title'       => $n->title,
                    'excerpt'     => $n->content,
                    'image'       => $n->image ? asset('storage/'.$n->image) : asset('images/default-news.jpg'),
                    'url'         => route('user.news.show', $n->id),
                    'meta'        => 'Berita Terkini',
                    'date'        => ($n->published_date ?? $n->created_at)?->format('d M Y'),
                ]);
            }

            // Agenda
            $agendas = Agenda::published()
                ->where(function ($q) use ($keyword) {
                    $q->where('title', 'like', "%{$keyword}%")
                      ->orWhere('description', 'like', "%{$keyword}%");
                })
                ->get();

            foreach ($agendas as $a) {
                $results->push([
                    'type'        => 'agenda',
                    'title'       => $a->title,
                    'excerpt'     => $a->description,
                    'image'       => asset('images/default-agenda.jpg'),
                    'url'         => route('user.agendas.show', $a->id),
                    'meta'        => 'Agenda Sekolah',
                    'date'        => optional($a->event_date)->format('d M Y'),
                ]);
            }
        }

        return view('user.search', [
            'title'   => 'Hasil Pencarian',
            'keyword' => $keyword,
            'results' => $results,
        ]);
    }
}
