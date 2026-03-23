<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.index');
    }
    public function about()
    {
        return view('front.about');
    }

    public function portfolio()
    {
         $works = Work::latest()->get();

        return view('front.portfolio', compact('works'));
    }
    public function contact()
    {
        return view('front.contact');
    }
    public function portfolio_show($id)
    {
       $work = Work::findOrFail($id);
    return view('front.portfolio_info', compact('work'));

    }
public function sendEmail(Request $request)
    {
      $data = $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'service' => 'nullable',
        'message' => 'required',
    ]);

    Mail::to('up120161676@gmail.com')->send(new ContactMail($data));
    // return dd( 'تم إرسال الرسالة بنجاح ✅');
    return back()->with('success', 'تم إرسال الرسالة بنجاح ✅');
    }
}
