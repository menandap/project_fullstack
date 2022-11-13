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
use App\Models\Story;
use App\Models\Image;
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
        $where = array('undangans.id' => $id);
        $undangan = Undangan::where('id', '=', $id)->first();
        $image = DB::table('undangans')
            ->join('images', 'undangans.id', '=', 'images.id_undangan')
            ->select('images.*')
            ->where($where)->get();
        // return $undangans;
        return view('dashboard-usr.undangandetail', compact('undangan','image'));
    }

    public function undangan_create(){
        // $undangan = Undangan::all();
        return view('dashboard-usr.undanganadd');
    }

    public function undangan_store(Request $request){
        // $request->validate([
        //     'title'  => 'required',
        //     'featured_image' => 'required',
        //     'person_1_name' => 'required',
        //     'person_2_name' => 'required',
        //     'person_2_image' => 'required',
        //     'desc_person_1' => 'required',
        //     'desc_person_2' => 'required',
        //     'desc_wedding'  => 'required',
        //     'wedding_date'  => 'required',
        //     'wedding_location'  => 'required'
        // ]);
        
        $image_person_1 = $request->file('person_1_image');
        $person_1 =  'person_1_image_' . time() . '.' . $image_person_1->getClientOriginalExtension();
        $path = public_path('/db');
        $image_person_1->move($path, $person_1);

        $image_person_2 = $request->file('person_2_image');
        $person_2 =  'person_2_image_' . time() . '.' . $image_person_2->getClientOriginalExtension();
        $path = public_path('/db');
        $image_person_2->move($path, $person_2);

        $image_cover = $request->file('featured_image');
        $cover =  'featured_image_' . time() . '.' . $image_cover->getClientOriginalExtension();
        $path = public_path('/db');
        $image_cover->move($path, $cover);

        Undangan::create([
            'id_user' => $request->id_user,
            'title'  => $request->title,
            'featured_image' => $cover,
            'person_1_name' => $request->person_1_name,
            'person_2_name' => $request->person_2_name,
            'person_1_image' => $person_1,
            'person_2_image' => $person_2,
            'desc_person_1' => $request->desc_person_1,
            'desc_person_2' => $request->desc_person_2,
            'desc_wedding' => $request->desc_wedding,
            'wedding_date'=> $request->wedding_date,
            'wedding_location' => $request->wedding_location
        ]);

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

        if($request->person_1_image){
            $image_person_1 = $request->file('person_1_image');
            $person_1 =  'person_1_image_' . time() . '.' . $image_person_1->getClientOriginalExtension();
            $path = public_path('/db');
            $image_person_1->move($path, $person_1);

            $image = [
                'person_1_image' => $person_1,
            ];
            Undangan::where('id',$id)->update($image);
        }

        if($request->person_2_image){
            $image_person_2 = $request->file('person_2_image');
            $person_2 =  'person_2_image_' . time() . '.' . $image_person_2->getClientOriginalExtension();
            $path = public_path('/db');
            $image_person_2->move($path, $person_2);

            $image = [
                'person_2_image' => $person_2,
            ];
            Undangan::where('id',$id)->update($image);
        }

        if($request->featured_image){
            $image_cover = $request->file('featured_image');
            $cover =  'featured_image_' . time() . '.' . $image_cover->getClientOriginalExtension();
            $path = public_path('/db');
            $image_cover->move($path, $cover);

            $image = [
                'featured_image' => $cover,
            ];
            Undangan::where('id',$id)->update($image);
        }
        
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

        return Redirect::to('/myevent')->with(['success' => 'Berhasil mengedit event']);
    }

    public function event_delete($id){
        Event::where('id',$id)->delete();

        return Redirect::to('/myevent')->with(['error' => 'Berhasil menghapus event']);
    }

    public function story(){
        $users = Auth::user()->id;
        $storys = DB::table('storys')
        ->join('undangans', 'storys.id_undangan', '=', 'undangans.id')
        ->join('users', 'users.id', '=', 'undangans.id_user')
        ->select('storys.id', 'storys.id_undangan', 'storys.title','storys.date', 'storys.images', 'storys.desc')
        ->where('users.id', '=', $users)->paginate(5);
        Paginator::useBootstrap();

        return view('dashboard-usr.storylist', compact('storys'));
    }

    public function story_show($id){
        $storys = Story::where('id', '=', $id)->first();
        return view('dashboard-usr.storydetail', compact('storys'));
    }

    public function story_create(){
        $users = Auth::user()->id;
        $undangan = Undangan::where('id_user', '=', $users)->get();
        return view('dashboard-usr.storyadd', compact('undangan'));
    }

    public function story_store(Request $request){
        $images = $request->file('images');
        $story =  'story_image_' . time() . '.' . $images->getClientOriginalExtension();
        $path = public_path('/db');
        $images->move($path, $story);

        Story::create([
            'id_undangan' => $request->id_undangan,
            'title'  => $request->title,
            'images' => $story,
            'date'=> $request->date,
            'desc' => $request->desc
        ]);

        return Redirect::to('/mystory')->with(['success' => 'Berhasil menambahkan story']);
    }

    public function story_edit($id){
        $users = Auth::user()->id;
        $story = Story::find($id);
        $undangan = Undangan::where('id_user', '=', $users)->get();
        $undangan_select = DB::table('storys')
        ->join('undangans', 'storys.id_undangan', '=', 'undangans.id')
        ->select('undangans.id', 'undangans.title')
        ->where('storys.id', '=', $id)->first();
        // $undangan_select = Undangan::where('id_undangan', $id)->first();
        // $users;
        return view('dashboard-usr.storyedit', compact('story', 'undangan', 'undangan_select'));
    }

    public function story_update(Request $request, $id, Story $story){

        $data = $request->all();
        $story = Story::find($id);
        $story->fill($data)->save();

        if($request->images){
            $images = $request->file('images');
            $story =  'story_image_' . time() . '.' . $images->getClientOriginalExtension();
            $path = public_path('/db');
            $images->move($path, $story);    

            $image = [
                'images' => $story,
            ];
            Story::where('id',$id)->update($image);
        }

        return Redirect::to('/mystory')->with(['success' => 'Berhasil mengedit undangan']);
    }

    public function story_delete($id){
        Story::where('id',$id)->delete();

        return Redirect::to('/mystory')->with(['error' => 'Berhasil menghapus story']);
    }


    public function transaction(){
        $users = Auth::user()->id;
        // $users = Auth::guard('users')->user()->id;
        // $transactions = Transaction::where('id_user',$users)->paginate(5);
        // Paginator::useBootstrap();

        $transactions = DB::table('trx')
        ->join('undangans', 'trx.id_undangan', '=', 'undangans.id')
        ->join('users', 'users.id', '=', 'undangans.id_user')
        ->select('trx.id', 'trx.id_undangan', 'trx.status', 'trx.keyword', 'trx.date_start', 'trx.date_end', 'undangans.title')
        ->where('users.id', '=', $users)->paginate(5);

        return view('dashboard-usr.transactionlist', compact('transactions'));
    }

    public function transaction_show($id){
        $trx = Transaction::where('id', '=', $id)->first();
        return view('dashboard-usr.transactiondetail', compact('trx'));
    }

    public function transaction_create(){
        $users = Auth::user()->id;
        $undangan = Undangan::where('id_user', '=', $users)->get();
        return view('dashboard-usr.transactionadd', compact('undangan','users'));
    }

    public function transaction_store(Request $request){
        // $transaction = $request->all();
        $users = Auth::user()->id;
        Transaction::create([
            'id_user' => $users,
            'id_undangan' => $request->id_undangan,
            'status' => 1,
            'keyword' => $request->keyword,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
        ]);
        // Transaction::create($transaction);

        return Redirect::to('/mytransaction')->with(['success' => 'Berhasil menambahkan transaction']);
    }

    public function transaction_edit($id){
        $users = Auth::user()->id;
        $transaction = Transaction::find($id);
        $undangan = Undangan::where('id_user', '=', $users)->get();
        $undangan_select = DB::table('trx')
        ->join('undangans', 'trx.id_undangan', '=', 'undangans.id')
        ->select('undangans.id', 'undangans.title')
        ->where('trx.id', '=', $id)->first();
        
        return view('dashboard-usr.transactionedit', compact('transaction', 'undangan', 'undangan_select'));
    }

    public function transaction_update(Request $request, $id){
        $users = Auth::user()->id;
        $transaction= [
            'id_user' => $users,
            'id_undangan' => $request->id_undangan,
            'status' => 1,
            'keyword' => $request->keyword,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
        ];
        Transaction::where('id',$id)->update($transaction);

        return Redirect::to('/mytransaction')->with(['success' => 'Berhasil mengedit transaction']);
    }

    public function transaction_delete($id){
        Transaction::where('id',$id)->delete();

        return Redirect::to('/mytransaction')->with(['error' => 'Berhasil menghapus transaction']);
    }

    public function image_create($id){
        $undangan = Undangan::find($id);
        return view('dashboard-usr.imageadd', compact('undangan','id'));
    }

    public function image_store(Request $request, $id){
        // $this->validate($request, [
        //     'files.*' => 'required',
        // ]);   
        
        $images = $request->file('images');
        $undangan_img =  'undangan_image_' . time() . '.' . $images->getClientOriginalExtension();
        $path = public_path('/db');
        $images->move($path, $undangan_img);

        Image::create([
            'id_undangan' => $id,
            'images' => $undangan_img
        ]);
        
        return redirect()->route('undangandetail', $id); 
    }

    public function image_delete($id){
        $undangan_img = Image::find($id);
        $image_path = public_path('db').'/'.$undangan_img->images;
        unlink($image_path);
        $undangan_img->delete();

        // Image::where('id',$id)->delete();
        return redirect()->back(); 
    }

    public function see_undangan($id){
        // $users = Auth::user()->id;
        $undangan = Undangan::where('id', '=', $id)->first();
        $event = Event::where('id_undangan', '=', $id)->get();
        $story = Story::where('id_undangan', '=', $id)->get();
        $image = Image::where('id_undangan', '=', $id)->get();

        return view('undangan.template_ananda', compact('undangan','event','story','image'));
    }

    public function account(){
        $users = Auth::user()->id;
        $accounts = User::where('id', '=', $users)->first();

        return view('dashboard-usr.accountdetail', compact('accounts'));
    }
}
