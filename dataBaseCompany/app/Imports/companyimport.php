<?php

namespace App\Imports;

use App\Models\company;
use Maatwebsite\Excel\Concerns\ToModel;

class companyimport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new company([
            'name'=>$row[0],
            'email'=>$row[1],
            'website'=>$row[2],
        ]);
    }
}
