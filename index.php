<?php 
include "include/db.php";
include "include/header.php";

?>

    <!-- Navigation -->
    <?php 
        include "include/nav.php";
    ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                   
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <?php 
                   
                    $query = "SELECT * FROM posts";
                    $select_all_post = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($select_all_post)){
                        $post_title=$row['post_title'];
                        $post_author=$row['post_author'];
                        $post_image=$row['post_image'];
                        $post_date=$row['post_date'];
                        $post_content=$row['post_content'];
                   
                
                ?>
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More 
                    <span class="glyphicon glyphicon-chevron-right"></span>
                
                </a>
                    <?php } ?>
                <hr>




            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php 
                include "include/sidebar.php";
            ?>
            

        </div>
        <!-- /.row -->

        <hr>
<?php
    include "include/footer.php";
?>
