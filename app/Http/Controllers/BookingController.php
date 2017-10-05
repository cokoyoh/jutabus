<?php

namespace App\Http\Controllers;

use App\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function showAllBookings()
    {
        $all_bookings = Booking::with('car','user')
                ->orderBy('id','desc')
                ->get();
        return response(['data' => $all_bookings],200);
    }

    public function getBookingsToday()
    {
        $bookings_today = Booking::with('car','user')
                ->where('created_at', '=',  Carbon::today()->toDateString())
                ->orderBy('id','desc')
                ->get();
        return response(['data' => $bookings_today],200);
    }

    public function addBooking()
    {
        Booking::create([
            'car_id' => request('id'),
            'user_id' => Auth::user()->id,
            'days' => request('days'),
            'cost' => request('cost')
        ]);
        return response(['message' => 'You have successfully booked a car for hire.']);
    }

    public function update($id)
    {
        $booking = Booking::find($id);
        $booking->days = request('days');
        $booking->cost = request('cost');
        $booking->save();
        return response(['message' => 'Your booking record has been updated'],200);
    }

    public function show($id)
    {
        $booking = Booking::find($id);
        return response(['data' => $booking],200);
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return response(['message' => 'Booking record deleted!']);
    }
}
