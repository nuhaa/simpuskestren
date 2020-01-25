<?php

namespace App\Http\Controllers\Admin;

use App\Charts\UserChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Register;

class DashboardController extends Controller
{
    public function index()
    {
        $chartOptions = [
            'scales' => [
                'yAxes' => [
                    [
                        'ticks' => [
                            'beginAtZero' => false,
                        ],
                    ],
                ],
            ],
        ];
        /*Pasien hari ini*/
        $date = date('d-m-Y');
        $dateWhere = date('Y-m-d');
        // $dateWhere = date('2019-12-15');
        $countUmum = Register::whereDateCheck($dateWhere)
                    ->wherePolyId('1')
                    ->count();
        $countGigi = Register::whereDateCheck($dateWhere)
                    ->wherePolyId('2')
                    ->count();
        $countKia = Register::whereDateCheck($dateWhere)
                    ->wherePolyId('3')
                    ->count();
                    // dd($countUmum);
        $pasien = new UserChart;
        $pasien->displayAxes(true);
        $pasien->height(200);
        $pasien->displaylegend(true);
        $pasien->options($chartOptions);
        $pasien->labels([$date]);
        $pasien->dataset('Poli Umum', 'bar', [$countUmum])
            ->color("rgba(255, 99, 132, 1.0)")
            ->backgroundcolor("rgba(255, 99, 132, 0.2)");
        $pasien->dataset('Poli Gigi', 'bar', [$countGigi])
            ->color("rgba(255, 159, 64, 1.0)")
            ->backgroundcolor("rgba(255, 159, 64, 0.2)");
        $pasien->dataset('Poli KIA', 'bar', [$countKia])
            ->color("rgba(205,220,57, 1.0)")
            ->backgroundcolor("rgba(205,220,57, 0.2)");
        return view('admin.index', compact('pasien'));
    }
}
