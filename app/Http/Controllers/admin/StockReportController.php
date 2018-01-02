<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Purchase_order;
use App\Purchase_product;
use App\Sales_product;
use App\damagedproduct;
use App\Transfer_confirm_product;
use App\Unit;
use App\Brand;
use App\branch;
use Carbon\Carbon;
use Auth;
use DB;
use Excel;

class stockReportController extends Controller
{
    /********************GET BLADE PAGES FOR  REPORTS***************/


    public function show($report)
    {
        if( $report =='stockReport')
            return view('admin.report.stock_report');

        if( $report =='productwiseReport')
            return view('admin.report.product_wise_report');

        if( $report =='stockMovingReport')
            return view('admin.report.stock_moving_report');

        if( $report =='stockTransferReport')
            return view('admin.report.stock_transfer_report');
    }



    /********************LIST STOCK REPORTS***************/

    public function store(Request $request)
    {

        $fdate      =   $request->fdate;
        $tdate      =   $request->tdate;
        $branch     =   $request->branch;            

        /*****************Stock Report************/
        /****************************************/

        if( $request->report=='stockReport')
        return view('admin.report.stock_report',compact('fdate','tdate','branch'));


        /********Product wise Stock Report*******/
        /****************************************/

        if( $request->report    =='productwiseReport')
        {
        $productIds             =   $request->product;

        return view('admin.report.product_wise_report',compact('fdate','tdate','productIds','branch'));
        }

        /*************Stock Moving Report********/
        /****************************************/

        if( $request->report    =='stockMovingReport')
        return view('admin.report.stock_moving_report',compact('fdate','tdate','branch'));

        /*************Stock Transfer Report********/
        /****************************************/

        if( $request->report    =='stockTransferReport')
        return view('admin.report.stock_transfer_report',compact('fdate','tdate','branch'));



    }









    /********************PRINT AND EXCEL STOCK REPORTS***************/
    /*ALL PRINT & Excel REPORTS***********************************/


