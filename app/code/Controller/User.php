<?php

namespace Controller;

use Core\Controller;
use Helper\FormBuilder;
use Helper\Url;
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
        $form = new FormBuilder('post', Url::make('/user/create'));
        $form->input('name', 'text', '', 'Username', '', '', '');
        $form->input('email', 'email', '', 'Email', '', '', '');
        $form->input('password', 'password', '', '******', '', '', '');
        $form->input('password2', 'password', '', '******', '', '', '');
        $form->input('register', 'submit', 'Register', '', '', '', '');
        $this->render('user/register', ['form' => $form->get()]);
    }

    public function login()
    {
        $form = new FormBuilder('post', Url::make('/user/check'));
        $form->input('email', 'email', '', 'Email', '', '', '');
        $form->input('password', 'password', '', '******', '', '', '');
        $form->input('login', 'submit', 'Login', '', '', '', '');
        $this->render('user/login', ['form' => $form->get()]);
    }


    public function create()
    {
        $request = new Request();
        $user = new UserModel();
        if(!UserModel::isEmailUnic($request->getPost('email'))){
            Url::redirect(Url::make('/user/registration'));
        }
        $user->setUserName($request->getPost('name'));
        $user->setEmail($request->getPost('email'));
        $user->setPassword($request->getPost('password'));
        $user->save();
    }

    public function load($id)
    {
        $user = new UserModel();
        $user->load($id);
    }

    public function check()
    {
        $reques = new Request();
        $email = $reques->getPost('email');
        $password = $reques->getPost('password');
        if (UserModel::isValidLoginCredentionals($email, $password)) {
            Url::redirect(Url::make('/map'));
        }else{
            Url::redirect(Url::make('/user/login'));
        }

    }

}