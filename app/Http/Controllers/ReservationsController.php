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
        if(!Auth::check())
          { 
            $anony=true;
          $name=Session::get('name');
          if(Session::get('name')!=null)
            $reservations = Reservation::where('name',Session::get('name'))->orderBy('updated_at','desc')->paginate(25);
          else
            $reservations=null;
        }
        else{
          $anony=false;
          $name=DB::table('users')->where('id',Auth::user()->id)->value('fname');
          $reservations = Reservation::where('id',Auth::user()->id)->orderBy('updated_at','desc')->paginate(25);
        }
        return view('reserve_1')->with('reservations',$reservations)
                                ->with('name',$name)
                                ->with('anony',$anony);
    }
    public function show_income_each(Request $request)    {
        $date =$request->get('date_each');
        $all_point = DB::table('reservations')->where('date',$date)->get();
        $points = array();
        if(count($all_point)>0)
        {
          foreach ($all_point as $p) {
           array_push($points,$p->id_point);
          }
        }
        $data_each = array();
        if(count($points)>0)
        {
          foreach ($points as $p) {
            array_push($data_each,DB::table('points')->where('id_point',$p)->get()[0]);
          }
        }
        $total_each = 0;
        if(count($data_each)>0)
        {
          foreach ($data_each as $d) {
            $total_each+=$d->cost;
          }
        }
        return view('receipts')->with('date',$date)
                                ->with('total_each',$total_each);
    }
    public function show_income_month(Request $request)    {
        $date =$request->get('date_month');

        $all_point = DB::table('reservations')->where('date','like',$date.'%')->get();
        
        $points = array();
        if(count($all_point)>0)
        {
          foreach ($all_point as $p) {
           array_push($points,$p->id_point);
          }
        }
        $data_each = array();
        if(count($points)>0)
        {
          foreach ($points as $p) {
            array_push($data_each,DB::table('points')->where('id_point',$p)->get()[0]);
          }
        }
        $total_month = 0;
        if(count($data_each)>0)
        {
          foreach ($data_each as $d) {
            $total_month+=$d->cost;
          }
        }
        return view('receipts')->with('date_month',$date)
                                ->with('total_month',$total_month);
        
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
            $pp =  "";
            $nn =  "";
            $cost =  "";
            $carride = (Carride_tbl::find($request->carrid_id));
            $van = (Van_tbl::find($carride->id_van));
            return view('reserve_ticket')->with('errors','วันที่ '.$request->date.' เวลา '.$request->time_out.' มีคนจองแล้วค่ะ '. 'กรุณากรอกข้อมูลใหม่')
            ->with('carride',$carride)
                                      ->with('van',$van)
                                      ->with('cost',$cost)
                                      ->with('pp',$pp)
                                      ->with('nn',$nn);
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
    public function destroy($id,Request $request)
    {
        $name=$request->get('name');
        Reservation::destroy($id);
        return redirect('reservations')->with( ['name' => $name] );
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
    $pp =  "";
    $nn =  "";
    $cost =  "";
    $endwaysp = DB::table('carride_tbls')
                        ->where('endways', $endways)
                        ->distinct()->get(['endways']);
    return view('reserve')->with('source',$sourcep)
                          ->with('endways',$endwaysp)
                          ->with('carride_tbls',$carride_tbls)
                          ->with('cost',$cost)
                          ->with('pp',$pp)
                          ->with('nn',$nn)
                          ->with('twoway');
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
    $pp =  "";
    $nn =  "";
    $cost =  "";
    return view('reserve')->with('source',$sourcep)
                          ->with('endways',$endwaysp)
                          ->with('carride_tbls',$carride_tbls)
                          ->with('cost',$cost)
                          ->with('pp',$pp)
                          ->with('nn',$nn)
                          ->with('twoway');
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
    $pp =  "";
    $nn =  "";
    $cost =  "";
    return view('reserve')->with('source',$sourcep)
                          ->with('endways',$endwaysp)
                          ->with('carride_tbls',$carride_tbls)
                          ->with('cost',$cost)
                          ->with('pp',$pp)
                          ->with('nn',$nn)
                          ->with('twoway');
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
    $pp =  "";
    $nn =  "";
    $cost =  "";
    return view('reserve')->with('source',$sourcep)
                          ->with('endways',$endwaysp)
                          ->with('carride_tbls',$carride_tbls)
                          ->with('cost',$cost)
                          ->with('pp',$pp)
                          ->with('nn',$nn)
                          ->with('twoway');
   }
   public function ticket(Request $request)    {


        $total = 0;
        if($request->get('name')!=null)
        { $name=$request->get('name');
          $reservations = Reservation::where('name',$request->get('name'))->get();
        }
        else
        {
          $name=null;
          $reservations = Reservation::where('id',Auth::user()->id)->get();
        }
        $cart = array();
        foreach ($reservations as $item) {
          $total+=DB::table('points')->where('id_point',$item->id_point)->get()[0]->cost;

          
        }
        // $cart = DB::table('points')->where('id_point',Auth::user()->id)->get();

        // foreach ($cart as $item) {
        //   $total += DB::table('points')->where('id_point',$item->id_point)->value('cost');
          
        // }
        return view('ticket')->with('reservations',$reservations)
                             ->with('total',$total)
                             ->with('name',$name);
    }
    public function anony_reserve(){
    $carride_tbls = DB::table('carride_tbls')->orderBy('carrid_id', 'desc')->paginate(25);
    $source = DB::table('carride_tbls')->distinct()->get(['source']);
    $endways = DB::table('carride_tbls')->distinct()->get(['endways']);
    $pp =  "";
    $nn =  "";
    $cost =  "";
    
      $carride_tbls->setPath('carride_tbls');
    return view('anony_reserve')->with('carride_tbls',$carride_tbls)
                          ->with('source',$source)
                          ->with('endways',$endways)
                          ->with('cost',$cost)
                          ->with('pp',$pp)
                          ->with('nn',$nn)
                          ->with('twoway',false);
   }

   
}


