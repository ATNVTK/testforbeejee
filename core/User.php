<?php


namespace core;


class User
{
    public $name;
    public $isGuest;

    public function __construct()
    {
        session_start();
        if (isset($_SESSION['user']))
        {
            $this->name = $_SESSION['user'];
            $this->isGuest = false;
        }
        else
        {
            $this->name = null;
            $this->isGuest = true;
        }
    }
}