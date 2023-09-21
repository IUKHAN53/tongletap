<?php

namespace App\Console;

use App\Mail\EventNotification;
use App\Mail\MentalHealthAssessmentReminder;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $users = User::query()->where('type', strtolower('employee'))->get(); // Fetch users from your database
            foreach ($users as $user) {
                $user->sendMentalHealthAssessmentReminders();
            }
        })->monthly();

        $schedule->call(function () {
            $nearingEvents = Event::where('start_date', '>=', now())
                ->where('start_date', '<=', now()->addDays(3))
                ->get();

            foreach ($nearingEvents as $event) {
                $msg = "Event: " . $event->title . " is near. It starts from " . $event->start_date;

                // Fetch employees related to this event
                $employees = $event->employees;

                foreach ($employees as $employee) {
                    // Send Email
                    if ($employee->user) {
                        Mail::to($employee->user->email)->send(new EventNotification($msg));
                        sendWhatsappMessage($employee->user->whatsapp_number, $msg);
                    }
                }
            }
            // For Counseling Appointments (Tickets)
            $nearingTickets = Ticket::where('timeslot', '>=', now())
                ->where('timeslot', '<=', now()->addDays(3))
                ->where('status', '==', 'approved')
                ->get();

            foreach ($nearingTickets as $ticket) {
                $msg = "Your counseling appointment is near. It is scheduled for " . $ticket->timeslot;
                $employee = User::find($ticket->employee_id);
                if ($employee){
                    Mail::to($employee->email)->send(new EventNotification($msg));
                    sendWhatsappMessage($employee->whatsapp_number, $msg);
                }
            }
        })->daily();
    }

    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
