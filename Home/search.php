<?php
session_start();
include "db_conn.php";

$connection = mysqli_connect("localhost", "root", "", "book_t");

if (isset($_POST['submit'])) {
    header("Location: ../Login/index.php")
    // $str = $_POST["text"];
    // $sth = $connection->prepare("select * from books where title = ?");
    // $sth->bind_param("s", $str);
    // $sth->execute();
    // $result = $sth->get_result();

    // if ($row = $result->fetch_object()) {
    //     ?>
    <!-- //     <div class="row6">
    //         <div class="row<?php echo $row->id; ?>">
    //             <img src="./Assets/<?php echo $row->cover; ?>" alt="">
    //             <p><b><?php echo $row->title; ?></b></p>
    //             <p><i>Author: <?php echo $row->author_id; ?></i></p>
    //             <p><?php echo $row->short_desc; ?></p>
    //             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row->id; ?>" id="<?php echo $row->id; ?>" 
    //             onclick="showDetails(this);">Review</button>
    //         </div>
    //     </div>
    //     <div class="modal fade" id="exampleModal<?php echo $row->id; ?>">
    //         <div class="modal-dialog modal-lg modal-dialog-scrollable" style="height: 300px">
    //             <div class="modal-content">
    //                 <!-- Modal content... -->
    <!-- //                 <div class="modal-header bg-warning-subtle">
    //                     <h3 class="modal-title" fs-5 id="exampleModalLabel"><?php echo $row->title; ?></h3>
    //                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    //                 </div>
    //                 <div class="modal-body bg-success-subtle border border-dark">
    //                     <p><?php echo $row->description; ?></p>
    //                 </div>
    //                 <div class="modal-footer bg-warning-subtle">
    //                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
    //                     <button type="button" class="btn btn-success">Save</button>
    //                 </div>
    //             </div>
    //         </div>
    //     </div>
        // <?php
    // } else {
    //     echo "Name does not exist";
    // }
}
?>  
