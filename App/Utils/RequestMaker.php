<?php
namespace App\Milay\Utils;
use Symfony\Component\HttpFoundation\Request;

class RequestMaker
{
    protected $request;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
    }

    public function post()
    {
        return $this->request->request->all();
    }

    public function files()
    {
        return $this->request->files->all();
    }
}

?>
