<?php

namespace App\Http\Controllers;

use App\Invitaciones;
use DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\InvitacionesImport;


class InvitacionesController extends Controller
{
function index(){

        $dato = DB::TABLE('invitaciones')
        ->paginate('10');
        dd($dato);
    	return view('admin.auctions.show');
    }

    public function importExcel(Request $request)
    {
      $auction_id = $request->get('auction_id');
   //    dd($auction_id);

//dd($auction_id );

        $file = $request->file('file');
        Excel::import(new InvitacionesImport, $file, $auction_id);

        return back()->with('message',' Importacion de datos completada');
    }
}
