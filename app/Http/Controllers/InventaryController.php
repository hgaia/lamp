<?php

namespace App\Http\Controllers;

use App\Models\inventary;
use App\Models\User;
use Illuminate\Http\Request;

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

        return $newEquipment;

    }
    public function update(Request $request, $id)
    {
        $equipment = inventary::find($id);
        
        $data = $request->all();
        $user = User::find($data['user_id']);
        if($user == null){
            return response(['Usuario nao encontrado'],400);
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
}
