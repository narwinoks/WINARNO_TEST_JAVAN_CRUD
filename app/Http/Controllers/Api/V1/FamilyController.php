<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Familly\StoreRequest;
use App\Http\Resources\Familly\FamillyCollection;
use App\Http\Resources\Familly\FamillyResource;
use App\Responses\FamillyResponse;
use App\Services\Api\FamilyService;
use Illuminate\Http\Request;
use function App\Helpers\success;

class FamilyController extends Controller
{
    protected FamilyService $familyService;
    public function __construct(FamilyService $familyService)
    {
        $this->familyService = $familyService;
    }

    public  function index(Request $request)
    {
        $familly         =  $this->familyService->getAllData($request);
        $famillyResource    = new FamillyCollection($familly);
        $famillyTransform   = json_decode($famillyResource->toResponse($request)->getContent(), true);
        return success(FamillyResponse::FAMILLY_SUCCESS, $famillyTransform, 200);
    }
    public  function show($id,Request $request)
    {
        $familly            =  $this->familyService->showData($id);
        $famillyResource    = new FamillyResource( $familly);
        $famillyTransform   = json_decode($famillyResource->toResponse($request)->getContent(), true);
        return success(FamillyResponse::FAMILLY_SUCCESS, $famillyTransform , 200);
    }

    public  function store(StoreRequest  $request){
        $data               =$request->only('name' ,'parent_id','gender');
        $familly            =  $this->familyService->store($data);
        $famillyResource    = new FamillyResource($familly);
        $famillyTransform   = json_decode($famillyResource->toResponse($request)->getContent(), true);
        return success(FamillyResponse::FAMILLY_SUCCESS,   $famillyTransform, 201);
    }
    public  function update(StoreRequest $request,$id){
        $data               =$request->only('name' ,'parent_id','gender');
        $courier            =  $this->familyService->update($id,$data);
        $courierResource    = new FamillyResource($courier);
        $courierTransform   = json_decode($courierResource->toResponse($request)->getContent(), true);
        return success(FamillyResponse::FAMILLY_SUCCESS, $courierTransform, 200);
    }

    public  function delete($id ,Request $request){
        $familly = $this->familyService->destroy($id);
        return success(FamillyResponse::FAMILLY_SUCCESS,[], 200);
    }
}
