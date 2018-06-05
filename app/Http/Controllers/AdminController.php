<?php

namespace App\Http\Controllers;
use App\Models\Tip;
use App\Models\Ad;
use App\User;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Appoinment;
use App\Models\Concept;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function deleteTip(Tip $tip){
        $tip->delete();
        return redirect(url('/index'));
    }
    public function deleteAd(Ad $ad){
        $ad->delete();
        return redirect(url('/index'));
    }
    public function cobrar(Request $request){
        $user = User::find($request['user_id']);
        $appointment = Appoinment::find($request['cita_id']);
        $concepts = Concept::where('appoinment_id', $appointment->id)->get();
        if (Auth::id() == 1){
            return view('admin.cobrar',compact('user','appointment','concepts'));
        }else{
            return view('users.factura',compact('user','appointment','concepts'));
        }


    }
    public function createTip(Request $request){
        $file = $request->file('image');
        $nombre = $file->getClientOriginalName();
        $destino = public_path().'/img/';
        $archivo = $file->move($destino,$nombre);
        $ruta = 'img/' . $archivo->getBasename();
        Tip::create([
            'title'=>$request['title'],
            'subtitle'=> $request['subtitle'],
            'content' => $request['content'],
            'image' => $ruta
        ]);
        return redirect(url('/index'));
    }
    public function createAd(Request $request){

        Ad::create([
            'title'=>$request['title'],
            'subtitle'=> $request['subtitle'],
            'content' => $request['content'],
            'price' =>  $request['price']
        ]);
        return redirect(url('/index'));
    }
    public function addConcept(Request $concept){
        Concept::create([
        'user_id' => $concept['user_id'],
        'appoinment_id' => $concept['appoinment_id'],
        'description' => $concept['description'],
        'price' => $concept['price']
        ]);
        return redirect(action('AdminController@cobrar',['user_id'=> $concept['user_id'],'cita_id'=> $concept['appoinment_id']]));
    }
    public function customers (){
        $users = User::all();
        return view('admin.customers',compact('users'));
    }
    public function createVehicle(){
        $data = request()->all();
        Vehicle::create([
            'placas'=>$data['placas'],
            'marca'=> $data['marca'],
            'submarca' => $data['submarca'],
            'modelo' => $data['modelo'],
            'color' => $data['color'],
            'user_id' => $data['user_id']
        ]);
        return redirect(url('/vehicles'));
    }
    public function respaldoPhp(){
        $dbhost = '127.0.0.1';
        $dbname = 'autoshop';
        $dbuser = 'root';
        $dbpass = '';
        $backup_file = $dbname . '_' . date("Y-m-d-H-i-s") . '.sql';
        $dbdir = '../storage/app/'. $backup_file;
        $command = "C:\UniServerZ\core\mysql\bin\mysqldump --user=$dbuser --password=$dbpass --host=$dbhost --databases autoshop > $dbdir";
        system($command,$output);
        //alert()->success('Notificación de Éxito.','El Backup se ha realizado correctamente')->autoclose(3000);
        return redirect()->back();
    }
    function human_filesize($bytes,$decimals=2){
        if($bytes < 1024){
            return $bytes . ' B';
        }

        $factor = floor(log($bytes,1024));

        return sprintf("%.{$decimals}f ",$bytes / pow(1024,$factor)) . ['B','KB','MB','GB','TB','PB'][$factor];
    }
    public function backup(){

        $backups = User::all();

        $disk = Storage::disk(config('C:\UniServerZ\www\autoshop\storage\app\public'));
        $files = $disk->files(config('C:\UniServerZ\www\autoshop\storage\app\public'));
        $backups = [];
        foreach ($files as $k => $f) {
            // only take the zip files into account
            if (substr($f, -4) == '.sql' && $disk->exists($f)) {
                $backups[] = [
                    'file_path' => $f,
                    'file_name' => str_replace(config('C:\UniServerZ\www\autoshop\storage\app\backups') . '/', '', $f),
                    'file_size' => $this->human_filesize($disk->size($f)),
                    'last_modified' => $disk->lastModified($f),
                ];
            }
        }
        // reverse the backups, so the newest one would be on top
        $backups = array_reverse($backups);
        return view("admin.backup")->with(compact('backups'));
    }

    public function download()
    {   $file_name = request();
        $file = config('C:\UniServerZ\www\autoshop\storage\app\backups') . '/' . $file_name;
        $disk = Storage::disk(config('C:\UniServerZ\www\autoshop\storage\app\backups'));
        if ($disk->exists($file)) {
            $fs = Storage::disk(config('C:\UniServerZ\www\autoshop\storage\app\backups'))->getDriver();
            $stream = $fs->readStream($file);
            return \Response::stream(function () use ($stream) {
                fpassthru($stream);
            }, 200, [
                "Content-Length" => $fs->getSize($file),
                "Content-disposition" => "attachment; filename=\"" . basename($file) . "\"",
            ]);
        } else {
            abort(404, "The backup file doesn't exist.");
        }
    }

}
