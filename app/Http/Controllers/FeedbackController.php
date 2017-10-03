<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function addFeedback()
    {
        Feedback::create([
            'feedback' => request('feedback'),
            'project_id' => request('project_id'),
            'user_id' => Auth::user()->id,
        ]);
        return response(['message' => 'User feedback received. Thank you'],200);
    }
}
