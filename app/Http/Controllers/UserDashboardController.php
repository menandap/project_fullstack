<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use App\Models\Undangan;
use App\Models\Event;
use App\Models\Transaction;
use Auth;

class UserDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function undangan(){
        $users = Auth::user()->id;
        $undangans = Undangan::where('id_user',$users)->paginate(5);
        Paginator::useBootstrap();

        // return $users;

        return view('dashboard-usr.undanganlist', compact('undangans'));
    }

    public function undangan_show($id){
        $undangan = Undangan::where('id', '=', $id)->first();
        // $image = DB::table('products')
        //     ->join('product_images', 'products.id', '=', 'product_images.product_id')
        //     ->select('product_images.*')
        //     ->where($where)->get();
        // return $undangans;
        return view('dashboard-usr.undangandetail', compact('undangan'));
    }

    public function undangan_create(){
        // $undangan = Undangan::all();
        return view('dashboard-usr.undanganadd');
    }

    public function undangan_store(Request $request){
        $undangan = $request->all();
        Undangan::create($undangan);

        // if($request->file('files')){
        //     $files = [];
        //     foreach($request->file('files') as $file){
        //         if($file->isValid()){
        //             $nama_image = time()."_".$file->getClientOriginalName();
        //             Storage::putFileAs('public', $file, $nama_image);
        //             $files[] = [
        //                 'product_id' => $id,
        //                 'image_name' => 'storage/' . $nama_image,
        //             ];
        //         }
        //     }
        //     Product_images::insert($files);
        // }

        return Redirect::to('/myundangan')->with(['success' => 'Berhasil menambahkan undangan']);
    }

    public function undangan_edit($id){
        $undangan = Undangan::find($id);
        return view('dashboard-usr.undanganedit', compact('undangan'));
    }

    public function undangan_update(Request $request, $id, Undangan $undangan){

        $data = $request->all();
        $undangan = Undangan::find($id);
        $undangan->fill($data)->save();

        return Redirect::to('/myundangan')->with(['success' => 'Berhasil mengedit undangan']);
    }

    public function undangan_delete($id){
        Undangan::where('id',$id)->delete();
        // Product_images::where('product_id',$id)->delete();
        // Product::where('id', $id)->delete();

        return Redirect::to('/myundangan')->with(['error' => 'Berhasil menghapus undangan']);
    }

    public function event(){
        $users = Auth::user()->id;
        $events = DB::table('events')
        ->join('undangans', 'events.id_undangan', '=', 'undangans.id')
        ->join('users', 'users.id', '=', 'undangans.id_user')
        ->select('events.id', 'events.id_undangan', 'events.title','events.date', 'events.date_start', 'events.date_end', 'events.location', 'events.desc')
        ->where('users.id', '=', $users)->paginate(5);

        Paginator::useBootstrap();

        // return $events;

        return view('dashboard-usr.eventlist', compact('events'));
    }

    public function event_show($id){
        $events = Event::where('id', '=', $id)->first();
        return view('dashboard-usr.eventdetail', compact('events'));
    }

    public function event_create(){
        $users = Auth::user()->id;
        $undangan = Undangan::where('id_user', '=', $users)->get();
        return view('dashboard-usr.eventadd', compact('undangan'));
    }

    public function event_store(Request $request){
        $event = $request->all();
        Event::create($event);

        return Redirect::to('/myevent')->with(['success' => 'Berhasil menambahkan event']);
    }

    public function event_edit($id){
        $users = Auth::user()->id;
        $event = Event::find($id);
        $undangan = Undangan::where('id_user', '=', $users)->get();
        $undangan_select = DB::table('events')
        ->join('undangans', 'events.id_undangan', '=', 'undangans.id')
        ->select('undangans.id', 'undangans.title')
        ->where('events.id', '=', $id)->first();
        // $undangan_select = Undangan::where('id_undangan', $id)->first();
        // $users;
        return view('dashboard-usr.eventedit', compact('event', 'undangan', 'undangan_select'));
    }

    public function event_update(Request $request, $id, Event $event){

        $data = $request->all();
        $event = Event::find($id);
        $event->fill($data)->save();

        return Redirect::to('/myevent')->with(['success' => 'Berhasil mengedit undangan']);
    }

    public function event_delete($id){
        Event::where('id',$id)->delete();

        return Redirect::to('/myevent')->with(['error' => 'Berhasil menghapus event']);
    }

    public function transaction(){
        $users = Auth::user()->id;
        // $users = Auth::guard('users')->user()->id;
        // $transactions = Transaction::where('id_user',$users)->paginate(5);
        // Paginator::useBootstrap();

        $transactions = DB::table('trx')
        ->join('undangans', 'trx.id_undangan', '=', 'undangans.id')
        ->join('users', 'users.id', '=', 'undangans.id_user')
        ->select('trx.id', 'trx.id_undangan', 'trx.keyword', 'trx.date_start', 'trx.date_end', 'undangans.title')
        ->where('users.id', '=', $users)->paginate(5);

        return view('dashboard-usr.transactionlist', compact('transactions'));
    }

    public function see_undangan($id){
        // $users = Auth::user()->id;
        $undangan = Undangan::where('id', '=', $id)->first();
        $event = Event::where('id_undangan', '=', $id)->get();
        // $events = DB::table('events')
        // ->join('undangans', 'events.id_undangan', '=', 'undangans.id')
        // ->select('events.id', 'events.id_undangan', 'events.title', 'events.date_start', 'events.date_end', 'events.location', 'events.desc')
        // ->where('undangans.id', '=', $id)->get();
        // return $event; 
        // return $undangan;

        return view('undangan.template_ananda', compact('undangan','event'));
    }
}
