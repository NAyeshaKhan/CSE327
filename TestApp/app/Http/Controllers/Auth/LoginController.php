<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
class LoginController extends Controller
{
  
    use AuthenticatesUsers;
    
    protected $redirectTo;
    public function redirectTo()
    {
        switch(Auth::user()->role){
            case 'admin':
				$this->redirectTo = '/admin';
				return $this->redirectTo;
					break;
            case 'player':
					$this->redirectTo = '/player';
					return $this->redirectTo;
					break;
            case 'scout':
					$this->redirectTo = '/scout';
					return $this->redirectTo;
					break;
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
        }
         
        // return $next($request);
    } 
    
}