    public function update(Request $request,$id)
    {


        $fdate      =   $request->fdate;
        $tdate      =   $request->tdate;
        $branch     =   $request->branch; 

        $f_date     =   date('Y-m-d',strtotime($fdate));
        $t_date     =   date('Y-m-d',strtotime($tdate));

    //*************Print For All Type Stock reports***************
    //**********************************************************//

        if( $request->report    =='stockReport' && $request->print=='print')
        return view('admin.report.print_stock_report',compact('request','branch','fdate','tdate'));


        if( $request->report    =='productwiseReport' && $request->print=='print')
        {
        $productIds             =   $request->product;
        return view('admin.report.print_product_wise_report',compact('branch','fdate','productIds','tdate'));
        }


        if( $request->report    =='stockMovingReport' && $request->print=='print')
        return view('admin.report.print_stock_moving_report',compact('branch','fdate','tdate'));



        if( $request->report    =='stockTransferReport' && $request->print=='print')
        return view('admin.report.print_stock_transfer_report',compact('branch','fdate','tdate'));



    //*************Excel For All Type Stock reports***************
    //**********************************************************//

//EXCEL Stock Report all  
        if( $request->report    =='stockReport' && $request->print=='excel')
        {


        $address                = branch::find($branch);        

        $products               =Product::where('added_branch',$branch)->orderBy('id','ASC')->get();

        ob_end_clean();

        ob_start();

        $excelData=array();

            $i=1;
            foreach($products as $product)
            {


                $opening_product_qty  =   Purchase_product::where('product_id',$product->id)
                                        ->where('branch_id',$branch)
                                        ->whereDate('created_at','<',$f_date)
                                        ->sum('product_qty');

                $opening_sales_qty    =  Sales_product::where('product_id',$product->id)
                                        ->where('branch_id',$branch)
                                        ->whereDate('created_at','<',$f_date)
                                        ->whereIn('status',['0','1','2'])
                                        ->sum('product_qty');

                $opening_damage_qty   =   damagedproduct::where('product_id',$product->id)
                                        ->where('branch_id',$branch)
                                        ->whereDate('created_at','<',$f_date)
                                        ->sum('product_qty');

                $opening_transfer_qty =   Transfer_confirm_product::where('product_id',$product->id)
                                        ->where('from_branch',$branch)
                                        ->whereDate('created_at','<',$f_date)
                                        ->sum('product_qty');


                $opening_stock=max($opening_product_qty-($opening_sales_qty+$opening_damage_qty+$opening_transfer_qty),0);  


                $received_qty         =   Purchase_product::where('product_id',$product->id)
                                        ->where('branch_id',$branch)
                                        ->whereDate('created_at','>=',$f_date)
                                        ->whereDate('created_at','<=',$t_date)
                                        ->sum('product_qty');


                $sold_qty             =  Sales_product::where('product_id',$product->id)
                                        ->where('branch_id',$branch)
                                        ->whereDate('created_at','>=',$f_date)
                                        ->whereDate('created_at','<=',$t_date)
                                        ->whereIn('status',['0','1','2'])
                                        ->sum('product_qty');

                $damaged_qty          =   damagedproduct::where('product_id',$product->id)
                                        ->where('branch_id',$branch)
                                        ->whereDate('created_at','>=',$f_date)
                                        ->whereDate('created_at','<=',$t_date)
                                        ->sum('product_qty');

                $transfer_qty         =   Transfer_confirm_product::where('product_id',$product->id)
                                        ->where('from_branch',$branch)
                                        ->whereDate('created_at','>=',$f_date)
                                        ->whereDate('created_at','<=',$t_date)
                                        ->sum('product_qty');

                $closing_stock=max(($opening_stock + $received_qty)-($sold_qty + $damaged_qty + $transfer_qty),0);

                $excelData[$i]['Sl No']         = $i;
                $excelData[$i]['PRODUCT NAME']  = $product->product_name;
                $excelData[$i]['PRODUCT CODE']  =$product->product_number;
                $excelData[$i]['UNIT']          =$product->unit->unit_name;
                $excelData[$i]['OPENING STOCK'] =$opening_stock;
                $excelData[$i]['RECEIVE QTY']   =$received_qty;
                $excelData[$i]['ITEM SOLD']     =$sold_qty;
                $excelData[$i]['DAMAGED']       =$damaged_qty;
                $excelData[$i]['CLOSING STOCK'] =$closing_stock ;

                $i++;
            }

            $lastcell   = 'A3:I'.(1+$i);
            $pagename   = $fdate.'to'.$tdate.'-'.'Stock report';


            Excel::create($pagename, function($excel) use ($excelData,$pagename,$lastcell) {
            $excel->sheet('mySheet', function($sheet) use ($excelData,$pagename,$lastcell)
            {
            $sheet->fromArray($excelData);
            $sheet->cell('A1:I1', function($cell)
            {
            $cell->setFontSize(11);
            $cell->setBackground('#7cde9c');
            $cell->setFontWeight('bold');
            $cell->setAlignment('left');

            });
            $sheet->setFreeze('A2');
            $sheet->prependRow(1, array("STOCK REPORT"));



            $sheet->mergeCells('A1:I1');
            $sheet->cell('A1:I1', function($cell) 
            {
            $cell->setFontSize(12);
            $cell->setBackground('#43a061');
            $cell->setFontWeight('bold');
            $cell->setAlignment('center');

            });


            $sheet->cell($lastcell, function($cell) {
            $cell->setFontSize(12);
            $cell->setFontWeight('thin');
            $cell->setAlignment('center');

            });

            $sheet->setPageMargin(array(
            0.25, 0.30, 0.25, 0.30
            ));
            });
            })->download('xls');
        }




//EXCEL Product wise  Stock Report all  
        if( $request->report    =='productwiseReport' && $request->print=='excel')
        {

        $productIds             =   $request->product;
        $products               =Product::where('added_branch',$branch)->whereIn('id',$productIds)->orderBy('id','ASC')->get();

        ob_end_clean();

        ob_start();

        $excelData=array();




            $i=1;
            foreach($products as $product)
            {
            $MainQuery=new Testclass();


            $opening_product_qty  =   $MainQuery->opening_product($product->id,$branch,$f_date)->sum('product_qty');

            $opening_sales_qty    =   $MainQuery->opening_sales($product->id,$branch,$f_date)->sum('product_qty');

            $opening_damage_qty   =   $MainQuery->opening_damage($product->id,$branch,$f_date)->sum('product_qty');

            $opening_transfer_qty =   $MainQuery->opening_transfer($product->id,$branch,$f_date)->sum('product_qty');


            $opening_stock        =max($opening_product_qty-($opening_sales_qty+$opening_damage_qty+$opening_transfer_qty),0);  


            $received_qty         =   $MainQuery->received($product->id,$branch,$f_date,$t_date)->sum('product_qty');

            $sold_qty             =   $MainQuery->sold($product->id,$branch,$f_date,$t_date)->sum('product_qty');

            $damaged_qty          =   $MainQuery->damaged($product->id,$branch,$f_date,$t_date)->sum('product_qty');

            $transfer_qty         =   $MainQuery->transfer($product->id,$branch,$f_date,$t_date)->sum('product_qty');

            $closing_stock=max(($opening_stock + $received_qty)-($sold_qty + $damaged_qty + $transfer_qty),0);




                $closing_stock=max(($opening_stock + $received_qty)-($sold_qty + $damaged_qty + $transfer_qty),0);

                $excelData[$i]['Sl No']         = $i;
                $excelData[$i]['PRODUCT NAME']  = $product->product_name;
                $excelData[$i]['PRODUCT CODE']  =$product->product_number;
                $excelData[$i]['UNIT']          =$product->unit->unit_name;
                $excelData[$i]['OPENING STOCK'] =$opening_stock;
                $excelData[$i]['RECEIVE QTY']   =$received_qty;
                $excelData[$i]['ITEM SOLD']     =$sold_qty;
                $excelData[$i]['DAMAGED']       =$damaged_qty;
                $excelData[$i]['CLOSING STOCK'] =$closing_stock ;

                $i++;
            $closing_stock=$transfer_qty=$damaged_qty=$sold_qty=$opening_stock=$opening_transfer_qty=$opening_damage_qty=$opening_sales_qty=$opening_product_qty=0;


            }

            $lastcell   = 'A3:I'.(1+$i);
            $pagename   = $fdate.'to'.$tdate.'-'.'Stock report';


            Excel::create($pagename, function($excel) use ($excelData,$pagename,$lastcell) {
            $excel->sheet('mySheet', function($sheet) use ($excelData,$pagename,$lastcell)
            {
            $sheet->fromArray($excelData);
            $sheet->cell('A1:I1', function($cell)
            {
            $cell->setFontSize(11);
            $cell->setBackground('#7cde9c');
            $cell->setFontWeight('bold');
            $cell->setAlignment('left');

            });
            $sheet->setFreeze('A2');
            $sheet->prependRow(1, array("PRODUCT WISE STOCK REPORT"));



            $sheet->mergeCells('A1:I1');
            $sheet->cell('A1:I1', function($cell) 
            {
            $cell->setFontSize(12);
            $cell->setBackground('#43a061');
            $cell->setFontWeight('bold');
            $cell->setAlignment('center');

            });


            $sheet->cell($lastcell, function($cell) {
            $cell->setFontSize(12);
            $cell->setFontWeight('thin');
            $cell->setAlignment('center');

            });

            $sheet->setPageMargin(array(
            0.25, 0.30, 0.25, 0.30
            ));
            });
            })->download('xls');
        }



//EXCEL Stock Moving Report
        if( $request->report    =='stockMovingReport' && $request->print=='excel')
        {
                                    
            $sales_qty = DB::table('sales_products')
                        ->selectRaw('product_id, SUM(product_qty) as sold_qty')
                        ->where('branch_id',$branch)
                        ->whereDate('updated_at','>=',$f_date)
                        ->whereDate('updated_at','<=',$t_date)
                        ->whereIn('status',['2'])
                        ->groupBy('product_id')
                        ->OrderBy('sold_qty','desc')
                        ->get();

        ob_end_clean();

        ob_start();

        $excelData=array();


            $i=1;
            foreach($sales_qty as $sales_qty)
            {

                $product=Product::where('id',$sales_qty->product_id)->where('added_branch',$branch)->first();


                $excelData[$i]['Sl No']         = $i;
                $excelData[$i]['PRODUCT NAME']  = $product->product_name;
                $excelData[$i]['PRODUCT CODE']  =$product->product_number;
                $excelData[$i]['UNIT']          =$product->unit->unit_name;
                $excelData[$i]['SOLD QTY']      =$sales_qty->sold_qty;

                $i++;
           
            }

            $lastcell   = 'A3:E'.(1+$i);
            $pagename   = $fdate.'to'.$tdate.'-'.'Stock Moving report';


            Excel::create($pagename, function($excel) use ($excelData,$pagename,$lastcell) {
            $excel->sheet('mySheet', function($sheet) use ($excelData,$pagename,$lastcell)
            {
            $sheet->fromArray($excelData);
            $sheet->cell('A1:E1', function($cell)
            {
            $cell->setFontSize(11);
            $cell->setBackground('#7cde9c');
            $cell->setFontWeight('bold');
            $cell->setAlignment('left');

            });
            $sheet->setFreeze('A2');
            $sheet->prependRow(1, array("STOCK MOVING REPORT"));



            $sheet->mergeCells('A1:E1');
            $sheet->cell('A1:E1', function($cell) 
            {
            $cell->setFontSize(12);
            $cell->setBackground('#43a061');
            $cell->setFontWeight('bold');
            $cell->setAlignment('center');

            });


            $sheet->cell($lastcell, function($cell) {
            $cell->setFontSize(12);
            $cell->setFontWeight('thin');
            $cell->setAlignment('center');

            });

            $sheet->setPageMargin(array(
            0.25, 0.30, 0.25, 0.30
            ));
            });
            })->download('xls');
        }



//EXCEL Stock Transfer Report
        if( $request->report    =='stockTransferReport' && $request->print=='excel')
        {
                                    
        $products               =Product::join('transfer_confirm_products','transfer_confirm_products.product_id','=','products.id')->where('products.added_branch',$branch)->get();
    
        ob_end_clean();

        ob_start();

        $excelData=array();


            $i=1;
            foreach($products as $product)
            {

                $transfer_qty = DB::table('transfer_confirm_products')
                ->where('product_id',$product->id)
                ->where('from_branch',$branch)
                ->whereDate('updated_at','>=',$f_date)
                ->whereDate('updated_at','<=',$t_date)
                ->sum('product_qty');


               if($transfer_qty==0)
                continue;

                $excelData[$i]['Sl No']         = $i;
                $excelData[$i]['DATE']          = date('d-m-Y',strtotime($product->updated_at));
                $excelData[$i]['PRODUCT NAME']  = $product->product_name;
                $excelData[$i]['PRODUCT CODE']  =$product->product_number;
                $excelData[$i]['TO BRANCH']     =$products->to_branch;
                $excelData[$i]['TRANSFER QTY']  =$transfer_qty;
 

                $i++;
           
            }

            $lastcell   = 'A3:E'.(1+$i);
            $pagename   = $fdate.'to'.$tdate.'-'.'Stock Transfer report';


            Excel::create($pagename, function($excel) use ($excelData,$pagename,$lastcell) {
            $excel->sheet('mySheet', function($sheet) use ($excelData,$pagename,$lastcell)
            {
            $sheet->fromArray($excelData);
            $sheet->cell('A1:E1', function($cell)
            {
            $cell->setFontSize(11);
            $cell->setBackground('#7cde9c');
            $cell->setFontWeight('bold');
            $cell->setAlignment('left');

            });
            $sheet->setFreeze('A2');
            $sheet->prependRow(1, array("STOCK TRANSFER REPORT"));



            $sheet->mergeCells('A1:E1');
            $sheet->cell('A1:E1', function($cell) 
            {
            $cell->setFontSize(12);
            $cell->setBackground('#43a061');
            $cell->setFontWeight('bold');
            $cell->setAlignment('center');

            });


            $sheet->cell($lastcell, function($cell) {
            $cell->setFontSize(12);
            $cell->setFontWeight('thin');
            $cell->setAlignment('center');

            });

            $sheet->setPageMargin(array(
            0.25, 0.30, 0.25, 0.30
            ));
            });
            })->download('xls');
        }

    }



