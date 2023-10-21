<?php include "includes/header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <h1 class="page-header">
                        Welcome to admin
                        <small>Author</small>
                    </h1>

                    <?php //CHECKS IF SOURCE IS SET, THEN ASSIGNING IT TO A VARIABLE. SO THIS CODE IS DOING THE THING, IF YOU TYPE A source=add_post IN URL, IT WILL DISPLAY THE ECHO FOR add_post CASE
                    if(isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }

                    switch($source) {
                        case 'add_user';
                        include "includes/add_user.php";
                        break;
                        case 'edit_user';
                        include "includes/edit_user.php";
                        break;
                        case '200';
                        echo "nice 200";
                        break;

                        default:
                        include "includes/view_all_users.php";
                        break;
                    }
                    
                    ?>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/footer.php"; ?>