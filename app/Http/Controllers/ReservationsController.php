<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Redirect;
use Auth;
use Validator;
use DB;
use Session;
use Input;
use App\Driver_tbl;
use App\Carride_tbl;
use App\Van_tbl;
use App\Reservation;


class ReservationsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index(Request $request)    {
        $reservations = Reservation::orderBy('updated_at','desc')->get();
        return view('reserve_1')->with('reservations',$reservations);
    }
    public function create()    {
        return view('reserve_ticket');
    }
    public function store(Request $request)    {
        $checktime = DB::table('reservations')   ->where('date',$request->date)
                                                 ->where('time_out',$request->time_out)
                                                 ->where('seat',$request->seat)->get();
        if(count($checktime)==0)
        {
        Reservation::create( $request->all() );
        $reservation = Reservation::all()->last();
        return redirect('reservations');
        }
        else
        {
            $carride = (Carride_tbl::find($request->carrid_id));
            $van = (Van_tbl::find($carride->id_van));
            return view('reserve_ticket')->with('errors','วันที่ '.$request->date.' เวลา '.$request->time_out.' มีคนจองแล้วค่ะ '. 'กรุณากรอกข้อมูลใหม่')
            ->with('carride',$carride)
                                      ->with('van',$van);
        }
    }
    /*public function show($id)
    {
        $appoint = Appoint::findOrFail($id);
        return view('appoint.show')->with('appoint',$appoint);
    }
    public function edit($id)
    {
        $appoint = Appoint::findOrFail($id);
        return view('appoint.edit')->with('appoint',$appoint)
                                   ->with('id',$id);
    }
    public function update(Request $request, $id)
    {
        $appoint = Appoint::findOrFail($id);      
        $appoint->update($request->all());
        return redirect('appoints');
    }*/
    public function destroy($id)
    {
        Reservation::destroy($id);
        return redirect('reservations');
    }
    
   public function hitkohlanta()
   { 
    return view('hitkohlanta');
   }

   public function posthitkohlanta(Request $request)
   {
    $carride_tbls = DB::table('carride_tbls')->orderBy('carrid_id', 'desc')->paginate(25);
    $source = $request->get('source');
    $endways = $request->get('endways'); 
    $sourcep = DB::table('carride_tbls')
                        ->where('source', $source)
                        ->distinct()->get(['source']);
    $endwaysp = DB::table('carride_tbls')
                        ->where('endways', $endways)
                        ->distinct()->get(['endways']);
    return view('reserve')->with('source',$sourcep)
                          ->with('endways',$endwaysp)
                          ->with('carride_tbls',$carride_tbls);
   }

   public function hitsurad()
   { 
    return view('hitsurad');
   }
   public function posthitsurad(Request $request)
   {
    $carride_tbls = DB::table('carride_tbls')->orderBy('carrid_id', 'desc')->paginate(25);
    $source = $request->get('source');
    $endways = $request->get('endways'); 
    $sourcep = DB::table('carride_tbls')
                        ->where('source', $source)
                        ->distinct()->get(['source']);
    $endwaysp = DB::table('carride_tbls')
                        ->where('endways', $endways)
                        ->distinct()->get(['endways']);
    return view('reserve')->with('source',$sourcep)
                          ->with('endways',$endwaysp)
                          ->with('carride_tbls',$carride_tbls);
   }

   public function hitnakhon()
   { 
    return view('hitnakhon');
   }
   public function posthitnakhon(Request $request)
   {
    $carride_tbls = DB::table('carride_tbls')->orderBy('carrid_id', 'desc')->paginate(25);
    $source = $request->get('source');
    $endways = $request->get('endways'); 
    $sourcep = DB::table('carride_tbls')
                        ->where('source', $source)
                        ->distinct()->get(['source']);
    $endwaysp = DB::table('carride_tbls')
                        ->where('endways', $endways)
                        ->distinct()->get(['endways']);
    return view('reserve')->with('source',$sourcep)
                          ->with('endways',$endwaysp)
                          ->with('carride_tbls',$carride_tbls);
   }

   public function hithatyai()
   { 
    return view('hithatyai');
   }
   public function posthithatyai(Request $request)
   {
    $carride_tbls = DB::table('carride_tbls')->orderBy('carrid_id', 'desc')->paginate(25);
    $source = $request->get('source');
    $endways = $request->get('endways'); 
    $sourcep = DB::table('carride_tbls')
                        ->where('source', $source)
                        ->distinct()->get(['source']);
    $endwaysp = DB::table('carride_tbls')
                        ->where('endways', $endways)
                        ->distinct()->get(['endways']);
    return view('reserve_selected')->with('source',$sourcep)
                          ->with('endways',$endwaysp)
                          ->with('carride_tbls',$carride_tbls);
   }
}


