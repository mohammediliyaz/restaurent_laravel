<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Restaus;
use App\Models\Users;
use Illuminate\Support\Facades\Crypt;
use Session;

class RestoController extends Controller
{
    public function index(Request $req){
        $reqq = Http::get('http://mypizza.dd:8083/api/pizzas?_format=hal_json');
        $data =  $reqq->json();


       return view('home',['data' => $data]);
    }

    public function list(){
        $data =  Restaus::all();
        return view('list',['data' => $data]);
     }

    public function add(Request $req){
       // return $req->input();

       $restau = new Restaus;
       $restau->name = $req->input('name');
       $restau->email = $req->input('email');
       $restau->address = $req->input('address');
       $restau->save();
       $req->session()->flash('status','Restaurent entered successfully');
       return redirect('list');
    }

    public function delete($id){
        Restaus::find($id)->delete();
      //  Session::flash('status','Restaurent has been deleted successfully');
        return redirect('list');
    }

    public function edit($id){
        $data = Restaus::find($id);
        return view('edit',['data' => $data]);
    }
    public function update(Request $req){

        $restau = Restaus::find($req->id);
        $restau->name = $req->input('name');
        $restau->email = $req->input('email');
        $restau->address = $req->input('address');
        $restau->save();
        $req->session()->flash('status','Restaurent updated successfully');
        return redirect('list');
    }
    public function register(Request $req){

        $users = new Users;
        $users->name = $req->input('name');
        $users->email = $req->input('email');
        $users->password =Crypt::encrypt($req->input('password'));
        $users->contact = $req->input('contact');
        $users->save();
        $req->session()->flash('status','User registered successfully');
        return redirect('login');
    }
    public function login(Request $req){
        $user =  Users::where('email',$req->input('email'))->get();

        if(Crypt::decrypt($user[0]->password) == $req->input('password')){
            $req->session()->put('user',$user[0]->name);
            return redirect('/');
        }

    }

    public function logout(){
        Session::forget('user');
        return redirect('login');
    }
}

