<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Company;
use App\Models\Employees;
use App\Models\Entry;
use App\Models\Material;
use App\Models\Partner;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalClients = Client::count();
        $totalCompanies = Company::count();
        $totalEmployees = Employees::count();
        $totalPartners = Partner::count();
        $totalMaterials = Material::count();
        $totalEntries = Entry::count();
       
        return view('admin.pages.home.index', compact(
            'totalUsers', 'totalClients', 'totalCompanies',
            'totalEmployees','totalPartners', 'totalMaterials', 'totalEntries'));
    }

    public function report()
    {
        $total_points = "SELECT id_cliente, SUM(valor) as total FROM total_points GROUP BY id_cliente ORDER BY total DESC LIMIT 3";
        $entries = Entry::all();
        $pdf = PDF::loadView('admin.pages.home.entryreport', compact('entries', 'total_points'));
        return $pdf->download('entradas.pdf');
    }
}
