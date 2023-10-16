<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use App\Models\Guest;
use App\Models\Group;
use App\Models\Table;
use Dompdf\Dompdf;
use Dompdf\Options;

class SeatingController extends Controller
{
    public function index(Event $event)
    {
    
        return view('seating.seating',[
            'event' => $event,
            'guests' => Guest::all(),
            'groups' => Group::all(),
            'tables' => Table::all(),
        ]);
    }

    public function saveForm(Event $event)
    {
        return view('seating.seating', [
            'event' => $event,
            'guests' => Guest::all(),
            'groups' => Group::all(),
            'tables' => Table::all(),
        ]);
    }

    public function save(Event $event, Request $request)
    {
        // Decode the JSON string into an associative array
        $seatingAssignments = json_decode($request->input('seating_assignments'), true);

        // Start a database transaction to ensure all updates succeed or none do
        DB::beginTransaction();

        try {
            foreach ($seatingAssignments as $guest_id => $table_id) {
                // For each guest, update their table_id
                // Guest::where('guest_id', $guest_id)->update(['table_id' => $table_id]);
                $guest = Guest::find($guest_id);
                $guest->table_id = $table_id;
                $guest->save();
            }
            DB::commit(); // Commit the transaction if all updates are successful
        } catch (\Exception $e) {
            DB::rollback(); // If there are any issues, rollback any database changes
            return redirect()->back()->withErrors(['error' => 'Failed to update seating assignments.']);
        }

        return redirect("/console/events/detail/{$event->event_id}/seating/preview")
            ->with('message', 'Seating plan has been saved.');
    }


    public function preview(Event $event)
    {
    
        return view('seating.preview',[
            'event' => $event,
            'guests' => Guest::orderBy('table_id')->orderBy('guest_fname')->get(),
            'groups' => Group::all(),
            'tables' => Table::all(),
        ]);
    }

    public function generatePDF($event_id) {
        $dompdf = new Dompdf();
        
        // Load HTML content from a Blade view
        $event = Event::find($event_id);
        $guests = Guest::orderBy('table_id')->orderBy('guest_fname')->get();
            
        $html = view('seating.plancontent', compact('event', 'guests'))->render();
        
        $fileName = "seatingplan.pdf";
    
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->add_info('Title', 'SeatSetter');
        try {
            $dompdf->render();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        $dompdf->stream($fileName);
        exit;
    
        // return response()->stream(
        //     function () use ($dompdf) {
        //         $dompdf->stream();
        //     },
        //     200,
        //     [
        //         'Content-Type' => 'application/pdf',
        //         'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        //     ]
        // );
    }
    


}
