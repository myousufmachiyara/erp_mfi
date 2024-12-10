<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dash_over_days_sales;
use App\Models\dash_over_days_pur;


class DashboardOverDaysTabController extends Controller
{
    public function OverDays(Request $request)
    {
        $dash_over_days_sales = dash_over_days_sales::where('remaining_amount', '!=', 0)
        ->where('days_cross', '>', 0)
        ->orderBy('days_cross', 'desc')
        ->get();

        $dash_over_days_pur = dash_over_days_pur::where('remaining_amount', '!=', 0)
        ->where('days_cross', '>', 0)
        ->orderBy('days_cross', 'desc')
        ->get();


       

        return response()->json([
            'dash_over_days_sales' => $dash_over_days_sales,
            'dash_over_days_pur' => $dash_over_days_pur
        ]);
    }
}