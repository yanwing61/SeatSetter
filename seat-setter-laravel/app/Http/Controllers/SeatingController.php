<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
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
    
        $tables = Table::where('event_id', $event->event_id)->get();
        //$guests = Guest::where('event_id', $event->event_id)->get();
        $groups = Group::where('event_id', $event->event_id)->get();

        return view('seating.seating',[
            'event' => $event,
            'tables' => $tables,
            'guests' => Guest::all(),
            'groups' => $groups,
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

    public function generateCSV($event_id) {
        
        $event = Event::find($event_id);
        $guests = Guest::orderBy('table_id')->orderBy('guest_fname')->get();
        $tables = Table::all();
        
        $csvFileName = 'seatingplan.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];

        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['table_id', 'first_name','last_name','group_id','remarks']);

        foreach ($guests as $guest) {
            fputcsv($handle, [$guest->table_id, $guest->guest_fname, $guest->guest_lname, $guest->group_id, $guest->guest_remarks]);
        }

        fclose($handle);

        return Response::make('', 200, $headers);
    }

    public function generatePDF($event_id) {
        $options = new Options();
        $options->setIsRemoteEnabled(true);
        
        $dompdf = new Dompdf($options);
        
        // Load HTML content from a Blade view
        $event = Event::find($event_id);
        $guests = Guest::orderBy('table_id')->orderBy('guest_fname')->get();
        $tables = Table::all();
            
        $html = "<!DOCTYPE html>
        <html lang='en'>
        <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>SeatSetter</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin='anonymous'>
        <link rel='stylesheet' href='https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css'>
        <link rel='stylesheet' href='/app.css'>
        </head>
        <body>" . 
        view('seating.plancontent', compact('event', 'guests'))->render() . 
        "</body>
        </html>";
        
        $fileName = "seatingplan.pdf";
    
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->add_info('Title', 'SeatSetter');
        $dompdf->render();
       
        $dompdf->stream($fileName);
        exit;
    }

    public function generateIMGPDF($event_id) {
        $options = new Options();
        $options->setIsRemoteEnabled(true);
        
        $dompdf = new Dompdf($options);
        
        // Load HTML content from a Blade view
            $event = Event::find($event_id);
            $guests = Guest::all();
            $groups = Group::all();
            $tables = Table::all();
            
        $html = "<!DOCTYPE html>
        <html lang='en'>
        <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>SeatSetter</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN' crossorigin='anonymous'>
        <link rel='stylesheet' href='https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css'>
        <link rel='stylesheet' href='/app.css'>
        </head>
        <body>" . 
        view('seating.mainseating', compact('event', 'guests', 'tables'))->render() . 
        "</body>
        </html>";
        
        $fileName = "seatingplanIMG.pdf";
    
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->add_info('Title', 'SeatSetter');
        $dompdf->render();
       
        $dompdf->stream($fileName);
        exit;
    }
    


}
