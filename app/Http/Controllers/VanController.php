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
        $data->cost = $request->get('cost');
     //   $data->status = $request->get('status');
        $data->parking_box = $request->get('parking_box');
        /*$data->description = $request->get('description');*/
        $data->save();
        return Redirect::to('regis_van');
   }
      public function reserve_ticket(Request $request)
   {

        $carride = (Carride_tbl::find($request->carrid_id));
        $van = (Van_tbl::find($carride->id_van));

        
        return view('reserve_ticket')->with('carride',$carride)
                                      ->with('van',$van);
   }
   public function showvan()
   {
      $van_tbls = DB::table('van_tbls')->orderBy('id', 'desc')->paginate(25);

      $van_tbls->setPath('van_tbls');
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
            $cost = $request->cost;
            $parking_box = $request->parking_box;

            $van = Van_tbl::find($request->id);
            $van->id_van = $id_van;
            $van->brand = $brand;
            $van->seat = $seat;
            $van->cost = $cost;
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

     $carride_tbls = DB::table('carride_tbls')->where('source', 'like',$source)
                                              ->where('endways', 'like',$endways)->get();
      $source = DB::table('carride_tbls')->distinct()->get(['source']);
    $endways = DB::table('carride_tbls')->distinct()->get(['endways']);
     return view('reserve')->with('carride_tbls',$carride_tbls)
                          ->with('source',$source)
                          ->with('endways',$endways)
                          ->with('date',$date);

   }
   public function reserve(){
    $carride_tbls = DB::table('carride_tbls')->orderBy('carrid_id', 'desc')->paginate(25);
    $source = DB::table('carride_tbls')->distinct()->get(['source']);
    $endways = DB::table('carride_tbls')->distinct()->get(['endways']);
    
      $carride_tbls->setPath('carride_tbls');
    return view('reserve')->with('carride_tbls',$carride_tbls)
                          ->with('source',$source)
                          ->with('endways',$endways);
   }

   public function main(){
    $carride_tbls = DB::table('carride_tbls')->orderBy('carrid_id', 'desc')->paginate(25);
    $source = DB::table('carride_tbls')->distinct()->get(['source']);
    $endways = DB::table('carride_tbls')->distinct()->get(['endways']);
    
      $carride_tbls->setPath('carride_tbls');
    return view('main')->with('carride_tbls',$carride_tbls)
                          ->with('source',$source)
                          ->with('endways',$endways);
   }

   public function main_1(){
    $carride_tbls = DB::table('carride_tbls')->orderBy('carrid_id', 'desc')->paginate(25);
    $source = DB::table('carride_tbls')->distinct()->get(['source']);
    $endways = DB::table('carride_tbls')->distinct()->get(['endways']);
    
      $carride_tbls->setPath('carride_tbls');
    return view('main_1')->with('carride_tbls',$carride_tbls)
                          ->with('source',$source)
                          ->with('endways',$endways);
   }

   public function main_admin(){
    $carride_tbls = DB::table('carride_tbls')->orderBy('carrid_id', 'desc')->paginate(25);
    $source = DB::table('carride_tbls')->distinct()->get(['source']);
    $endways = DB::table('carride_tbls')->distinct()->get(['endways']);
    
      $carride_tbls->setPath('carride_tbls');
    return view('main_admin')->with('carride_tbls',$carride_tbls)
                          ->with('source',$source)
                          ->with('endways',$endways);
   }

}
