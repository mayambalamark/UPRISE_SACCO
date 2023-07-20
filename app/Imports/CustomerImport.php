<?php

namespace App\Imports;

use App\Models\customer;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CustomerImport implements ToCollection,WithHeadingRow,WithValidation
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            $data=[
                'ID'=>$row['ID'],
                'name'=>$row['name'],
                'Gender'=>$row['Gender'],
                'email'=>$row['E-mail'],
                'Gender'=>$row['Gender'],
                'NIN'=>$row['NIN'],
                'Gender'=>$row['Gender'],
                'Points'=>$row['Points'],
                'Amount'=>$row['Amount'],
                'Location'=>$row['Location'],
            ];
            customer::create($data);
        }
    }
    public function rules(): array
    {
        return [
            'id'=>'required',
            'Name'=>'required',
            
            'email'=>'required|unique:customers,email',
            
            'NIN'=>'required',
            'Gender'=>'required',
            'Points'=>'required',
            'Amount'=>'required',
            'Location' =>'required'
        ];
    }
}
 