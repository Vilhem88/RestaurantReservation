<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Table;
use App\Enums\TableStatus;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ClientReservationForm;

class ReservationController extends Controller
{
    public function stepOne(Request $request)
    {
        $reservation = Session::get('reservation', $request);
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();
        return view('reservations.step-one', compact('reservation', 'min_date', 'max_date'));
    }

    public function storeStepOne(ClientReservationForm $request)
    {
        $reservation = new Reservation();
        $reservation->fill($request->validated());
        $request->session()->put('reservation', $reservation);
        return redirect()->route('frontendReservations.stepTwo');
    }


    public function stepTwo(Request $request)
    {
        $reservation = Session::get('reservation', $request);
        // dd($reservation);
        $res_table_ids = Reservation::orderBy('res_date')->get()
        ->filter(function($value) use ($reservation) {
            $val_date = Carbon::parse($value->res_date);
            $reservation_date = Carbon::parse($reservation->res_date);
            dd($reservation, $reservation_date, $value);
            return $val_date == $reservation_date;
        })->pluck('table_id');
       
        // dd($res_table_ids);
        $tables = Table::where('status', TableStatus::Available)
                        ->where('guest_number', '>=', $reservation->guest_number)
                        ->whereNotIn('id',$res_table_ids)
                        ->get();
        return view('reservations.step-two', compact('reservation', 'tables'));
    }


    public function storeStepTwo(Request $request)
    {
        $validated = $request->validate([
            'table_id' => ['required']
        ]);
        $reservation = $request->session()->get('reservation');
        $reservation->fill($validated);
        $reservation->save();

        $request->session()->forget('reservation'); 

        return redirect()->route('frontendWelcome.thankYou');

    }

}
