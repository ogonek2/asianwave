<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
use App\Models\Schedule;
use App\Models\LectureSchedule;

class Navigator extends Controller
{
    public function index()
    {
        return view('welcome', [
            'appData' => [
                'news' => News::latest()->take(5)->get(),
                'Schedule' => Schedule::all(),
                'LectureSchedule' => LectureSchedule::all(),
            ],
        ]);
    }
}
