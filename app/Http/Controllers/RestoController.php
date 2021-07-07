<?php
/**
 * @file.
 *  Common controller for all actions.
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Restaus;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Session;

/**
 * Undocumented class RestoController extends Controller.
 */
class RestoController extends Controller
{
    /**
     * Undocumented function index
     *
     * @param Request $req
     * @return mixed
     */
    public function index(Request $req)
    {
        $reqq = Http::get('http://mypizza.dd:8083/api/pizzas?_format=hal_json');
        $data =  $reqq->json();



        return view('home', ['data' => $data]);
    }

    /**
     * Undocumented function list().
     *  Displays all the restaurents in the database.
     *
     * @return mixed
     */
    public function list()
    {
        $data =  Restaus::all();
        return view('list', ['data' => $data]);
    }

    /**
     * Undocumented function add()
     *  A new restaurent is added to database Restaus
     *
     * @param Request $req
     * @return mixed
     */
    public function add(Request $req)
    {
       // return $req->input();

        $restau = new Restaus;
        $restau->name = $req->input('name');
        $restau->email = $req->input('email');
        $restau->address = $req->input('address');
        $restau->save();
        $req->session()->flash('status', 'Restaurent entered successfully');
        return redirect('list');
    }
/**
 * Undocumented function delete()
 *  A record of restaurent with given id is deleted from database.
 *
 * @param integer $id
 * @return void
 */
    public function delete($id)
    {
        Restaus::find($id)->delete();
        Session::flash('status', 'Restaurent has been deleted successfully');
        return redirect('list');
    }
    /**
     * Undocumented function edit()
     *  To find the restaurent of given id and return the edit page with data.
     * @param integer $id
     * @return mixed
     */
    public function edit($id)
    {
        $data = Restaus::find($id);
        return view('edit', ['data' => $data]);
    }
    /**
     * Undocumented function update()
     *  Update the restaurent details.
     * @param Request $req
     * @return void
     */
    public function update(Request $req)
    {

        $restau = Restaus::find($req->id);
        $restau->name = $req->input('name');
        $restau->email = $req->input('email');
        $restau->address = $req->input('address');
        $restau->save();
        $req->session()->flash('status', 'Restaurent updated successfully');
        return redirect('list');
    }
    /**
     * Undocumented function register()
     *  Create a new user details with name, email, contact info and crypted password.
     *  Save it the user table in database.
     *
     * @param Request $req
     * @return void
     */
    public function register(Request $req)
    {

        $users = new User;
        $users->name = $req->input('name');
        $users->email = $req->input('email');
        $users->password =Crypt::encrypt($req->input('password'));
        $users->contact = $req->input('contact');
        $users->save();
        $req->session()->flash('status', 'User registered successfully');
        return redirect('login');
    }
    /**
     * Undocumented function login()
     *  Decrypt the password and verify with existing record in user table.
     *  Save user name in the session.
     *
     * @param Request $req
     * @return void
     */
    public function login(Request $req)
    {
        $user =  User::where('email', $req->input('email'))->get();

        if (Crypt::decrypt($user[0]->password) == $req->input('password')) {
            $req->session()->put('user', $user[0]->Name);
            return redirect('/');
        } else {
            return view('loginresponse', ['user' => $user]);
        }
    }
    /**
     * Undocumented function logout()
     *  Deleted the user data from the session and redirect to login
     *
     * @return void
     */
    public function logout()
    {
        Session::forget('user');
        return redirect('login');
    }
}
