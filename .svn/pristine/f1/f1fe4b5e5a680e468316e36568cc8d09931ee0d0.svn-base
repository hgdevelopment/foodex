<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use App\log_report;
use DB;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public static function logReport($type,$report)
	{
        $log = new log_report();
        $user=Auth::guard('admin')->user();
        $userId = $user->id;
        $branchId = $user->branch;
        $log->ip_address =  \Request::getClientIp(true);
        $log->user = $userId;
        $log->branch_id = $branchId;
        $log->actions = $report;
        $log->type = $type;
        $query = $log->save();
	}
}
