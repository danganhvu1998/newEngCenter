<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\File;

class FilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showingSite($page){
        if($page<1) {
            return redirect('ADMIN/file/store/1');
        }
        $files = File::orderBy('updated_at','desc')
			->skip(($page-1)*20)
			->take(20)
            ->get();
        if(count($files)==0 and $page!=1){
            return redirect('ADMIN/file/store/'.strval(intval((File::count()-1)/20+1)));
        }
        $data = array(
            'files' => $files,
            'pageNum' => $page
        );
        return view('fileCtrl.show')->with($data);
    }

    public function storing(request $request){
        $this->validate($request, [
            'file' => 'required|max:1999'
        ]);

        $filenameWithExt = $request->file('file')->getClientOriginalName();
        if($request->type == 0){
            $fileNameToStore= time()."_".$filenameWithExt;
        } else {
            $fileNameToStore = $filenameWithExt;
        }
        $path = $request->file('file')->storeAs('public/file', $fileNameToStore);
        $file = new File;
        $file->file_url = $fileNameToStore;
        $file->save();
        return redirect('/ADMIN/file/store/1');
    }

    public function deleting($fileID){
        $file = File::where('id', $fileID)->first();
        if($file == null){
            return redirect('files/store/1');
        }
        Storage::delete('public/file/'.$file->file_url);
        File::where('id', $fileID)->delete();
        return redirect('/ADMIN/file/store/1');
    }
}
