<?php

namespace App\Services\Web;

use App\Interface\V1\FamilyInterface;
use App\Responses\FamillyResponse;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Exceptions\HttpResponseException;
use function App\Helpers\error;


class FamilyService
{
    protected FamilyInterface $familyInterfaces;
    public function __construct(FamilyInterface $familyInterfaces)
    {
        $this->familyInterfaces = $familyInterfaces;
    }

    public  function getFamily($request){
        try {
          $data =$this->familyInterfaces->getAllDataFamily();
        }catch(Exception $exception){
            Log::error('WEB FAMILLY  GET : '.json_encode($exception->getMessage(),JSON_PRETTY_PRINT));
            return [];
        }
        return $data;
    }
    public  function store($data){
        try {
          $store = $this->familyInterfaces->store($data);
        }catch(Exception $exception){
            Log::error('WEB FAMILLY  STORE : '.json_encode($exception->getMessage(),JSON_PRETTY_PRINT));
            return [];
        }
        return  $store;
    }
    public  function show($id){
        try{
            $data =$this->familyInterfaces->show($id);
            if ($data == null){
                throw new HttpResponseException(error(FamillyResponse::FAMILLY_NOT_FOUND,404));
            }
        }catch (Exception $exception){
            Log::error('WEB FAMILLY SHOW : '.json_encode($exception->getMessage(),JSON_PRETTY_PRINT));
            throw new HttpResponseException(error(FamillyResponse::FAMILLY_NOT_FOUND,404));
        }
        return $data;
    }
    public  function update($id,$newData){
        try{
            $data =$this->familyInterfaces->show($id);
            if ($data == null){
                throw new HttpResponseException(error(FamillyResponse::FAMILLY_NOT_FOUND,404));
            }
            $updated =$this->familyInterfaces->update($data,$newData);
        }catch (Exception $exception){
            Log::error('WEB FAMILLY UPDATE : '.json_encode($exception->getMessage(),JSON_PRETTY_PRINT));
            throw new HttpResponseException(error(FamillyResponse::FAMILLY_NOT_FOUND,404));
        }
        return $updated;
    }

    public  function destroy($id){
        try {
            $data =$this->familyInterfaces->show($id);
            if ($data == null){
                throw new HttpResponseException(error(FamillyResponse::FAMILLY_NOT_FOUND,404));
            }
            $destroy =$this->familyInterfaces->delete($data);
        }catch (Exception $exception){
            Log::error('WEB FAMILLY DELETE : '.json_encode($exception->getMessage(),JSON_PRETTY_PRINT));
            throw new HttpResponseException(error(FamillyResponse::FAMILLY_NOT_FOUND,404));
        }
        return $destroy;
    }
}
