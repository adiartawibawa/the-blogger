<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Notifications\NewContactNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact.index');
    }

    public function store(Request $request)
    {
        // Rate limiting: max 3 messages per hour per IP
        $key = 'contact:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 3)) {
            throw ValidationException::withMessages([
                'email' => 'Terlalu banyak percobaan. Silakan coba lagi nanti.',
            ]);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|min:10|max:5000',
        ]);

        $contact = Contact::create([
            ...$validated,
            'ip_address' => $request->ip(),
        ]);

        RateLimiter::hit($key, 3600);

        // Send notification to admin
        try {
            Notification::route('mail', config('mail.admin_email', env('ADMIN_EMAIL')))
                ->notify(new NewContactNotification($contact));
        } catch (\Exception $e) {
            logger()->error('Failed to send contact notification: ' . $e->getMessage());
        }

        return back()->with('success', 'Pesan Anda berhasil dikirim! Saya akan segera merespons.');
    }
}
