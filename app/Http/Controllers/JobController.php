<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Contracts\View\View;

class JobController extends Controller
{
    public function index(): View {
        $jobs = Job::all();
        return view(view:'job/index' , data: ['jobs' => $jobs, 'name'=> 'Mostafa']);
    }
}
