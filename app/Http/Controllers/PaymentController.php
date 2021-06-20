<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use App\Models\Course;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
class PaymentController extends Controller
{
    public function checkout(Course $course){
        return view('payment.checkout',compact('course'));
    }

    public function pay(Course $course){
        $course->students()->attach(auth()->user()->id);
        return redirect()->route('course.status',$course);
    }
}
