<?php


class Pages extends Controller
{
    public function __construct()
    {

    }

    public function home()
    {
        $this->loadView('posts/home');
    }
}