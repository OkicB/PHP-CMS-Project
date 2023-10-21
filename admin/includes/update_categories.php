<form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Update Category</label>

                                    <?php

                                    if(isset($_GET['update'])) {

                                        $cat_id = $_GET['update']; // CATCHING IT USING GET FROM URL
                                        
                                        $query = "SELECT * FROM category WHERE cat_id = $cat_id ";
                                        $select_categories_id = mysqli_query($connection, $query);

                                        //LOOP FOR ADDING THE CATEGORIES IN CATEGORIES.PHP PAGE
                                        while($row = mysqli_fetch_assoc($select_categories_id)) {
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];
                                            ?>

                                            <input value="<?php if(isset($cat_title)) {echo $cat_title;} ?>" type="text" class="form-control" name="cat_title"> <!-- IN VALUE WE ARE ECHOING THE VALUE FROM THE TABLE -->
                                        <?php }
                                    }

                                    // UPDATE QUERY
                                    if(isset($_POST['update_category'])) { // USING POST BECAUSE WHEN WE SUBMIT THE FORM WE WANT TO GET THE VALUE THAT WE POSTED
                                        $the_cat_title = $_POST['cat_title']; // cat_title because we are getting the field from top and trying to update it
                                        $query = "UPDATE category SET cat_title = '{$the_cat_title}' WHERE  cat_id = {$cat_id} "; // MAKING A QUERY IN DB TO UPDATE IT IN cat_title column
                                        $update_query = mysqli_query($connection, $query);
                                        if(!$update_query) {
                                            die('QUERY FAILED' . mysqli_error($connection)); //ENDS THIS SCRIPT AND DISPLAYS WHAT IS THE ERROR
                                        }
                                    }
                                    
                                    ?>

                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
                                </div>
                            </form>