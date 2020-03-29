<?php

namespace App\Imports;

use App\Lead;
use Maatwebsite\Excel\Concerns\ToModel;

class LeadsImport implements ToModel
{
    use Maatwebsite\Excel\Concerns\WithStartRow;

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Check if duplicated
        $dup = Lead::where(function($query) use ($row){
            $query->where('mobile_1', $row[6]);
            $query->orWhere('mobile_1', $row[7]);
            $query->orWhere('mobile_2', $row[6]);
            $query->orWhere('mobile_2', $row[7]);
            $query->orWhere('email', $row[8]);
        })->where(function ($query){
            $query->where('mobile_1', '!=','');
            $query->where('mobile_2', '!=','');
            $query->where('email', '!=','');
        })->first();

        return new Lead([
            'company_name' => $row[0],
            'owner' => $row[1],
            'sub_type' => $row[2],
            'contact_engineer' => $row[3],
            'title' => $row[4],
            'class' => ($row[5] != '')? $row[5] : '',
            'mobile_1' => $row[6],
            'mobile_2' => $row[7],
            'email' => $row[8],
            'address' => $row[9],
            'tel' => $row[10],
            'notes' => $row[11],
            'status' => ($dup)? 3 : 1,
            'duplicated_with' => ($dup)? $dup->id : '',
            'user_id' => auth()->user()->id,
            'created_by' => auth()->user()->id,
        ]);
    }
}
