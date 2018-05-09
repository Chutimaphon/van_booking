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
use App\Carride_tbl;
use App\Van_tbl;
use App\Points;
use App\Pointticket;

class CarrideController extends Controller
{
    public function regis_carride()
    {
        return view('regis_carride');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function carride(Request $request)
   {
        $data = new Carride_tbl;
        $data->carrid_id = $request->get('carride_id');
        $data->source = $request->get('source');
        $data->endways = $request->get('endways');
        $data->time_out = $request->get('time_out');
        $data->id_van = 4;
        /*$data->description = $request->get('description');*/
        $data->save();
        return Redirect::to('regis_carride');
   }


   public function showcarrid()
   {
      $carride_tbls = DB::table('carride_tbls')->orderBy('carrid_id', 'desc')->paginate(25);

        return View('regis_carride')->with('carride_tbls',$carride_tbls);
    }
   
     public function update($carrid_id) {
            $carride_tbls = Carride_tbl::find($carrid_id);
            return view('edit_carride')->with('carride_tbls',$carride_tbls);
        }

        public function updateAction(Request $request){
            $source = $request->source;
            $endways = $request->endways;
            $time_out = $request->time_out;

            $carride = Carride_tbl::find($request->carrid_id);
            $carride->source = $source;
            $carride->endways = $endways;
            $carride->time_out = $time_out;
            $carride->save();

            return redirect('/regis_carride');
        }
    public function delete($carrid_id) {
            Carride_tbl::destroy($carrid_id);
            return redirect('/regis_carride');
        }

    public function regis_point()
    {
        return view('regis_point');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function point(Request $request)
   {
        $data = new Points;
        $data->id_point = $request->get('id_point');
        $data->psource = $request->get('psource');
        $data->pendway = $request->get('pendway');
        $data->cost = $request->get('cost');
        /*$data->description = $request->get('description');*/
        $data->save();
        return Redirect::to('regis_point');
   }


   public function showpoint()
   {
      $points = DB::table('points')->orderBy('id_point', 'desc')->paginate(25);

        return View('regis_point')->with('points',$points);
    }
   
     public function updatepoint($id_point) {
            $points = Points::find($id_point);  
            return view('edit_point')->with('points',$points);
        }

        public function updateActiona(Request $request){
            $psource = $request->psource;
            $pendway = $request->pendway;
            $cost = $request->cost;

            $point = Points::find($request->id_point);
            $point->psource = $psource;
            $point->pendway = $pendway;
            $point->cost = $cost;
            $point->save();

             return Redirect::to('regis_point');
        }
    public function deletepoint($id_point) {
            Points::destroy($id_point);
            return Redirect::to('regis_point');
        }

    public function regis_pointticket()
    {
        return view('regis_pointticket');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function pointticket(Request $request)
   {
        $data = new Pointticket;
        $data->id = $request->get('id');
        $data->topic = $request->get('topic');
        $data->name = $request->get('name');
        $data->address = $request->get('address');
        $data->details = $request->get('details');
        $data->map = $request->get('map');
        /*$data->description = $request->get('description');*/
        $data->save();
        return Redirect::to('regis_pointticket');
   }


   public function showpointticket()
   {
      $pointticket = DB::table('pointtickets')->orderBy('id', 'desc')->paginate(25);

        return View('regis_pointticket')->with('pointticket',$pointticket);
    }
   
     public function updatepointticket($id) {
            $pointticket = Pointticket::find($id);  
            return view('edit_pointticket')->with('pointticket',$pointticket);
        }

        public function updateActionpointticket(Request $request){
            $topic = $request->topic;
            $name = $request->name;
            $address = $request->address;
            $details = $request->details;
            $map = $request->map;

            $pointticket = Pointticket::find($request->id);
            $pointticket->topic = $topic;
            $pointticket->name = $name;
            $pointticket->address = $address;
            $pointticket->details = $details;
            $pointticket->map = $map;
            $pointticket->save();

             return Redirect::to('regis_pointticket');
        }
    public function deletepointticket($id) {
            Pointticket::destroy($id);
            return Redirect::to('regis_pointticket');
        }
    public function show($id)
    {
        $pointticket = Pointticket::findOrFail($id);   
        return view('phuket')->with('pointticket',$pointticket);
    }
}
