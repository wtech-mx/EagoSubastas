<?php

namespace App\Http\Controllers;

use App\Invitaciones;
use DB;
use Session;
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
//        $auction_id = $request->get('auction_id');
//        dd($auction_id);

//        $auction_id->save();

        $file = $request->file('file');
        Excel::import(new InvitacionesImport, $file);


        return back()->with('message',' Importacion de datos completada');
    }

    public function destroy($id)
    {
      $invitacion = Invitaciones::findOrFail($id);
      $invitacion->delete();
  
      return back()->with('message',' Eliminacion de dato completada');
    }

     /**
     * Delete all selected invitacion at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {

        if (!checkRole(getUserGrade(1)))
        {
            prepareBlockUserMessage();
            return back();
        }


         $invitacion = Invitaciones::where('id',$request->id)->first();

        if ($isValid = $this->isValidRecord($invitacion)) {

            $response['status']  = 0;
            $response['message'] = getPhrase('record_not_found');
            return json_encode($response);
        }


        if ($redirect = $this->check_isdemo()) {
            
            $response['status']  = 0;
            $response['message'] = getPhrase('crud_operations_disabled_in_demo');
            return json_encode($response);
        }



        if ($request->id) {

            try {
                  if(!env('DEMO_MODE')) {
                     
                    $entries = Invitaciones::where('id', $request->id)->get();

                        foreach ($entries as $entry) {
                            $entry->delete();
                        }

                  }
                $response['status'] = 1;
                $response['message'] = getPhrase('record_deleted_successfully');

            }
            catch ( \Illuminate\Database\QueryException $e) {

                   $response['status'] = 0;
                   if(getSetting('show_foreign_key_constraint','module'))
                    $response['message'] =  $e->errorInfo;
                   else
                    $response['message'] =  getPhrase('record_not_deleted');
            }  

            
        } else {

            $response['status'] = 0;
            $response['message'] = getPhrase('invalid_operation');
        }

        return json_encode($response);
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
