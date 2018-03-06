<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Redirect;
use Auth;
use Validator;
use DB;
use Session;
use Input;
use App\Van_tbl;
use App\Carride_tbl;
use App\Reservation;
use App\Points;

class VanController extends Controller
{
    public function regis_van()
    {
        return view('regis_van');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function van(Request $request)
   {
        $data = new Van_tbl;
        $data->id_van = $request->get('id_van');
        $data->brand = $request->get('brand');
        $data->seat = $request->get('seat');
        $data->parking_box = $request->get('parking_box');
        $data->save();
        return Redirect::to('regis_van');
   }
  public function reserve_ticket(Request $request)
     {
          $tel=$request->get('tel');
          $name=$request->get('name');
          $pp = $request->get('pp');
          $nn = $request->get('nn');
          $cost = $request->get('cost');
          $datein = $request->get('datein');
          $dateout = $request->get('dateout');
          $source = $request->get('source');
         $endways = $request->get('endways');
         $time_out = $request->get('time_out');
         $id_van = DB::table('carride_tbls')->where('source',$source)
                                            ->Where('endways',$endways)
                                            ->Where('time_out',$time_out)->value('id_van');
         $carride_id=DB::table('carride_tbls')->where('source',$source)
                                            ->Where('endways',$endways)
                                            ->Where('time_out',$time_out)->value('carrid_id');
         if($request->get('book_below')=="true")
         {
           if(count(DB::table('reservations')->where('id_van',$id_van)->where('date',$dateout)->get())>0)
             $seat = DB::table('reservations')->where('id_van',$id_van)->where('date',$dateout)->get();
           else
             $seat=null;
         }
         else
         {
             if(count(DB::table('reservations')->where('id_van',$id_van)->where('date',$datein)->get())>0)
                 $seat = DB::table('reservations')->where('id_van',$id_van)->where('date',$datein)->get();
             else
                 $seat=null;
        }
         $carride_tbls = DB::table('carride_tbls')->orderBy('carrid_id', 'desc')->paginate(25);
         $carride = (Carride_tbl::find($carride_id));
         $van = (Van_tbl::find($carride->id_van));
         return view('reserve_ticket')->with('carride',$carride)
                                       ->with('carride_tbls',$carride_tbls)
                                       ->with('van',$van)
                                       ->with('pp',$pp)
                                       ->with('nn',$nn)
                                       ->with('cost',$cost)
                                       ->with('datein',$datein)
                                       ->with('dateout',$dateout)
                                       ->with('time_out',$time_out)
                                       ->with('id_van',$id_van)
                                       ->with('seat',$seat)
                                       ->with('twoways',$request->get('twoways'))
                                       ->with('book_above',$request->get('book_above'))
                                       ->with('book_below',$request->get('book_below'))
                                       ->with('name',$request->get('name'))
                                       ->with('tel',$request->get('tel'));
  
    }

    public function goback()
   {  
        
        return view('goback');

    }
    public function getreserve_ticket()
   {  

     $carride_tbls = DB::table('carride_tbls')->orderBy('carrid_id', 'desc')->paginate(25);
         $carride = DB::table('Carride_tbls')->where('carrid_id', 110)->get();
        $van = DB::table('Van_tbls')->where('id',2)->get();
        $pp =  "";
        $nn =  "";
        $cost =  "";
        
        return view('reserve_ticket')->with('carride',$carride[0])
                                      ->with('carride_tbls',$carride_tbls)
                                      ->with('van',$van[0])
                                      ->with('pp',$pp)
                                      ->with('nn',$nn)
                                      ->with('cost',$cost);

    }

      
   public function showvan(Request $request)
   {
      $van_tbls = DB::table('van_tbls')->orderBy('id', 'desc')->paginate(25);
      

      // $van_tbls->setPath('van_tbls');
        return View('regis_van')->with('van_tbls',$van_tbls);

    }
    public function update($id) {
            $van_tbls = Van_tbl::find($id);
            return view('edit_van')->with('van_tbls',$van_tbls);
        }

        public function updateAction(Request $request){
            $id_van = $request->id_van;
            $brand = $request->brand;
            $seat = $request->seat;
            $parking_box = $request->parking_box;

            $van = Van_tbl::find($request->id);
            $van->id_van = $id_van;
            $van->brand = $brand;
            $van->seat = $seat;
            $van->parking_box = $parking_box;
            $van->save();
            return redirect('/regis_van');
        }
    public function delete($id) {
            Van_tbl::destroy($id);
            return redirect('/regis_van');
        }

   public function serach(Request $request){
     $source = $request->get('source');
     $endways = $request->get('endways');
     $date = $request->get('date');
     

     $NUM_PAGE = 1000;
     $page = $request->input('page');
     $page = ($page !=null)?$page:1;
     $carride_tbls = DB::table('carride_tbls')->where('source', 'like',$source)
                                              ->where('endways', 'like',$endways)->paginate($NUM_PAGE);
      $source = DB::table('carride_tbls')->distinct()->get(['source']);
    $endways = DB::table('carride_tbls')->distinct()->get(['endways']);
     return view('main_1')->with('carride_tbls',$carride_tbls)
                          ->with('source',$source)
                          ->with('endways',$endways)
                          ->with('date',$date)
                          ->with('page',$page)
                          ->with('NUM_PAGE',$NUM_PAGE);

   }

   public function serach1(Request $request){
        $name=$request->get('name');
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

     $carride_tbls = DB::table('carride_tbls')->where('source', 'like',$source)
                                              ->where('endways', 'like',$endways)->get();
                                              
      $source = DB::table('carride_tbls')->distinct()->get(['source']);
    $endways = DB::table('carride_tbls')->distinct()->get(['endways']);
     return view('reserve_2')->with('carride_tbls',$carride_tbls)
                          ->with('source',$source)
                          ->with('endways',$endways)
                          ->with('date',$date)
                          ->with('cost',$cost)
                          ->with('pp',$pp)
                          ->with('nn',$nn)
                          ->with('datein',$datein)
                          ->with('dateout',$dateout)
                          ->with('name',$name)
                          ->with('tel',$tel);

   }
   public function reserve_2(){
    $carride_tbls = DB::table('carride_tbls')->orderBy('carrid_id', 'desc')->paginate(25);
    $source = DB::table('carride_tbls')->distinct()->get(['source']);
    $endways = DB::table('carride_tbls')->distinct()->get(['endways']);
    $pp =  "";
    $nn =  "";
    $cost =  "";
    
      $carride_tbls->setPath('carride_tbls');
    return view('reserve')->with('carride_tbls',$carride_tbls)
                          ->with('source',$source)
                          ->with('endways',$endways)
                          ->with('cost',$cost)
                          ->with('pp',$pp)
                          ->with('nn',$nn)
                          ->with('twoway',false);
   }
   public function reserve_3(Request $request){
    $pp = $request->get('psource');
      $nn = $request->get('pendway');
       $name=$request->get('name');
      $cost = DB::table('points')->where('psource','like','%'.$pp.'%')
                                 ->where('pendway','like','%'.$nn.'%')
                                 ->value('cost');
     $datein = $request->get('datein');
     $dateout = $request->get('dateout');
     $source = $request->get('source');
     $endways = $request->get('endways');
     $date = $request->get('date');

     $carride_tbls = DB::table('carride_tbls')->where('source', 'like',$source)
                                              ->where('endways', 'like',$endways)->get();
    $carride_tbls2 = DB::table('carride_tbls')->where('source', 'like',$endways)
                                              ->where('endways', 'like',$source)->get();
                                              
      $source = DB::table('carride_tbls')->distinct()->get(['source']);
    $endways = DB::table('carride_tbls')->distinct()->get(['endways']);

     return view('reserve_3')->with('carride_tbls',$carride_tbls)
                          ->with('carride_tbls2',$carride_tbls2)
                          ->with('source',$source)
                          ->with('endways',$endways)
                          ->with('date',$date)
                          ->with('cost',$cost)
                          ->with('pp',$pp)
                          ->with('nn',$nn)
                          ->with('datein',$datein)
                          ->with('dateout',$dateout)
                          ->with('book_above',"false")
                          ->with('book_below',"false")
                          ->with('name',$name);
   }

   public function main(Request $request){
    $NUM_PAGE = 10;
    $carride_tbls = Carride_tbl::paginate($NUM_PAGE);
    $page = $request->input('page');
    $page = ($page !=null)?$page:1;


    $source = DB::table('carride_tbls')->distinct()->get(['source']);
    $endways = DB::table('carride_tbls')->distinct()->get(['endways']);
    
    return view('main')->with('carride_tbls',$carride_tbls)
                          ->with('source',$source)
                          ->with('endways',$endways)
                          ->with('page',$page)
                          ->with('NUM_PAGE',$NUM_PAGE);
   }

   public function main_1(Request $request){
    // $carride_tbls = DB::table('carride_tbls')->orderBy('carrid_id', 'desc')->paginate(10);

    $NUM_PAGE = 10;
    $carride_tbls = Carride_tbl::paginate($NUM_PAGE);
    $page = $request->input('page');
    $page = ($page !=null)?$page:1;


    $source = DB::table('carride_tbls')->distinct()->get(['source']);
    $endways = DB::table('carride_tbls')->distinct()->get(['endways']);
    
    return view('main_1')->with('carride_tbls',$carride_tbls)
                          ->with('source',$source)
                          ->with('endways',$endways)
                          ->with('page',$page)
                          ->with('NUM_PAGE',$NUM_PAGE);
   }

   public function main_admin(Request $request){
    $NUM_PAGE = 10;
    $carride_tbls = Carride_tbl::paginate($NUM_PAGE);
    $page = $request->input('page');
    $page = ($page !=null)?$page:1;


    $source = DB::table('carride_tbls')->distinct()->get(['source']);
    $endways = DB::table('carride_tbls')->distinct()->get(['endways']);
    
    return view('main_1')->with('carride_tbls',$carride_tbls)
                          ->with('source',$source)
                          ->with('endways',$endways)
                          ->with('page',$page)
                          ->with('NUM_PAGE',$NUM_PAGE);
   }
   public function twoway()
   {

      $carride_tbls = DB::table('carride_tbls')->orderBy('carrid_id', 'desc')->paginate(25);
      $source = DB::table('carride_tbls')->distinct()->get(['source']);
      $endways = DB::table('carride_tbls')->distinct()->get(['endways']);
      $pp =  "";
      $nn =  "";
      $cost =  "";
    
      $carride_tbls->setPath('carride_tbls');
      return view('reserve')->with('delete',1)
                            ->with('carride_tbls',$carride_tbls)
                            ->with('source',$source)
                            ->with('endways',$endways)
                            ->with('cost',$cost)
                            ->with('pp',$pp)
                            ->with('nn',$nn)
                            ->with('twoway',true);
   }

   public function bookcar(Request $request)
   {
    

      if($request->get('book_below')=="true")
       {
      $checktime = DB::table('reservations')   ->where('date',$request->dateout)
                                                 ->where('time_out',$request->time_out)
                                                 ->where('seat',$request->checkbox)->get();
      }
      else
      {
         $checktime = DB::table('reservations')   ->where('date',$request->datein)
                                                 ->where('time_out',$request->time_out)
                                                 ->where('seat',$request->checkbox)->get();
      }
        
      $twoways=$request->get('twoways');
     if(count($checktime)==0)
        {

            $tel = $request->get('tel');
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
            $points = DB::table('points')->where('psource',$pp)->where('pendway',$nn)->value('id_point');
           
            $num = $request->get('num'); 

          for($i=0;$i<count($checkbox);$i++)
          {
            $data = new Reservation;
            $data->id_van = $id_van;
            $data->tel = $tel;
            $data->carrid_id = $carride_id;
            if($request->get('book_below')=="true")
               $data->date = $dateout;
             else
              $data->date = $datein;
            $data->id = $id;
            $data->time_out = $time_out;
            $data->id_point = $points;
            $data->seat = $checkbox[$i];
            $data->name = $name;
            $data->save();
          } 
          if($twoways=="false")
            return redirect('reservations')->with( ['name' => $name] );
          else if($request->get('book_above')=="true"&&$request->get('book_below')=="true")
          {
            return redirect('reservations')->with( ['name' => $name] );
          }
          else
          {

             $cost = DB::table('points')->where('psource','like','%'.$pp.'%')
                                 ->where('pendway','like','%'.$nn.'%')
                                 ->value('cost');
           
            $source = $request->get('source');
            $endways = $request->get('endways');
            $carride_tbls = DB::table('carride_tbls')->where('source', 'like',$source)
                                              ->where('endways', 'like',$endways)->get();
             $carride_tbls2 = DB::table('carride_tbls')->where('source', 'like',$endways)
                                              ->where('endways', 'like',$source)->get();
                                              
            return view('reserve_3')->with('carride_tbls',$carride_tbls)
                            ->with('carride_tbls2',$carride_tbls2)
                            ->with('source',$source)
                            ->with('endways',$endways)
                            ->with('cost',$cost)
                            ->with('pp',$pp)
                            ->with('nn',$nn)
                            ->with('datein',$datein)
                            ->with('dateout',$dateout)
                            ->with('twoways',$twoways)
                            ->with('book_above',$request->get('book_above'))
                            ->with('book_below',$request->get('book_below'))
                            ->with('name',$request->get('name'))
                            ->with('tel',$request->get('tel'));
          }
        
        }
       else
        {  
          $datein = $request->get('datein');
            $carride = (Carride_tbl::find($request->carrid_id));
            $van = (Van_tbl::find($carride->id_van));
            $pp = "";
            $nn = "";
            $seat= null;
            $time_out = $request->get('time_out');
            return view('reserve_ticket')->with('errors','วันที่ '.$request->datein.' เวลา '.$request->time_out.' มีคนจองแล้วค่ะ '. 'กรุณากรอกข้อมูลใหม่')
                                         ->with('carride',$carride)
                                         ->with('van',$van)
                                         ->with('datein',$datein)
                                         ->with('pp',$pp)
                                         ->with('seat',$seat)
                                         ->with('time_out',$time_out)
                                         ->with('nn',$nn)
                                         ->with('twoway',$twoways);;

        }


}
}