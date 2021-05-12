<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('dashboard', [
                    'projects' => $user->project]);
    }
}
