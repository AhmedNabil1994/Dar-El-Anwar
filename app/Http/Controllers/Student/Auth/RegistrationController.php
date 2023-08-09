<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\SignUpRequest;
use App\Mail\UserEnailVerificaion;
use App\Models\Admin;
use App\Models\Instructor;
use App\Models\Student;
use App\Models\User;
use App\Tools\Repositories\Crud;
use App\Traits\EmailSendTrait;
use App\Traits\General;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    use EmailSendTrait, General;

    protected $model;
    protected $studentModel;

    public function __construct(User $user, Student $student)
    {
        $this->model = new Crud($user);
        $this->studentModel = new Crud($student);
    }

public function hello()
{
    return 'hello';
}

//showLoginForm

    public function showLoginForm()
    {
        return view('student.auth.login');
    }

//genearte student code
    public function generateStudentCode()
    {

        $code = 'STU' . rand(100000, 999999);
        $check = Student::where('student_code', $code)->first();
        if ($check) {
            $this->generateStudentCode();
        }
        return $code;
    }



    public function signUp()
    {
        $data['pageTitle'] = 'Sign Up';
        return view('student.auth.sign-up', $data);
    }

    ###no register for admins

    public function storeSignUp(SignUpRequest $request)
    {
//        return response()->json(['success' => $request->all()]);

        $user = new User();
        $user->name = $request->first_name . ' '. $request->last_name;
        $user->email = $request->email;
        $user->user_name = $request->user_name;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->remember_token = $request->_token;
        $user->email_verified_at = get_option('registration_email_verification') == 1 ? '' : now();
        $user->role = 3;
        $user->save();

        $student_data = [
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ];
        $this->studentModel->create($student_data);

//        if (get_option('registration_email_verification') == 1){
//            try {
//                Mail::to($user->email)->send(new UserEnailVerificaion($user));
//            } catch (\Exception $exception) {
//                toastrMessage('error', 'Something is wrong. Try after few minutes!');
//                return redirect()->back();
//            }
//            $this->showToastrMessage('error', __('Sent verification mail your account. Please check your email.'));
//        }
        $this->showToastrMessage('success', __('Your registration is successful.'));

        return redirect(route('student.login'));

    }


    public function emailVerification($token)
    {
        if (User::where('remember_token', $token)->count() > 0)
        {
            $user = User::where('remember_token', $token)->first();
            $user->email_verified_at = Carbon::now()->format("Y-m-d H:i:s");
            $user->remember_token = null;
            $user->save();
            Auth::login($user);

            $this->showToastrMessage('success', __('Congratulations! Successfully verified your email.'));
            return redirect()->route('home');

        } else {
            return redirect(route('login'));
        }

    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

//        return response($request->all());
        $credentials = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            // Add other validation rules as needed
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Create a new student record
        $student = Student::create([
            'uuid' => Str::uuid(),
            'user_id' => $user->id,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone_number' => $request->input('phone_number'),
            'postal_code' => $request->input('postal_code'),
            'address' => $request->input('address'),
            'about_me' => $request->input('about_me'),
            'gender' => $request->input('gender'),
            'status' => 0, // Set status to pending by default
            'code' => $this->generateStudentCode(), // Generate a unique student code
            'birthdate' => $request->input('birthdate'),
            'address_province' => $request->input('address_province'),
            'address_city' => $request->input('address_city'),
            'address_village' => $request->input('address_village'),
            'address_street' => $request->input('address_street'),
            'nearest_teacher' => $request->input('nearest_teacher'),
            'enrollment_date' => $request->input('enrollment_date'),
            'branch' => $request->input('branch'),
            'period' => $request->input('period'),
            'section' => $request->input('section'),
        ]);

        // Send an email or notification to the admin to approve the registration
        // ...

        // Return a success response
        return response()->json(['message' => 'Registration successful']);
    }

}
