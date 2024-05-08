<?php

namespace App\Milay\Controller;

use App\Milay\Config\View;
use Symfony\Component\HttpFoundation\Request;

class CommandeController
{
    public function index()
    {
        return View::render('admin/pages/commande/index');
    }

    public function show()
    {
        print("detail");
    }

    public function store(Request $request)
    {
        // Your store method code here
    }

    public function update(Request $request, $id)
    {
        // Your update method code here
    }

    public function delete($id)
    {
        // Your delete method code here
    }
}