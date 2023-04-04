<?php


namespace Controllers;

use \Model\Users;

class Admin {
    public static function loginIndex() {
        include 'views/login.php';
    }

    public static function processLogin() {
        $users = new Users;
        
        $user = $users->getRecordsBy([
            'email' => $_POST['email'],
            'password' => md5($_POST['password'])
        ]);

        if(!$user->recordsExists()) {
            $error = [
                'message' => 'User doesnt exists',
                'status' => 'danger'
            ];

            header('Location: ?page=/login&' . http_build_query($error));
            exit;
        }

        $_SESSION['user_id'] = $user->records[0]['id'];
        $_SESSION['user_name'] = $user->records[0]['user_name'];
        
        header('Location: ?page=/');
        exit;
    }

    public static function registerIndex() {
        include 'views/register.php';
    }

    public static function processRegistration() {
       
        $users = new Users;

        if($users->getRecordsBy([
                'email' => $_POST['email'],
                'user_name' => $_POST['username']
            ], 'OR')->recordsExists()) {
            $error = [
                'message' => 'This user already exists',
                'status' => 'danger'
            ];

            header('Location: ?page=register&' . http_build_query($error));
            exit;
        }

        $_POST['password'] = md5($_POST['password']);
            
        $users->addRecord($_POST);

        $error = [
            'message' => 'User successfully registered',
            'status' => 'success'
        ];

        header('Location: ?page=login&' . http_build_query($error));
        exit;
    }
}