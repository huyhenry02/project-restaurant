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

            $allMonths = collect(range(1, 12))->mapWithKeys(function ($month) use ($monthlyData) {
                return [$month => $monthlyData->get($month, (object)['month' => $month, 'total' => 0])];
            });
            $data = [
                'monthly' => $allMonths->values(),
            ];
            return response()->json($data);
        }

        if ($type === 'week') {
            $currentMonth = date('m');
            $weeksInMonth = $this->getWeeksInMonth($currentYear, $currentMonth);
            $weeklyData = Order::selectRaw('WEEK(order_date) as week, SUM(total_amount) as total')
                ->whereYear('order_date', $currentYear)
                ->whereMonth('order_date', $currentMonth)
                ->groupBy('week')
                ->orderBy('week')
                ->get();

            $allWeeks = collect($weeksInMonth)->mapWithKeys(function ($week) use ($weeklyData) {
                return [$week => $weeklyData->get($week, (object)['week' => $week, 'total' => 0])];
            });

            $data = [
                'weekly' => $allWeeks->values(),
            ];

            return response()->json($data);
        }

        if ($type === 'day') {
            $currentWeek = date('W');
            $daysInWeek = $this->getDaysInWeek($currentYear, $currentWeek);
            $dailyData = Order::selectRaw('DATE(order_date) as day, SUM(total_amount) as total')
                ->whereYear('order_date', $currentYear)
                ->where(DB::raw('WEEK(order_date)'), $currentWeek)
                ->groupBy('day')
                ->orderBy('day')
                ->get()
                ->keyBy('day');

            $allDays = collect($daysInWeek)->mapWithKeys(function ($day) use ($dailyData) {
                return [$day => $dailyData->get($day, (object)['day' => $day, 'total' => 0])];
            });

            $data = [
                'daily' => $allDays->values(),
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

            $allMonths = collect(range(1, 12))->mapWithKeys(function ($month) use ($monthlyData) {
                return [$month => $monthlyData->get($month, (object)['month' => $month, 'total' => 0])];
            });

            $data = [
                'monthly' => $allMonths->values(),
            ];

            return response()->json($data);
        }

        if ($type === 'week') {
            $weeksInMonth = $this->getWeeksInMonth($currentYear, $currentMonth);
            $weeklyData = Customer::selectRaw('WEEK(created_at, 1) as week, COUNT(*) as total')
                ->whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $currentMonth)
                ->groupBy('week')
                ->orderBy('week')
                ->get();

            $allWeeks = collect($weeksInMonth)->mapWithKeys(function ($week) use ($weeklyData) {
                return [$week => $weeklyData->get($week, (object)['week' => $week, 'total' => 0])];
            });

            $data = [
                'weekly' => $allWeeks->values(),
            ];

            return response()->json($data);
        }

        if ($type === 'day') {
            $daysInWeek = $this->getDaysInWeek($currentYear, $currentWeek);
            $dailyData = Customer::selectRaw('DATE(created_at) as day, COUNT(*) as total')
                ->whereYear('created_at', $currentYear)
                ->where(DB::raw('WEEK(created_at, 1)'), $currentWeek)
                ->groupBy('day')
                ->orderBy('day')
                ->get()
                ->keyBy('day');


            $allDays = collect($daysInWeek)->mapWithKeys(function ($day) use ($dailyData) {
                return [$day => $dailyData->get($day, (object)['day' => $day, 'total' => 0])];
            });

            $data = [
                'daily' => $allDays->values(),
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

            $allMonths = collect(range(1, 12))->mapWithKeys(function ($month) use ($monthlyData) {
                return [$month => $monthlyData->get($month, (object)['month' => $month, 'total' => 0])];
            });

            $data = [
                'monthly' => $allMonths->values(),
            ];

            return response()->json($data);
        }

        if ($type === 'week') {
            $weeksInMonth = $this->getWeeksInMonth($currentYear, $currentMonth);
            $weeklyData = Reservation::selectRaw('WEEK(created_at, 1) as week, COUNT(*) as total')
                ->whereYear('created_at', $currentYear)
                ->whereMonth('created_at', $currentMonth)
                ->groupBy('week')
                ->orderBy('week')
                ->get();


            $allWeeks = collect($weeksInMonth)->mapWithKeys(function ($week) use ($weeklyData) {
                return [$week => $weeklyData->get($week, (object)['week' => $week, 'total' => 0])];
            });

            $data = [
                'weekly' => $allWeeks->values(),
            ];

            return response()->json($data);
        }

        if ($type === 'day') {
            $daysInWeek = $this->getDaysInWeek($currentYear, $currentWeek);
            $dailyData = Reservation::selectRaw('DATE(created_at) as day, COUNT(*) as total')
                ->whereYear('created_at', $currentYear)
                ->where(DB::raw('WEEK(created_at, 1)'), $currentWeek)
                ->groupBy('day')
                ->orderBy('day')
                ->get()
                ->keyBy('day');

            $allDays = collect($daysInWeek)->mapWithKeys(function ($day) use ($dailyData) {
                return [$day => $dailyData->get($day, (object)['day' => $day, 'total' => 0])];
            });

            $data = [
                'daily' => $allDays->values(),
            ];

            return response()->json($data);
        }

        return response()->json(['error' => 'Invalid type specified'], 400);
    }
    private function getWeeksInMonth($year, $month): array
    {
        $start = new \DateTime("$year-$month-01");
        $end = (clone $start)->modify('last day of this month');
        $weeks = [];

        while ($start <= $end) {
            $weeks[] = (int)$start->format('W');
            $start->modify('next week');
        }

        return $weeks;
    }

    private function getDaysInWeek($year, $week): array
    {
        $dto = new \DateTime();
        $dto->setISODate($year, $week);
        $days = [];
        for ($i = 0; $i < 7; $i++) {
            $days[] = $dto->format('Y-m-d');
            $dto->modify('+1 day');
        }
        return $days;
    }

}
