<?php

namespace App\Imports;

use App\Invitaciones;
use Maatwebsite\Excel\Concerns\ToModel;

class InvitacionesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Invitaciones([
            'name' => $row[0],
            'email' => $row[1],
        ]);
    }
}
