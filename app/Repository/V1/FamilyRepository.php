<?php

namespace App\Repository\V1;

use App\Interface\V1\FamilyInterface;
use App\Models\Family;

class FamilyRepository implements  FamilyInterface
{

    public function getAllDataFamily()
    {
         return Family::all();
    }
    public  function store($data){
        return Family::create($data);
    }

    public  function show($id){
        return Family::find($id);
    }
    public  function update($oldData,$newData){
        $oldData->update($newData);
        $oldData->refresh();
        return $oldData;
    }
    public  function delete($data){
        $data->delete();
        $data->refresh();
        return $data;
    }
    public  function getAllDataFamilyPaginate(){
        return Family::paginate(5);
    }
}
