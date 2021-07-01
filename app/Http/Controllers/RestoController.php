<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Restaus;

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
        return $req->input();
    }
}

