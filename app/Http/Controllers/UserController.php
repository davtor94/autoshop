<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\User;

use Illuminate\Http\Request;
use App\Models\Tip;
use App\Models\Ad;
use App\Models\Appoinment;
use App\Models\Vehicle;
class UserController extends Controller
{
    public function _construct(){
        $this->middleware('auth');
    }
    //
    public function index($guard = null){

        if (Auth::guard($guard)->check()) {
            $tips = Tip::all()->sortByDesc('created_at');;
            $ads = Ad::all()->sortByDesc('created_at');
            // dd($tips);
            if(Auth::id()== 1){
                return view('admin.index',compact('tips','ads'));
            }else{
                return view('users.index',compact('tips','ads'));
            }


        }
        return redirect('/login');
        //return $next($request);

    }
    public function store(){
    $data = request()->all();
    User::create([
       'name' =>  $data['name'],
        'password' =>  $data['password'],
        'email' =>  $data['email'],
        'phone' =>  $data['phone']
    ]);
    return redirect(url('/index'));
    }

    public function createAppoinment(){
        $data = request()->all();
        $user_id = Auth::id();
        Appoinment::create([
            'vehicle_id'=>$data['vehicle_id'],
            'descripcion'=> $data['descripcion'],
            'fecha' => $data['fecha'],
            'hora' => $data['hora'],
            'user_id' => $user_id
         ]);
         return redirect(url('/citas'));
    }
    public function createVehicle(){
        $data = request()->all();
        $user_id = Auth::id();
        Vehicle::create([
            'placas'=>$data['placas'],
            'marca'=> $data['marca'],
            'submarca' => $data['submarca'],
            'modelo' => $data['modelo'],
            'color' => $data['color'],
            'user_id' => $user_id
        ]);
        return redirect(url('/vehicles'));
    }

    public function citas($guard = null){
        if (Auth::guard($guard)->check()) {
            $now = new \DateTime();
            $fechaActual = $now->format('Y-m-d');
            if (Auth::id() == 1){
                $appoinments =  Appoinment::where('fecha','>',$fechaActual)->orderBy('fecha', 'asc')->get();
                $user_id = Auth::id();
                $vehicles = Vehicle::all();
                return view('admin.citas',compact('appoinments','vehicles'));
            }else{
                $match = ['user_id' => Auth::id()];
                $appoinments =  Appoinment::where('fecha','>',$fechaActual)->where($match)->orderBy('fecha', 'asc')->get();
                $user_id = Auth::id();
                $vehicles = Vehicle::where(['user_id'=> $user_id])->get();
                return view('users.citas',compact('appoinments','vehicles'));
            }

        }
        return redirect('/login');
        //return $next($request);
    }
    public function vehicles(){
        $user_id = Auth::id();
        if (Auth::id() == 1){
            $vehicles = Vehicle::all();
            $users = User::all();
            return view('admin.vehicles',compact('vehicles','users'));
        }else{
            $vehicles = Vehicle::where(['user_id'=> $user_id])->get();
            return view('users.vehicles',compact('vehicles'));
        }

    }
    public function historial($guard = null){
        if (Auth::guard($guard)->check()) {
            $now = new \DateTime();
            $fechaActual = $now->format('Y-m-d');
            if (Auth::id() == 1){
                $appoinments =  Appoinment::where('fecha','<',$fechaActual)->orderBy('fecha', 'desc')->get();
                $vehicles = Vehicle::all();
                return view('admin.historial',compact('appoinments','vehicles'));
            }
            $match = ['user_id' => Auth::id()];
            $appoinments =  Appoinment::where('fecha','<',$fechaActual)->where($match)->orderBy('fecha', 'desc')->get();
            $user_id = Auth::id();
            $vehicles = Vehicle::where(['user_id'=> $user_id])->get();
            return view('users.historial',compact('appoinments','vehicles'));
        }
        return redirect('/login');
        //return $next($request);
    }

    public function contacto(){

        return view('users.contacto');
    }
}
