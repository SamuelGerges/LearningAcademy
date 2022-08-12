<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{

    use GeneralTrait;
    public function Login(Request $request)
    {
        try {
            //  TODO::Validate Inputs From Admin
            $rules = [
                "email" => 'required|email|exists:admins,email|max:100|',
                "password" => "required"

            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }
            //  TODO::login
            $credentials = $request->only(['email', 'password']);
            $token = Auth::guard('admin_api')->attempt($credentials);
            if (!$token)
                return $this->returnError('E001','The Data not Found');
//            $admin = Auth::guard('admin_api')->user();
//            $admin->api_token = $token;

            //return token
            return $this->returnData('admin', $token);
        }catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }


    }
    public function Logout()
    {
        auth()->guard('admin')->logout();
        return redirect(route('admin.auth.login'));
    }




}
