<?php

namespace App\Services\Api;

use App\Interface\V1\FamilyInterface;
use App\Responses\FamillyResponse;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use function App\Helpers\error;


class FamilyService
{
    protected FamilyInterface $familyInterface;
    public  function __construct(FamilyInterface $familyInterface)
    {
        $this->familyInterface = $familyInterface;
    }

    public  function getAllData($request){
        try{
            $data =$this->familyInterface->getAllDataFamilyPaginate($request);
        }catch (Exception $exception){
            Log::error('API FAMILLY GET: '.json_encode($exception->getMessage(),JSON_PRETTY_PRINT));
            throw new HttpResponseException(error(FamillyResponse::FAMILLY_FAILED));
        }
        return $data;
    }

    public  function showData($id){
        try{
            $data =$this->familyInterface->show($id);
            if ($data == null){
                throw new HttpResponseException(error(FamillyResponse::FAMILLY_NOT_FOUND,404));
            }
        }catch (Exception $exception){
            Log::error('API FAMILLY SHOW : '.json_encode($exception->getMessage(),JSON_PRETTY_PRINT));
            throw new HttpResponseException(error(FamillyResponse::FAMILLY_FAILED,500));
        }
        return $data;
    }
    public  function store($data){
        try {
            $courier =$this->familyInterface->store($data);
        }catch (Exception $exception){
            Log::error('COURIER STORE : '.json_encode($exception->getMessage(),JSON_PRETTY_PRINT));
            throw new HttpResponseException(error(FamillyResponse::FAMILLY_FAILED));
        }
        return $courier;
    }
    public  function update($id,$newData){
        try{
            $data =$this->familyInterface->show($id);
            if ($data == null){
                throw new HttpResponseException(error(FamillyResponse::FAMILLY_FAILED,404));
            }
            $updated =$this->familyInterface->update($data,$newData);
        }catch (Exception $exception){
            Log::error('API FAMILLY UPDATE : '.json_encode($exception->getMessage(),JSON_PRETTY_PRINT));
            throw new HttpResponseException(error(FamillyResponse::FAMILLY_NOT_FOUND,404));
        }
        return $updated;
    }

    public  function destroy($id){
        try {
            $data =$this->familyInterface->show($id);
            if ($data == null){
                throw new HttpResponseException(error(FamillyResponse::FAMILLY_NOT_FOUND,404));
            }
            $destroy =$this->familyInterface->delete($data);
        }catch (Exception $exception){
            Log::error('COURIER DESTROY : '.json_encode($exception->getMessage(),JSON_PRETTY_PRINT));
            throw new HttpResponseException(error(FamillyResponse::FAMILLY_NOT_FOUND,404));
        }
        return $destroy;
    }


}
