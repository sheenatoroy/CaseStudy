<?php

use App\Services\UserRegistrationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
<<<<<<< HEAD
    protected $registrationService;

    public function __construct(UserRegistrationService $registrationService)
    {
        $this->registrationService = $registrationService;
=======
    public function showRegistrationForm()
    {
        return view('auth.register');
>>>>>>> 6ccde9bb39e06bd01611b23be00d99b9abcce500
    }

    public function register(Request $request)
    {
        try {
            $this->validateRegistrationRequest($request);

            $this->registrationService->registerUser($request->email, $request->password);

            return $this->registrationSuccessResponse();
        } catch (\Exception $e) {
            return $this->registrationErrorResponse($e->getMessage());
        }
    }

    protected function validateRegistrationRequest(Request $request)
    {
        return $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);
    }

    protected function registrationSuccessResponse()
    {
        return redirect()->route('login')->with('success', 'Registration successful. You can now login.');
    }

    protected function registrationErrorResponse($errorMessage)
    {
        return Redirect::back()->withErrors(['error' => $errorMessage])->withInput();
    }
}
