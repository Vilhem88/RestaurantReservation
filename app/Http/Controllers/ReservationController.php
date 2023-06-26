<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Table;
use App\Enums\TableStatus;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ReservationFormRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = DB::table('tables')
            ->join('reservations', 'reservations.table_id', '=', 'tables.id')
            ->select('reservations.id', 'reservations.first_name', 'reservations.last_name', 'reservations.email', 'reservations.guest_number', 'reservations.tel_number', 'reservations.res_date',  'tables.location')
            ->get();

        // dd($reservations);

        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables = Table::where('status', TableStatus::Available)->get();
        return view('admin.reservations.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationFormRequest $request)
    {
        // dd($request->all());

        $table = Table::findOrFail($request->table_id);
        if ($table->guest_number < $request->guest_number) {
            return redirect()->route('reservations.create')->with('error', 'The guests number must be not greater than ' . $table->guest_number . ' !');
        }

        $request_date = Carbon::parse($request->res_date);
        foreach ($table->reservations as $reservation) {
            $date = Carbon::parse($reservation->res_date);
            if ($date->format('Y-m-d') == $request_date->format('Y-m-d'))
                return redirect()->back()->with('error', 'This table is already reserved for today!');
        }

        Reservation::create($request->validated());
        return redirect()->route('reservations.index')->with('success', 'A new reservation has been requested successfully! Please wait until your request is approved!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $tables = Table::where('status', TableStatus::Available)->get();
        return view('admin.reservations.edit', compact('reservation', 'tables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationFormRequest $request, Reservation $reservation)
    {
        $table = Table::where('id', $request->table_id)->first();
        // dd($table);
        if ($request->guest_number > $table->guest_number) {
            return redirect()->back()->with('error', 'Please enter a max: ' . $table->guest_number . ' guest on this Table!');
        }

        $request_date = Carbon::parse($request->res_date);
        $reservations = $table->reservations()->where('id', '!==', $reservation->id)->get(); 
        foreach ($reservations as $reservation) {
            if ($reservation->res_date == $request_date) {
                return redirect()->back()->with('error', 'This table is reserved for this date!');
            }
        }
        $reservation->update($request->validated());
        return redirect()->route('reservations.index')->with('success', 'The reservation has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        return $reservation->delete()
            ? redirect()->route('reservations.index')->with('success', 'The reservation has been deleted successfully!')
            : redirect()->route('reservations.index')->with('error', 'An error has occurred!');
    }
}
