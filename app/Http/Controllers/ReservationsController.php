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
use App\Deposits_reserve;
use DateTime;

class ReservationsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index(Request $request)    {
        $NUM_PAGE = 10;
        $page = $request->input('page');
        $page = ($page !=null)?$page:1;
        if(!Auth::check())
          { 
            $anony=true;
          $name=Session::get('name');
          if(Session::get('name')!=null)
            $reservations = Reservation::where('name',Session::get('name'))->orderBy('updated_at','desc')->paginate($NUM_PAGE);
          else
            $reservations=null;
        }
        elseif(Auth::check()&&Auth::user()->id==1){
          $anony=false;
          $name=DB::table('users')->where('id',Auth::user()->id)->value('fname');
          $reservations = Reservation::orderBy('updated_at','desc')->paginate($NUM_PAGE);
        }
        else{
          $anony=false;
          $name=DB::table('users')->where('id',Auth::user()->id)->value('fname');
          $reservations = Reservation::where('id',Auth::user()->id)->orderBy('updated_at','desc')->paginate($NUM_PAGE);
        }
        // dd($reservatisons);
        return view('reserve_1')->with('reservations',$reservations)
                                ->with('name',$name)
                                ->with('anony',$anony)
                                ->with('page',$page)
                                ->with('NUM_PAGE',$NUM_PAGE);
    }

    // public function index1(Request $request) {
    //       $NUM_PAGE = 10;
    //       $page = $request->input('page');
    //       $page = ($page !=null)?$page:1;
    //       $reservat = Reservation::where('id',Auth::user()->id)->orderBy('updated_at','desc')->paginate($NUM_PAGE);

    //       return view('reserve_1')->with('reservat',$reservat)
    //                               ->with('page',$page)
    //                               ->with('NUM_PAGE',$NUM_PAGE);
    // }

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

     public function message(Request $request)    {


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
        return view('message')->with('reservations',$reservations)
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

   public function success(){
    return view('success');
   }

   public function mailsuccess(Request $request){
    // $carride_tbls = DB::table('carride_tbls')->orderBy('carrid_id', 'desc')->paginate(10);
    $NUM_PAGE = 10;
    $carride_tbls = Carride_tbl::paginate($NUM_PAGE);
    $page = $request->input('page');
    $page = ($page !=null)?$page:1;

    $source = DB::table('carride_tbls')->distinct()->orderBy('source','asc')->get(['source']);
    $endways = DB::table('carride_tbls')->distinct()->orderBy('source','asc')->get(['endways']);

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

    $user = Auth::user()->email;
    \Mail::send('message', array('name' =>  $name ,'total' => $total ,'reservations'=>$reservations), function($message) {
    $message->to( Auth::user()->email ,Auth::user()->fname )->subject('ระบบจองตั๋วรถตู้');
});
    
    return view('main_1')->with('carride_tbls',$carride_tbls)
                          ->with('source',$source)
                          ->with('endways',$endways)
                          ->with('page',$page)
                          ->with('NUM_PAGE',$NUM_PAGE);
   }

   public function deposit(){
    $carride_tbls = DB::table('carride_tbls')->orderBy('carrid_id', 'desc')->paginate(25);
    $source = DB::table('carride_tbls')->distinct()->get(['source']);
    $endways = DB::table('carride_tbls')->distinct()->get(['endways']);
    $pp =  "";
    $nn =  "";
    $cost =  "";
    
      $carride_tbls->setPath('carride_tbls');
    return view('deposit')->with('carride_tbls',$carride_tbls)
                          ->with('source',$source)
                          ->with('endways',$endways)
                          ->with('cost',$cost)
                          ->with('pp',$pp)
                          ->with('nn',$nn)
                          ->with('twoway',false);
   }
      public function depose(Request $request){
     $name=$request->get('name');
     $type=$request->get('type');
     $item_name=$request->get('item_name');
      $detail=$request->get('detail');
      $tel=$request->get('tel');
      $pp = $request->get('psource');
      $nn = $request->get('pendway');
      
      $cost = DB::table('points')->where('psource','like','%'.$pp.'%')
                                 ->where('pendway','like','%'.$nn.'%')
                                 ->value('cost');
     $datein = $request->get('datein');
     $dateout = $request->get('dateout');
     $source = $request->get('source');
     $endways = $request->get('endways');
     $date = $request->get('date');
     $amount = $request->get('amount');
     $carride_tbls = DB::table('carride_tbls')->where('source', 'like',$source)
                                              ->where('endways', 'like',$endways)->get();
                                              
    $source = DB::table('carride_tbls')->distinct()->get(['source']);
    $endways = DB::table('carride_tbls')->distinct()->get(['endways']);
    $timezone = new DateTime('Asia/Bangkok');
    $timezone_date = $timezone->format('Y-m-d');
    $date_tz = strtotime($timezone_date);
    $date_rs = strtotime($datein);
    if($date_rs < $date_tz){
        return back()->with('errors','พ้นช่วงเวลานั้นมาแล้ว ขณะนี้วันที่'.' '.$timezone_date);       
    }

     return view('reserve_deposit')->with('carride_tbls',$carride_tbls)
                          ->with('source',$source)
                          ->with('endways',$endways)
                          ->with('date',$date)
                          ->with('cost',$cost)
                          ->with('pp',$pp)
                          ->with('nn',$nn)
                          ->with('datein',$datein)
                          ->with('dateout',$dateout)
                          ->with('name',$name)
                          ->with('type',$type)
                          ->with('detail',$detail)
                          ->with('item_name',$item_name)
                          ->with('tel',$tel)
                          ->with('amount',$amount);

   }
     public function reserve_deposit(Request $request)
     {

          $tel = $request->get('tel');
          $type=$request->get('type');
          $item_name=$request->get('item_name');
          $detail=$request->get('detail');
            $name = $request->get('name');
            $pp = $request->get('pp');
            $nn = $request->get('nn');
            $carride_id = $request->get('carrid_id');
            $id_van = $request->get('id_van');
            $id = $request->get('id');
            $checkbox = $request->get('checkbox');
            $datein = $request->get('datein');
            $dateout = $request->get('dateout');
            $time_out = $request->get('time_out');
            $amount = $request->get('amount');
            

            $points = DB::table('points')->where('psource',$pp)->where('pendway',$nn)->value('id_point');

            if($type=="1")
              $price=100 *$amount;
            else if($type=="2")
               $price=150 *$amount;
             else if($type=="3")
               $price=200*$amount;
             else if($type=="4")
               $price=250*$amount;
             else if($type=="5")
               $price=300*$amount;
           DB::table('deposits_reserves')->insert(['name'=>$item_name,
                                            'detail'=>$detail,
                                            'type'=>$type,
                                            'price'=>$price,
                                            'id_point'=>$points,
                                            'carrid_id'=>$carride_id,
                                            'time_out'=>$time_out,
                                            'date'=>$datein,
                                            'amount'=>$amount]);
          
        return redirect('/reservations_deposit');
    }
    public function receipts(Request $request)
     {
        $date =DB::table('reservations')->orderBy('date')->select('date')->distinct()->get();
        $total_data =array();
        $total_month = 0;
        $total_income=0;
        //จองรถ
        foreach($date as $d)
        {
          if($total_month==0)
          {
            $curr_month= substr($d->date, 0,7);
            $income=0;
          }
          else if($curr_month!=substr($d->date, 0,7))
          {
            array_push($total_data,array("income"=>$income,
                        "date"=> $curr_month));
            $curr_month= substr($d->date, 0,7);
            $income=0;
            
          }
          $all_point = DB::table('reservations')->where('date','like',$d->date.'%')->get();
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
          
          if(count($data_each)>0)
          {
            foreach ($data_each as $data) {
              $total_month+=$data->cost;
              $income+=$data->cost;
            }
          }    
        }
        array_push($total_data,array("income"=>$income,
                        "date"=> $curr_month));
        $total_income+=$total_month;
        //ส่งของ
        $total_data_depos =array();
         $total_month = 0;
        $date =DB::table('deposits_reserves')->orderBy('date')->select('date')->distinct()->get();
        foreach($date as $d)
        {
          if($total_month==0)
          {
            $curr_month= substr($d->date, 0,7);
            $income=0;
          }
          else if($curr_month!=substr($d->date, 0,7))
          {
            array_push($total_data_depos,array("income"=>$income,
                        "date"=> $curr_month));
            $curr_month= substr($d->date, 0,7);
            $income=0;
            
          }
          $all_point = DB::table('deposits_reserves')->where('date','like',$d->date.'%')->get();
          if(count($all_point)>0)
          {
            foreach ($all_point as $data) {
              $total_month+=$data->price;
              $income+=$data->price;
            }
          }    
                  }
        $total_income+=$total_month;
        array_push($total_data_depos,array("income"=>$income,
                        "date"=> $curr_month));

        return view('receipts')->with('total_data',$total_data)
                                ->with('total_data_depos',$total_data_depos)
                                ->with('total_income',$total_income);
    }
    public function reservations_deposit(Request $request)    {
        $NUM_PAGE = 7;
        $page = $request->input('page');
        $name=DB::table('users')->where('id',Auth::user()->id)->value('fname');
        $reservations =DB::table('deposits_reserves')->orderBy('id','asc')->paginate($NUM_PAGE);
      
        return view('reservation_deposit')->with('reservations',$reservations)
                                ->with('page',$page)
                                ->with('NUM_PAGE',$NUM_PAGE);
    }
    public function update_status(Request $request)
    {   
        $id = $request->get('id');

        $status = Deposits_reserve::findOrFail($id);
        // dd($status);
        $status->status = "receive";
        $status->save();
        return back();
    }
    public function delete(Request $request)
    {
        $id = $request->get('id'); 
        $status = Deposits_reserve::findOrFail($id)->delete();
        return back();

    }
    
}


