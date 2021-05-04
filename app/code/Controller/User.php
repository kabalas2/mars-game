<?php

namespace Controller;

use Core\Controller;
use Helper\FormBuilder;
use Helper\Url;
use Model\User as UserModel;
use Core\Request;
use Helper\Validation\InputValidation as Validation;

class User extends Controller
{
    public function index()
    {
        echo 'user index';
    }

    public function registration()
    {
        $form = new FormBuilder('post', Url::make('/user/create'));
        $form->input('name', 'text', '', 'Username');
        $form->input('email', 'email', '', 'Email');
        $form->input('password', 'password', '', '******');
        $form->input('password2', 'password', '', '******');
        $form->input('register', 'submit', 'Register');
        $this->render('user/register', ['form' => $form->get()]);
    }

    public function login()
    {
        $form = new FormBuilder('post', Url::make('/user/check'));
        $form->input('email', 'email', '', 'Email');
        $form->input('password', 'password', '', '******');
        $form->input('login', 'submit', 'Login');
        $this->render('user/login', ['form' => $form->get()]);
    }


    public function create()
    {
        $request = new Request();
        $user = new UserModel();
        $email = $request->getPost('email');
        $password = $request->getPost('password');
        $password2 = $request->getPost('password2');

        if (
            !Validation::isEmailValid($email) &&
            !Validation::isPasswordValid($password, $password2)
        ) {
            Url::redirect(Url::make('/user/registration'));
        }

        $user->setUserName($request->getPost('name'));
        $user->setEmail($email);
        $user->setPassword($password);
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
        } else {
            Url::redirect(Url::make('/user/login'));
        }
    }

    public function logout()
    {
        session_destroy();
    }

    public function edit($id)
    {
        $user = new UserModel();
        $user->load($id);
        $form = new FormBuilder('post', Url::make('user/update'));
        $form->input('name', 'text', $user->getUserName())
            ->input('email', 'email', $user->getEmail())
            ->input('password', 'password', '', 'New Password')
            ->input('password2', 'password', '', 'Repeat new Password')
            ->input('id', 'hidden', $user->getId())
            ->input('save', 'submit', 'Save');
        $this->render('user/update', ['form' => $form->get()]);
    }

    public function update()
    {
        $request = new Request();

        $user = new UserModel();
        $user->load($request->getPost('id'));
        $user->setUserName($request->getPost('name'));
        $user->setEmail($request->getPost('email'));
        if ($request->getPost('password')) {
            $user->setPassword($request->getPost('password'));
        }

        $user->save();
        Url::redirect(Url::make('/user/edit/' . $user->getId()));
    }

}

