<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Content</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $query = "SELECT * FROM comments";
                            $select_comments = mysqli_query($connection, $query);

                            //LOOP FOR ADDING THE CATEGORIES IN CATEGORIES.PHP PAGE
                            while($row = mysqli_fetch_assoc($select_comments)) {
                                $comment_post_id = $row['comment_post_id'];
                                $comment_author = $row['comment_author'];
                                $comment_content = $row['comment_content'];
                                $comment_email = $row['comment_email'];
                                $comment_status = $row['comment_status'];
                                $comment_date = $row['comment_date'];

                                echo "<tr>";
                                echo "<td>{$comment_post_id}</td>";
                                echo "<td>{$comment_author}</td>";
                                echo "<td>{$comment_content}</td>";
                                echo "<td>{$comment_email}</td>";
                                echo "<td>{$comment_status}</td>";
                                echo "<td>{$comment_date}</td>";
                                echo "<td><a href='comments.php?delete={$comment_post_id}'>Delete</a></td>";
                                echo "</tr>";
                            }
                            
                            ?>
                            
                        </tbody>
                    </table>

                    <?php
                    
                    //ADDING DELETING OPTION
                    if(isset($_GET['delete'])) {
                        $the_comment_id = $_GET['delete'];
                        $query = "DELETE FROM comments WHERE comment_post_id = {$the_comment_id}";
                        $delete_query = mysqli_query($connection, $query);
                    }
                    
                    ?>