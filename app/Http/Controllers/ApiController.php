<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Email;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Response;

class ApiController extends Controller
{
    //
    public function register(Request $request) {
        
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $token = Str::random(60);
        $newUser = new User();
        $newUser->name = $name;
        $newUser->email = $email;
        $newUser->password = Hash::make($password);
        $newUser->api_token = hash('sha256', $token);
        $newUser->save();

        return $newUser;

    }

    public function login(Request $request) {

        $email = $request->input('email');
        $password = $request->input('password');
        
        $data = array(
            'email' => $email,
            'password' => $password
        );

        if (Auth::attempt($data)) {
            $user = DB::table('users')->where('email', $email)->first();
            return Response::json(
                [ 
                    'user_id' => $user->id,
                    'api_token' => $user->api_token,
                    'user' => $user
                ], 200);
        } else {
            return Response::json(['message' => 'Invalid credentials!'], 400);
        }

    }
    
    public function protectedRoute(Request $request) {
        return 'we can see protected';
    }

    public function sendEmail(Request $request) {
        $user_id = $request->input('user_id');
        $subject = $request->input('subject');
        $body = $request->input('body');
        $email = new Email();
        $email->subject = $subject;
        $email->body = $body;
        $email->user_id = $user_id;
        $email->save();
        return Response::json(['message' => 'Email sent!'], 200);
    }

    public function getEmails(Request $request) { 
        $limit = $request->input('limit');
        $emails = Email::paginate($limit);
        return Response::json(['message' => 'a', 'emails' => $emails]);
    } 

}
