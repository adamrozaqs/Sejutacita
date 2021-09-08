<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use App\Models\Interest;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    
    public function index()
    {
        $reminders = Reminder::all();
        $interests = Interest::all();

        return view('pages.reminders.index')->with([
            'reminders' => $reminders
        ]);
    }

    
    public function create()
    {
        $reminders = Reminder::all();
        $interests = Interest::all();
    
        return view('pages.reminders.create')->with([
            'reminders' => $reminders,
            'interests' => $interests
        ]);
    }

    
    public function store(Request $request)
    {
        $data = $request->all();
        
        Reminder::create($data);
        return redirect()->route('reminder.index');
    }

   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $reminder = Reminder::findOrFail($id);

        return view('pages.reminders.edit')->with([
            'reminder' => $reminder
        ]);
    }

  
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['remind_url'] = $request->file('remind_url')->store(
            'assets/gallery_reminder', 'public'
        );

        
        $reminder = Reminder::findOrFail($id);
        $reminder->update($data);

        return redirect()->route('reminder.index');
    }

    public function destroy($id)
    {
        $reminder = Reminder::findOrFail($id);
        $reminder->delete();

        return redirect()->route('reminder.index');
    }
}
