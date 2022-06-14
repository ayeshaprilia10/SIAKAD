<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterDosen implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->get('level') == ''){
            session()->setFlashdata('pesan', 'Anda harus login dulu!!');
            return redirect()->to(base_url('auth'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if(session()->get('level') == 3){
            return redirect()->to(base_url('dsn'));
        }
    }
}