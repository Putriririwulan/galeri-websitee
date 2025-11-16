<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReplyContactMail;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(10);
        $unreadCount = Contact::where('status', 'unread')->count();
        
        return view('admin.contacts.index', compact('contacts', 'unreadCount'));
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        
        // Mark as read
        if ($contact->status === 'unread') {
            $contact->update(['status' => 'read']);
        }
        
        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        
        return redirect()->route('contacts.index')
            ->with('success', 'Pesan berhasil dihapus');
    }

    public function markAsRead($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['status' => 'read']);
        
        return redirect()->back()
            ->with('success', 'Pesan ditandai sudah dibaca');
    }

    public function markAsUnread($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['status' => 'unread']);
        
        return redirect()->back()
            ->with('success', 'Pesan ditandai belum dibaca');
    }

    public function sendReply(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'reply_subject' => 'required|string|max:255',
            'reply_message' => 'required|string',
        ], [
            'reply_subject.required' => 'Subject email harus diisi',
            'reply_message.required' => 'Isi balasan harus diisi',
        ]);

        try {
            // Ambil data contact
            $contact = Contact::findOrFail($id);
            
            // Kirim email
            Mail::to($contact->email)->send(
                new ReplyContactMail(
                    $request->reply_subject,
                    $request->reply_message,
                    $contact->name
                )
            );
            
            return response()->json([
                'success' => true,
                'message' => 'Email berhasil dikirim ke ' . $contact->email
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengirim email: ' . $e->getMessage()
            ], 500);
        }
    }
}
