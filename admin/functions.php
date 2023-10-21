<?php

function confirmQuery($result) {
    global $connection;

    if(!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}

function insert_categories() {

    global $connection;

    if(isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        if($cat_title == "" || empty($cat_title)) {
            echo "Cannot be empty";
        } else {
            $query = "INSERT INTO category(cat_title) ";
            $query .= "VALUE('{$cat_title}') "; //PUTS VALUE INTO DB table and it's column field

            $create_cat_query = mysqli_query($connection, $query); //SENDS QUERY TO THE DB WITH THE INFORMATION THAT IT TOOK

            if(!$create_cat_query) {
                die('QUERY FAILED' . mysqli_error($connection)); //ENDS THIS SCRIPT AND DISPLAYS WHAT IS THE ERROR
            }
        }
    }
}


function findAllCategories() {

    global $connection;

    $query = "SELECT * FROM category";
    $select_categories = mysqli_query($connection, $query);

    //LOOP FOR ADDING THE CATEGORIES IN CATEGORIES.PHP PAGE
    while($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?update={$cat_id}'>Update</a></td>";
        echo "</tr>";
    }
}

function deleteCategories() {
    global $connection;
    // DELETE QUERY
    if(isset($_GET['delete'])) { // CHECKING THE DELETE KEY THAT IS UP THERE IN A HREF TAG
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM category WHERE  cat_id = {$the_cat_id} "; // AFTER IT TAKES IT FROM LINK USING GET, THEN MAKE A QUERY IN DB
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php"); // REFRESHES THE PAGE WHEN IT CLICKS BECAUSE WITHOUT THIS IT WON'T DELETE IT AFTER FIRST CLICK BECAUSE IT NEEDS TO REFRESH THE PAGE
    }
}

?>