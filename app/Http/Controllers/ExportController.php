<?php

namespace App\Http\Controllers;

use App\Export\Export;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    //
    public function export()
    {
        return Excel::download(new Export(), 'exported-data.xlsx');
    }
}
