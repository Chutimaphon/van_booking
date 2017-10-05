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
}
