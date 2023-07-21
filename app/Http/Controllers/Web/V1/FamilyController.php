<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Familly\StoreRequest;
use App\Responses\FamillyResponse;
use App\Responses\ServerResponse;
use App\Services\Web\FamilyService;
use Illuminate\Http\Request;
use function App\Helpers\error;
use function App\Helpers\success;

class FamilyController extends Controller
{
    protected FamilyService  $familyService;
    public  function __construct(FamilyService $familyService)
    {
        $this->familyService = $familyService;
    }

    public  function index(Request $request){
        return view('features.V1.family.index');
    }
    public  function create(Request $request){
        $familly    = $this->familyService->getFamily($request);
        return view('features.V1.family.create',compact('familly'));
    }
    public  function edit(Request $request){
        $familly    = $this->familyService->getFamily($request);
        $data = $this->familyService->show($request->id);
        return view('features.V1.family.update',compact('familly','data'));
    }
    public  function destroy(Request $request,$id){
        $data = $this->familyService->destroy($id);
        return redirect()->back()->with('danger' ,'Data Berhasil Dihapus');
    }

    public  function store(StoreRequest $request)
    {
        $store =$this->familyService->store($request->all());
        if($store){
            return success(FamillyResponse::SUCCESS_RESPONSE);
        }else{
            return  error(ServerResponse::INTERNAL_SERVER_ERROR);
        }
    }
    public  function update(StoreRequest $request){
        $data=$request->only('parent_id','name','gender');
        $store =$this->familyService->update($request->id,$data);
        return success(FamillyResponse::SUCCESS_RESPONSE);
    }

    public  function data(Request $request){
        $data = $this->familyService->getFamily($request);
        return datatables()->of($data)
            ->rawColumns(['parent_id', 'last_name', 'email',  'action'])
            ->editColumn('parent',function ($data){
                return $data->parent->name ?? Null;
            })
            ->addColumn('action', 'features.V1.family.action')
            ->addIndexColumn()
            ->toJson();
    }
    public  function tree(Request $request){
        return view('features.V1.family.tree');
    }
}
