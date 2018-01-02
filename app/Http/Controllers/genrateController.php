<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tcnmaster;
use App\tcnrequest;
use App\benefitgeneration;
use Carbon;
use App\benefitdeclaration;
use Excel;

class genrateController extends Controller
{
    public function tcn()
    {
        $tcnmaster = tcnmaster::all();
        $now = Carbon::now();
        $month = $now->format('m');
        $year = $now->format('Y');
        $month = Carbon::createFromDate(null, $month, '15');
        $month->subMonths(2)->toDateString();

//        \DB::enableQueryLog();
        $tcnrequest = tcnrequest::where('status','=','Approved')
            ->whereMonth('approvalDate','=',$month)
            ->whereYear('approvalDate','=',$year)->get();
//        dd(\DB::getQueryLog());

        return view('admin.benefit.generate1',compact('tcnmaster','tcnrequest'));
    }

     public function tobe(Request $request)
    {
        $benefitdeclarations =benefitdeclaration::where('tcnType',$request->tcnType)->get();
       
//        dd(\DB::getQueryLog());
            $output = '';
        foreach ($benefitdeclarations as $benefit) {
        	$date = Carbon::createFromDate($benefit->year,$benefit->month,'15');
        	$output .= '<div class="col-md-3 sticky2 animated zoomIn" id="generatediv'.$benefit->id.'" style="display: block;">
   <img style="float: right" src="https://png.icons8.com/pin/office/30" title="Pin" width="20" height="20">
   <h4 class="font-bold m-t-none m-b"><bold>'.$benefit->tcnmaster->tcnType.'</bold> - '.$date->format('F').' '.$date->format('Y').'</h4>
   <div class="">
    <p style="text-transform: uppercase;">Benefit Declared</p>
      <div class=""><span>INR: '.$benefit->INR.'</span></div>
      <div class=""><span>AED: '.$benefit->AED.'</span></div>
      <div class=""><span>SAR: '.$benefit->SAR.'</span></div>
      <div class=""><span>CAD: '.$benefit->CAD.'</span></div>
      <div class=""><span>USD: '.$benefit->USD.'</span></div>
      <div class=""><span>Benefit to: </span><br><span>Locking period: </span></div>
      <br>
      <form method="post">
      '.csrf_field().'
      <input type="hidden" name="type" value="'.$benefit->tcnType.'">
      <input type="hidden" name="month" value="'.$date->format('F Y').'">
      <button type="submit" class="btn btn-success">Generate</a>
      </form>
   </div>
</div>

';
        }

        return $output;
    }


    public function store(Request $request)
    {


        $tcndetails = tcnmaster::where('id',$request->type)->first();
        $locking = $tcndetails->lockingDuration;
        $tcnid= $tcndetails->id;
        $month = $request->month;
        $month1 = new Carbon($month);
        $month2 = new Carbon($month);
        $month2->addDays('14');
        $month2->subMonths($locking);
        $from = $month2->startOfMonth();
        $to = new Carbon($month2);
        $to->endOfMonth();
//         echo $month.'--<br>'.$from.'<br>'.$to;

        //Select user with year and month , User active, No withdrawal request for Tcn

        $tcns = tcnrequest::with('member')->where([['tcn_id',$tcnid],['status','Approved']])->whereBetween('depositeDate',[$from,$to])->get();
        return $count = count($tcns);

        //Check user recived benefit

        //Calculate benefit

        //Store in DB

        //Add user into benefit list

       

        $checkgeneration = benefitgeneration::where([['year',$month1->format('Y')],['month',$month1->format('m')],['tcnType',$tcnid]])->first();
        $count = count($checkgeneration);
        if($count==1){
            return 'benefit generated already';
        }
 // \DB::enableQueryLog();
        $tcns = tcnrequest::with('member')->where([['tcn_id',$tcnid],['status','Approved']])->whereBetween('depositeDate',[$from,$to])->get();
        $count = count($tcns);
  // dd(\DB::getQueryLog());
        $i=0;

        while ($i<$count){

            $benefit = new benefitgeneration;
            $benefit->userId = $tcns[$i]->userId;
            $benefit->userName = $tcns[$i]->member->name;
            $benefit->tcnType =  $tcns[$i]->tcn->id;
            $benefit->currencyType = $ctype = $tcns[$i]->currencyType;
            $benefit->unit = $tcns[$i]->unit;
            $benefit->amount = $tcns[$i]->amount;
            $benefit->year = $month1->format('Y');
            $benefit->month = $month1->format('m');
            $share = benefitdeclaration::where([['year',$month1->format('Y')],['month',$month1->format('m')],['tcnType',$tcns[$i]->tcn->id]])->first();
            $benefit->profit = $share->$ctype;
            $benefit->memberFee = ($tcns[$i]->unit)*50;
            $benefit->total = ($share->$ctype)*($tcns[$i]->unit)-(($tcns[$i]->unit)*50);
            $benefit->bankAccountId = $tcns[$i]->benefitId;
            $benefit->benefitType = 'NORMAL';
            $benefit->save();
            $i++;
        }

        $declared = benefitdeclaration::where([['year',$month1->format('Y')],['month',$month1->format('m')],['tcnType',$tcnid]])->first();
        $declared->status = '2';
        $declared->save();


        return $count;
    }



}
