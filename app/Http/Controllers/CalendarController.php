<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    // Takvim ana sayfasını gösterir
    public function index()
    {
        return view('calendar.index');
    }
}