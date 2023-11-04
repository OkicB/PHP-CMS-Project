<?php include "db.php"; ?>

<?php session_start(); ?>

<?php 
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);

    if(!$select_user_query) {
        die("QUERY FAILED". mysqli_error($connection));
    }

    //Looping through the users and displaying the user that is logged in
    while($row = mysqli_fetch_array($select_user_query)) {
        $db_id = $row['user_id'];
        $db_username = $row['username'];
        $db_password = $row['user_password'];
        $db_firstname = $row['user_firstname'];
        $db_lastname = $row['user_lastname'];
        $db_role = $row['user_role'];
    }

    //crypt func when finishes converting it will turn password to the first one that user created, it won't take the random or default enc pass
    //otherwise it will not allow login, as it will recognize that enc pass as appropriate pass, not the one user created
    $password = crypt($password, $db_password);

    //validation
    if($username === $db_username && $password === $db_password) {
        //value that we are bringing from db, we assign it to a session called username
        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_firstname;
        $_SESSION['lastname'] = $db_lastname;
        $_SESSION['user_role'] = $db_role;

        header("Location: ../admin");
        echo "correct login";
    } else {
        header("Location: ../index.php");
    }
}

?>