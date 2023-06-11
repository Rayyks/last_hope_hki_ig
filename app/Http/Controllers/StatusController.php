<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Letter;

class StatusController extends Controller
{
    public function update(Request $request)
    {
        $letterId = $request->input('letter_id');
        $statusId = $request->input('status');
        $info = $request->input('info');
        // Retrieve the letter from the database
        $letter = Letter::findOrFail($letterId);

        // Update the status of the letter
        $letter->status = $statusId;
        $letter->info = $info;
        $letter->save();

        // Redirect back or return a response as needed
        return redirect()->back();
    }
}
