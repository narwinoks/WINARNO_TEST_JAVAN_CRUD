<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Family;
use Illuminate\Http\Request;

class TreeController extends Controller
{
    public  function index(Request $request){
        // Mendapatkan data keluarga dari database
        $familyDataFromDB = Family::all();
        $familyTree = $this->buildFamilyTree($familyDataFromDB);

        // Mengirimkan respons JSON
        return response()->json($familyTree);

    }
    // Fungsi untuk menyusun data keluarga menjadi struktur tree
    private function buildFamilyTree($familyData, $parentId = null)
    {
        $tree = [];
        foreach ($familyData as $member) {
            if ($member->parent_id === $parentId) {
                $children = $this->buildFamilyTree($familyData, $member->id);
                if (!empty($children)) {
                    $member->children = $children;
                }
                $tree[] = $member;
            }
        }
        return $tree;
    }
}
