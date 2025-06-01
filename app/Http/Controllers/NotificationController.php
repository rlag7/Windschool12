<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Overzicht van notificaties voor ingelogde gebruiker
    public function index()
    {
        $user = auth()->user();

        if (!$user) {
            abort(403, 'Geen toegang');
        }

        // Bepaal de target group van de gebruiker
        if ($user->student) {
            $targetGroup = 'Student';
        } elseif ($user->instructor) {
            $targetGroup = 'Instructor';
        } else {
            abort(403, 'Geen toegang');
        }

        $notifications = Notification::where('user_id', $user->id)
            ->where(function ($query) use ($targetGroup) {
                $query->where('target_group', $targetGroup)
                    ->orWhere('target_group', 'Both');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('notifications.index', compact('notifications'));
    }

    // Formulier om nieuwe notificatie aan te maken
    public function create()
    {
        $user = auth()->user();

        if (!$user) {
            abort(403, 'Geen toegang');
        }

        return view('notifications.create');
    }

    // Opslaan van nieuwe notificatie
    public function store(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            abort(403, 'Geen toegang');
        }

        $request->validate([
            'target_group' => 'required|in:Student,Instructor,Both',
            'message' => 'required|string',
            'notification_type' => 'required|in:Sick,LessonChange,LessonCancel,PickupAddressChange,LessonGoalChange',
            'date' => 'required|date',
            'is_active' => 'required|boolean',
            'note' => 'nullable|string',
        ]);

        Notification::create([
            'user_id' => $user->id,
            'target_group' => $request->target_group,
            'message' => $request->message,
            'notification_type' => $request->notification_type,
            'date' => $request->date,
            'is_active' => $request->is_active,
            'note' => $request->note,
        ]);

        return redirect()->route('notifications.index')->with('success', 'Notificatie succesvol toegevoegd.');
    }

    // Detailpagina notificatie
    public function show(Notification $notification)
    {
        $this->authorizeNotificationAccess($notification);

        return view('notifications.show', compact('notification'));
    }

    // Formulier om notificatie te bewerken
    public function edit(Notification $notification)
    {
        $this->authorizeNotificationAccess($notification);

        return view('notifications.edit', compact('notification'));
    }

    // Bijwerken van notificatie
    public function update(Request $request, Notification $notification)
    {
        $this->authorizeNotificationAccess($notification);

        $request->validate([
            'target_group' => 'required|in:Student,Instructor,Both',
            'message' => 'required|string',
            'notification_type' => 'required|in:Sick,LessonChange,LessonCancel,PickupAddressChange,LessonGoalChange',
            'date' => 'required|date',
            'is_active' => 'required|boolean',
            'note' => 'nullable|string',
        ]);

        $notification->update($request->all());

        return redirect()->route('notifications.index')->with('success', 'Notificatie succesvol bijgewerkt.');
    }

    // Verwijderen van notificatie
    public function destroy(Notification $notification)
    {
        $this->authorizeNotificationAccess($notification);

        $notification->delete();

        return redirect()->route('notifications.index')->with('success', 'Notificatie succesvol verwijderd.');
    }

    // Controleer of ingelogde gebruiker eigenaar is van notificatie
    private function authorizeNotificationAccess(Notification $notification)
    {
        $user = auth()->user();

        if (!$user || $notification->user_id !== $user->id) {
            abort(403, 'Geen toegang tot deze notificatie.');
        }
    }
}
