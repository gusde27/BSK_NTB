<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class LoginFilter implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        if (session()->get('level') == 'admin') {
            return redirect()->back();
        } elseif (session()->get('level') == 'pts') {
            return redirect()->back();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response)
    {
    }
}
