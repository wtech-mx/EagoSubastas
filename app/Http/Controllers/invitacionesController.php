<?php

namespace App\Http\Controllers;

use App\Invitaciones;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use App\Imports\InvitacionesImport;


class invitacionesController extends Controller
{
    public function importExcel(Request $request)
    {
        $auction_id = $request->get('auction_id');
//        dd($auction_id);

//        $auction_id->save();

        $file = $request->file('file');
        Excel::import(new InvitacionesImport, $file,$auction_id);

        return back()->with('message',' Importacion de datos completada');
    }
}
