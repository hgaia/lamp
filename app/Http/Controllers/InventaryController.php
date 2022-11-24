<?php

namespace App\Http\Controllers;

use App\Models\equipmentLog;
use App\Models\inventary;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class InventaryController extends Controller
{
    
    public function get()
    {

        $getInventary = inventary::all();
        return $getInventary;

    }
    public function create(Request $request)
    {
        $serial = $request->input('serial');
        $equipment = $request->input('equipment');
        $quantity = $request->input('quantity');
        $description = $request->input('description');
        $local = $request->input('local');
        $user_id = $request->input('user_id');
        
        $user = User::find($user_id);
        if($user == null){
            
            return response(['Usuario nao encontrado'],400);
        }
        
        $newEquipment = inventary::create([
            'serial'        =>      $serial,
            'equipment'     =>      $equipment,
            'quantity'      =>      $quantity,
            'description'   =>      $description,
            'local'         =>      $local,
            'user_id'       =>      $user_id,
        ]);

        $newLog = equipmentLog::create([
            'user_id'       =>  $user_id,
            'equipment_id'  =>  $newEquipment->id,
        ]);

        return $newEquipment;

    }
    public function update(Request $request, $id)
    {
        $equipment = inventary::find($id);
        
        $data = $request->all();
        $user_id = $request->input('user_id');
        $user = User::find($data['user_id']);
        if($user == null){
            return response(['Usuario nao encontrado'],400);
        }
        if($user_id != $equipment->user_id){
            $newLog = equipmentLog::create([
                'user_id'       =>  $user_id,
                'equipment_id'  =>  $equipment->id,
            ]);
        }   
        $equipment->update($data);
        return $equipment;
    }
    public function delete($id)
    {
        $equipment = inventary::find($id);
        $equipment->delete();
        $equipment = $equipment->id;
        return response()->json(['Ordem id: ' => $equipment, 'Status' => 'Deletado']);
    
    }
    public function getLog(){
        
        $getLog = equipmentLog::all();
        return $getLog;
    }
    public function search2(Request $request){
            $name = $request->input('name');
            $users = User::where('name',$name)->get();
            
            foreach($users  as $user ){
                $id = $user->id;
                $equipment = inventary::where('user_id',$id)->get();
                dd($equipment);
            }
    }
    public function search(){
       $user = User::find(1);
       $user_all = User::all();
       $listaUsuarios = User::where('id','>',1)->get();
       $primeiroUsuario = User::where('id','>',1)->first();
       $Usuario2 = User::where('id','>',1)->where('id','<',3)->get();
       $Usuario = User::where('id','>',1)->whereOr('id','<',3)->get();
        return $Usuario;
        dd($user);

    }
}
