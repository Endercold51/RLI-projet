<?php

class logincontroller {
    public function showloginform() {
        include '../views/login.php';
    }
    public function handlelogin() {
        // on check le login via les identifiants passés dans le formulaire
       // var_dump($_POST);

        // if login et mdp bons, entrer l'user loggé en $_SESSION

        // une fois l'action de login faite rediriger vers index 

        // if ($this->validatecredentials()) {
        //     session_start();
        //     $_SESSION['user_id'] = $userId;
        //     $_SESSION['role'] = 'user';
        //     header('location: index.php?page=main');
        //     exit();
        // } else {

        // }

        //Variable qui va stocker les message d'erreurs
$message ="";

//La fonction POST permet de récupérer les valeurs (pseudo ou mdp)
$pseudo =  isset($_POST['pseudo']) ? $_POST['pseudo'] : '';
$mdp = isset($_POST['mdp']) ? $_POST['mdp'] : '';
//Vérification que les champs ne soit pas vide

if (empty($pseudo) || empty($mdp)) {
    $message = "///";
} else {
    //Va permettre la connexion à la BDD
    $conn = new mysqli('mysql-container-rli', 'root', 'rootpassword', 'ma_base_de_données');
    if ($conn->connect_error) {
        die("échec de la connexion à la BDD : " .$conn->connect_error);
    }
    // Protection contre les injections de code SQL
    $pseudo = $conn->real_escape_string($pseudo);
    $mdp = $conn->real_escape_string($mdp);

    //Vérification des infos de l'utilisateur
    $sql = "SELECT * FROM utilisateurs WHERE username = '$pseudo' AND password = '$mdp'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0){
        session_start();
        $_SESSION['pseudo'] = $pseudo;
        header('Location: /');
        exit();
    } else {
        $message = "Username ou mdp incorrecte";
        echo $message;
    }
    $conn->close();

}
    }
    private function validatecredentials() {
        return true;
    }

    
    
}

