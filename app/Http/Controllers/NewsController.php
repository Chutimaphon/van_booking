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
   public function news(Request $request)
   {
        $data = new News_tbl;
        $data->name = $request->get('name');
        $data->details = $request->get('details');
        /*$data->description = $request->get('description');*/
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
  public function update($id_news) {
            $news_tbls = News_tbl::find($id_news);
            return view('edit_news')->with('news_tbls',$news_tbls);
        }

        public function updateAction(Request $request){
            $name = $request->name;
            $details = $request->details;


            $news = News_tbl::find($request->id_news);
            $news->name = $name;
            $news->details = $details;
            $news->save();

            return redirect('/regis_news');
        }
    public function delete($id_news) {
            News_tbl::destroy($id_news);
            return redirect('/regis_news');
        }
}
