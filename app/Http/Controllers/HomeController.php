<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function about()
    {
        return view('pages.about');
    }
    public function team()
    {
        return view('pages.team');
    }
    public function contact()
    {
        return view('pages.contact');
    }
    public function termsOfUse()
    {
        return view('pages.terms');
    }
    public function privacyPolicy()
    {
        return view('pages.policy');
    }

    public function contactHandler(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);
        try {
            //code...
        
        $sender_email = env('MAIL_USERNAME');
        $receiver_email = 'contact@hcalculator.com';
        $subject = 'Contact Form Message';
        $message = '<table>
                        <tr>
                            <td>Name</td>
                            <td>'.$request->name.'</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>'.$request->email.'</td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td>'.$request->message.'</td>
                        </tr>
                    </table>';
        $headers = "From: <$sender_email> \r\n";
        $headers .= "Reply-To: HCalculator Contact <$sender_email> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";
        $mailto = mail($receiver_email, $subject, $message, $headers);
        return response()->json(['status' => 1, 'msg' => 'Thank You! Your message has been recieved by us']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 0, 'msg' => $th]);
        }
    }
}
