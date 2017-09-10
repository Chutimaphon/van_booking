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

      $carride_tbls->setPath('carride_tbls');
        return View('regis_carride')->with('carride_tbls',$carride_tbls);
    }
}
