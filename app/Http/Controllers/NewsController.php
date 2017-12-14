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
use \Input as Input;
use App\News_tbl;

class NewsController extends Controller
{
    public function regis_news()
    {
        return view('regis_news');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function upload(Request $request)
   {
      if(Input::hasFile('file'))
      {
       $file = Input::file('file');
       $file->move('uploads', $file->getClientOriginalName());
       echo '';
       $data = new News_tbl;
       $data->name = $request->get('name');
       $data->details = $request->get('details');
       $data->picture = $file->getClientOriginalName();
       $data->save();
      }
      else
      {
       echo 'Can not Upload';
      }

        $data->save();
        return Redirect::to('regis_news');
   }

   public function newget(){
       $newgets = News_tbl::all();

        return view('news')->with('newgets',$newgets);
   }

   public function shownews()
   {
      $news_tbl = DB::table('news_tbls')->orderBy('id_news', 'desc')->paginate(25);

      $news_tbl->setPath('news_tbls');
        return View('regis_news')->with('news_tbls',$news_tbl);
    }

    public function delete($id_news) {
            News_tbl::destroy($id_news);
            return redirect('/regis_news');
        }
}
