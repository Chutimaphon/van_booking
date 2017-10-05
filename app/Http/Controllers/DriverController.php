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
use App\Driver_tbl;

class DriverController extends Controller
{
    public function regis_driver()
    {
        return view('regis_driver');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function driver(Request $request)
   {
        $data = new Driver_tbl;
        $data->fname = $request->get('fname');
        $data->lname = $request->get('lname');
        $data->address = $request->get('address');
        $data->tel = $request->get('tel');
        /*$data->description = $request->get('description');*/
        $data->save();
        return Redirect::to('regis_driver');
   }

   public function showdriver()
   {
      $driver_tbl = DB::table('driver_tbls')->orderBy('id_driver', 'desc')->paginate(25);

      $driver_tbl->setPath('driver_tbls');
        return View('regis_driver')->with('driver_tbl',$driver_tbl);
    }
  public function update($id_driver) {
            $driver_tbls = Driver_tbl::find($id_driver);
            return view('edit_driver')->with('driver_tbls',$driver_tbls);
        }

        public function updateAction(Request $request){
            $fname = $request->fname;
            $lname = $request->lname;
            $address = $request->address;
            $tel = $request->tel;


            $driver = Driver_tbl::find($request->id_driver);
            $driver->fname = $fname;
            $driver->lname = $lname;
            $driver->address = $address;
            $driver->tel = $tel;
            $driver->save();

            return redirect('/regis_driver');
        }
    public function delete($id_driver) {
            Driver_tbl::destroy($id_driver);
            return redirect('/regis_driver');
        }
}
