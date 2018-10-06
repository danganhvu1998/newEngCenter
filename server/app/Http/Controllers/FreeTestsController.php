<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FreeTest;
use App\Register;

class FreeTestsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function showingSite($page){
        if($page<1) {
			return redirect('ADMIN/freetest/1');
        }
        $tests = FreeTest::orderBy('score', 'desc')
			->skip(($page-1)*10)
			->take(10)
			->get();
		if(count($tests)==0 and $page!=1){
			$pageNum = FreeTest::count();
			$pageNum = intval(($pageNum-1)/10)+1;
			return redirect('ADMIN/freetest/'.strval($pageNum));
		}
		$data = array(
			'tests' => $tests,
			'pageNum' => $page
		);
        return view("testCtrl.show")->with($data);
    }
    
    public function scoring(request $request){
        $id = $request->testID;
        $score = $request->score;
        $note = $request->note;
        FreeTest::where('id', $id)
			->update([
                'score' => (int)$score,
                'note' => $note
            ]);

        $test = FreeTest::where('id', $id)->first();
        if( $test->subject =="speaking" or $test->subject =="writing"){
            $register = new Register;
            $register->name = $test->name;
            $register->phone = $test->phone;
            $register->email = "No Information";
            $register->mess = "Auto message from Test Result. Subject = ".$test->subject."; Score is ".$score."; With note: ".$note;
            $register->status = 0;
            $register->save();
        }
        return redirect('ADMIN/freetest/1');
    }
}
