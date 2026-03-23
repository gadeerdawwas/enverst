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
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'service' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);
  $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $service = $request->service ?? '-';
        $message = $request->message;

        // صياغة الرسالة للواتسآب
        $text = "مرحبا، اسمي: $name\nرقم الهاتف: $phone\nالبريد الإلكتروني: $email\nالخدمة المطلوبة: $service\nالرسالة: $message";

        // ترميز النص لتوافق URL
        $text = urlencode($text);

        // رقم واتسآب المستلم بصيغة دولية بدون +
        $whatsappNumber = "972592700999"; // ضع رقمك هنا

        // إعادة توجيه المستخدم إلى واتسآب
        return redirect("https://wa.me/{$whatsappNumber}?text={$text}");
        // Send email
        // Mail::to('youremail@example.com')->send(new ContactMail($request->all()));

        return back()->with('success', 'تم إرسال رسالتك بنجاح!');
    }
}
