<?php

namespace Database\Seeders;

use App\Models\Family;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $model = new Family();
        $model->parent_id =null;
        $model->name ="Budi";
        $model->gender="LAKI-LAKI";
        $model->save();

        $model = new Family();
        $model->parent_id =1;
        $model->name ="Dedi";
        $model->gender="LAKI-LAKI";
        $model->save();

        $model = new Family();
        $model->parent_id =1;
        $model->name ="Dodi";
        $model->gender="LAKI-LAKI";
        $model->save();

        $model = new Family();
        $model->parent_id =1;
        $model->name ="Dede";
        $model->gender="LAKI-LAKI";
        $model->save();

        $model = new Family();
        $model->parent_id =1;
        $model->name ="Dewi";
        $model->gender="PEREMPUAN";
        $model->save();

        $model = new Family();
        $model->parent_id =2;
        $model->name ="Feri";
        $model->gender="LAKI-LAKI";
        $model->save();

        $model = new Family();
        $model->parent_id =2;
        $model->name ="Farah";
        $model->gender="PEREMPUAN";
        $model->save();

        $model = new Family();
        $model->parent_id =3;
        $model->name ="GUGUS";
        $model->gender="LAKI-LAKI";
        $model->save();

        $model = new Family();
        $model->parent_id =3;
        $model->name ="CANDI";
        $model->gender="LAKI-LAKI";
        $model->save();

        $model = new Family();
        $model->parent_id =4;
        $model->name ="HANI";
        $model->gender="PEREMPUAN";
        $model->save();

        $model = new Family();
        $model->parent_id =4;
        $model->name ="HANA";
        $model->gender="PEREMPUAN";
        $model->save();
    }
}
