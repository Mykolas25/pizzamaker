<?php
/**
 * Created by PhpStorm.
 * User: Mykolas
 * Date: 5/15/2017
 * Time: 1:47 PM
 */

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;

class DTAuthController extends Controller
{

//show registration form

    public function showRegistrationForm()
    {
        return view('auth.register');
    }



}