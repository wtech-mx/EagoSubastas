<?php

namespace App\Http\Controllers;

use App\Invitaciones;
use DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\InvitacionesImport;

use App\Auction;

class InvitacionesController extends Controller
{
    function index($slug){
        if(!checkRole(getUserGrade(4)))
        {
            prepareBlockUserMessage();
            return back();
        }

        $data['title']        = getPhrase('edit');
        $data['active_class'] = 'auctions';

        $auction = Auction::getRecordWithSlug($slug);

        if ($isValid = $this->isValidRecord($auction))
             return redirect($isValid);


        $users = Auction::getSellerOptions();
        $data['users'] = $users;


        $data['record']   = $auction;

        $data['layout']   = getLayOut();
        
        $invitacion = DB::table('invitaciones')
                 //   ->where('auction_id',$auction->id)
                    ->get();
       // dd($invitacion);

        //$data['invitaciones'] = $invitacion;
        //dd($data);
       
        return view('admin.auctions.invitaciones', $data, compact('invitacion'));
        
    }

    public function importExcel(Request $request)
    {
        $saved_id = [];

        $auction_id = new Invitaciones;
        $auction_id->auction_id = $request->get('auction_id');
       // dd($auction_id);

        $file = $request->file('file');

        $invitacion = Excel::import(new InvitacionesImport, $file);

        $invitacion->auctions_id = $auction_id;
        //dd($invitacion);

        $invitacion = $file;
       // dd($invitacion);

        $invitacion->save();
        $saved_id[] = $invitacion->id;
      
      //  dd($file);

        return back()->with('message',' Importacion de datos completada');
    }


    public function isValidRecord($record)
    {
      if ($record === null) {
        flash('Ooops...!', getPhrase("page_not_found"), 'error');
        return $this->getRedirectUrl();
       }

       return FALSE;
    }
}
