<?php

session_start();

$users = [
    'admin' => '123',
    'empleado' => '456'
];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    
    if (array_key_exists($username, $users)) {
        
        if ($users[$username] === $password) {
            
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            
            
            if ($username === 'admin') {
                $_SESSION['role'] = 'admin';
                header("Location: ../panel.html"); 
                exit();
            } else if ($username == 'empleado') {
                $_SESSION['role'] = 'employee';
                header("Location: ../panel.html"); 
                exit();
            }
        } else {
            
            $_SESSION['error'] = "Usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.";
            header("Location: ../login.html");
            exit();
        }
    } else {
        
        $_SESSION['error'] = "Usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.";
        header("Location: ../login.html");
        exit();
    }
    
} else {
    
    header("Location: ../login.html");
    exit();
}
?>