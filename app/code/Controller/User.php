<?php

namespace Controller;

use Core\Controller;
use Helper\FormBuilder;
use Model\User as UserModel;
use Core\Request;
class User extends Controller
{
    public function index()
    {
        echo 'user index';
    }

    public function registration()
    {
        $form = new FormBuilder('post', BASE_URL.'/user/create');
        $form->input('name', 'text', '', 'Username','','','');
        $form->input('email', 'email', '', 'Email','','','');
        $form->input('password', 'password', '', '******','','','');
        $form->input('password2', 'password', '', '******','','','');
        $form->input('register', 'submit', 'Register', '','','','');
        $this->render('user/register', ['form' => $form->get()]);
    }

    public function login()
    {
        $this->render('user/login', []);
    }

    public function create()
    {
        $request = new Request();
        $user = new UserModel();
        $user->setUserName($request->getPost('name'));
        $user->setEmail($request->getPost('email'));
        $user->setPassword($request->getPost('password'));
        $user->save();
    }

}