    public function create(Request $request)
    {

        $data   =Product::where('added_branch',$request->branch)->orderBy('id','ASC')->get();
        return $data;

    }





}

class Testclass
{
    public function opening_product($product_id,$branch,$f_date)    { 

    return $opening_product         = Purchase_product::where('branch_id',$branch)->where('product_id',$product_id)
                                                                ->whereDate('created_at','<',$f_date);
    }

    public function opening_sales($product_id,$branch,$f_date)      { 

    return $opening_sales           = Sales_product::where('branch_id',$branch)->where('product_id',$product_id)
                                                                ->whereDate('created_at','<',$f_date)
                                                                ->whereIn('status',['0','1','2']);
    }
    public function opening_damage($product_id,$branch,$f_date)     { 

    return $opening_damage          =   damagedproduct::where('branch_id',$branch)->where('product_id',$product_id)
                                                                ->whereDate('created_at','<',$f_date);
    }
    public function opening_transfer($product_id,$branch,$f_date)   { 

    return $opening_transfer        =  Transfer_confirm_product::where('from_branch',$branch)->where('product_id',$product_id)
                                                                ->whereDate('created_at','<',$f_date);
    }
    public function received($product_id,$branch,$f_date,$t_date)   { 

    return $received                =     Purchase_product::where('branch_id',$branch)->where('product_id',$product_id)
                                                                ->whereDate('created_at','>=',$f_date)
                                                                ->whereDate('created_at','<=',$t_date);
    }

    public function sold($product_id,$branch,$f_date,$t_date)       { 
    return $sold                    =  Sales_product::where('branch_id',$branch)->where('product_id',$product_id)
                                                                ->whereDate('created_at','>=',$f_date)
                                                                ->whereDate('created_at','<=',$t_date)
                                                                ->whereIn('status',['0','1','2']);
    }

    public function damaged($product_id,$branch,$f_date,$t_date)    { 
    return $damaged                 =   damagedproduct::where('branch_id',$branch)->where('product_id',$product_id)
                                                                ->whereDate('created_at','>=',$f_date)
                                                                ->whereDate('created_at','<=',$t_date);
    }
    public function transfer($product_id,$branch,$f_date,$t_date)   { 

    return $transfer                =   Transfer_confirm_product::where('from_branch',$branch)->where('product_id',$product_id)
                                                                ->whereDate('created_at','>=',$f_date)
                                                                ->whereDate('created_at','<=',$t_date);
    }
}
