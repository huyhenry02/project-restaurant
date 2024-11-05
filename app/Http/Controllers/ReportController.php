<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Modules\Order\Models\Order;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use App\Modules\Customer\Models\Customer;
use App\Modules\Reservation\Models\Reservation;

class ReportController extends Controller
{
    public function show_report_sales(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.page.statistic.report_sales');
    }

    public function show_report_customers(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.page.statistic.report_customers');
    }

    public function show_report_reservations(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('employee.page.statistic.report_reservations');
    }

    public function get_report_sales(String $type): JsonResponse
    {
        $currentYear = (int)date('Y');

        if ($type === 'year') {
            $startYear = $currentYear - 5;

            $yearlyData = Order::selectRaw('YEAR(order_date) as year, SUM(total_amount) as total')
                ->whereBetween(DB::raw('YEAR(order_date)'), [$startYear, $currentYear])
                ->groupBy('year')
                ->orderBy('year')
                ->get();

            $data = [
                'yearly' => $yearlyData,
            ];

            return response()->json($data);
        }

        if ($type === 'month') {
            $monthlyData = Order::selectRaw('MONTH(order_date) as month, SUM(total_amount) as total')
                ->whereYear('order_date', $currentYear)
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            $data = [
                'monthly' => $monthlyData,
            ];

            return response()->json($data);
        }

        if ($type === 'week') {
            $currentMonth = date('m');
            $weeklyData = Order::selectRaw('WEEK(order_date) as week, SUM(total_amount) as total')
                ->whereYear('order_date', $currentYear)
                ->whereMonth('order_date', $currentMonth)
                ->groupBy('week')
                ->orderBy('week')
                ->get();

            $data = [
                'weekly' => $weeklyData,
            ];

            return response()->json($data);
        }

        if ($type === 'day') {
            $currentWeek = date('W');
            $dailyData = Order::selectRaw('DATE(order_date) as day, SUM(total_amount) as total')
                ->whereYear('order_date', $currentYear)
                ->where(DB::raw('WEEK(order_date)'), $currentWeek)
                ->groupBy('day')
                ->orderBy('day')
                ->get();

            $data = [
                'daily' => $dailyData,
            ];

            return response()->json($data);
        }

        return response()->json(['message' => 'Invalid type specified'], 400);
    }


    public function get_report_customers(String $type): JsonResponse
    {
        $currentYear = (int) date('Y');
        $currentMonth = (int) date('m');
        $currentWeek = (int) date('W');

        if ($type === 'year') {
            $startYear = $currentYear - 5;

            $yearlyData = Customer::selectRaw('YEAR(created_at) as year, COUNT(*) as total')
                ->whereBetween(DB::raw('YEAR(created_at)'), [$startYear, $currentYear])
                ->groupBy('year')
                ->orderBy('year')
                ->get();

            $data = [
                'yearly' => $yearlyData,
            ];

            return response()->json($data);
        }

        if ($type === 'month') {
            $monthlyData = Customer::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
                ->whereYear('created_at', $currentYear)
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            $data = [
                'monthly' => $monthlyData,
            ];

            return response()->json($data);
        }

        if ($type === 'week') {
            $weeklyData = Customer::selectRaw('WEEK(created_at, 1) as week, COUNT(*) as total')
                ->whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $currentMonth)
                ->groupBy('week')
                ->orderBy('week')
                ->get();

            $data = [
                'weekly' => $weeklyData,
            ];

            return response()->json($data);
        }

        if ($type === 'day') {
            $dailyData = Customer::selectRaw('DATE(created_at) as day, COUNT(*) as total')
                ->whereYear('created_at', $currentYear)
                ->where(DB::raw('WEEK(created_at, 1)'), $currentWeek)
                ->groupBy('day')
                ->orderBy('day')
                ->get();

            $data = [
                'daily' => $dailyData,
            ];

            return response()->json($data);
        }

        return response()->json(['error' => 'Invalid type specified'], 400);
    }

    public function get_report_reservations(String $type): JsonResponse
    {
        $currentYear = (int) date('Y');
        $currentMonth = (int) date('m');
        $currentWeek = (int) date('W');

        if ($type === 'year') {
            $startYear = $currentYear - 5;

            $yearlyData = Reservation::selectRaw('YEAR(created_at) as year, COUNT(*) as total')
                ->whereBetween(DB::raw('YEAR(created_at)'), [$startYear, $currentYear])
                ->groupBy('year')
                ->orderBy('year')
                ->get();

            $data = [
                'yearly' => $yearlyData,
            ];

            return response()->json($data);
        }

        if ($type === 'month') {
            $monthlyData = Reservation::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
                ->whereYear('created_at', $currentYear)
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            $data = [
                'monthly' => $monthlyData,
            ];

            return response()->json($data);
        }

        if ($type === 'week') {
            $weeklyData = Reservation::selectRaw('WEEK(created_at, 1) as week, COUNT(*) as total')
                ->whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $currentMonth)
                ->groupBy('week')
                ->orderBy('week')
                ->get();

            $data = [
                'weekly' => $weeklyData,
            ];

            return response()->json($data);
        }

        if ($type === 'day') {
            $dailyData = Reservation::selectRaw('DATE(created_at) as day, COUNT(*) as total')
                ->whereYear('created_at', $currentYear)
                ->where(DB::raw('WEEK(created_at, 1)'), $currentWeek)
                ->groupBy('day')
                ->orderBy('day')
                ->get();

            $data = [
                'daily' => $dailyData,
            ];

            return response()->json($data);
        }

        return response()->json(['error' => 'Invalid type specified'], 400);
    }

}
