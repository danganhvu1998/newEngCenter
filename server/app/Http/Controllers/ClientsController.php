<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Register;

class ClientsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showingSite($page){
        if($page<1) {
			return redirect('ADMIN/client/1');
        }
        $clients = Register::orderBy('status')
			->skip(($page-1)*15)
			->take(15)
			->get();
		if(count($clients)==0 and $page!=1){
			$pageNum = Register::count();
			$pageNum = intval(($pageNum-1)/15)+1;
			return redirect('ADMIN/client/'.strval($pageNum));
		}
		$data = array(
			'clients' => $clients,
			'pageNum' => $page
		);
        return view("clientCtrl.show")->with($data);
    }

    public function resolving($registerID){
        $client = Register::where('id', $registerID)->first();
        if($client==null) return redirect('clients/1');
        register::where('id', $registerID)
			->update([
                'status' => 1-$client->status
            ]);
        return redirect('ADMIN/client/1');
    }
}
