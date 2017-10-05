<?php

namespace App\Http\Controllers;

use App\Transport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransportController extends Controller
{
    public function showAllTransport()
    {
        $all_transports = Transport::with('user')
                ->orderBy('id','desc')
                ->get();
        return response(['data' => $all_transports],200);
    }

    public function transportToday()
    {
        $transport_today = Transport::with('user')
                ->where('created_at', '=', Carbon::today()->toDateString())
                ->orderBy('id','desc')
                ->get();
        return response(['data' => $transport_today],200);
    }

    public function reserveTransport()
    {
        Transport::create([
            'name_of_good' => request('name_of_good'),
            'origin' => request('origin'),
            'destination' => request('destination'),
            'description' => request('description'),
            'user_id' => Auth::user()->id,
            'cost' => request('cost')
        ]);
        return response(['message' => 'Transportation has been reserved']);
    }

    public function show($id)
    {
        $transportation = Transport::findOrFail($id);
        return response(['data' => $transportation],200);
    }

    public function update($id)
    {
        $transportation = Transport::findOrFail($id);
        $transportation->name_of_good = request('name_of_good');
        $transportation->origin = request('origin');
        $transportation->destination = request('destination');
        $transportation->cost = request('cost');
        $transportation->save();
        return response(['message' => 'Transportation record updated successfully'],200);
    }

    public function destroy($id)
    {
        $transportation = Transport::findOrFail($id);
        $transportation->delete();
        return response(['message' => 'Transportation has been deleted!'],200);
    }
}
