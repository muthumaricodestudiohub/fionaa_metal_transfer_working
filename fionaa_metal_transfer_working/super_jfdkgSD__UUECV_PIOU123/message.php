<?php
session_start();
include("include/connection.php");

$u_uname = '';
if (isset($_COOKIE['auth_token'])) {
    $u_uname = $_COOKIE['auth_token'];
} else {
    header("location:index.php");
}
include 'include/header.php';

// $id = $_GET['id']; 

// Department list laa rahe hai dropdown ke liye
$departments = $link->query("SELECT id, name FROM departments ORDER BY name ASC");
?>
  

<div class="page-wrapper">
    <div class="page-content">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['success']; unset($_SESSION['success']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body">
                        <h6 class="mb-0 text-uppercase">Send Note</h6>
                        <hr/>
<form action="message_action.php" method="POST">
    <!-- Sender dropdown -->
  

    <!-- Receiver dropdown -->
    <div class="mb-3">
        <label class="form-label">Receiver Department</label>
        <select name="receiver_dept_id" class="form-control" required>
            <option value="">-- Select Department /  All Department --</option>

            <?php 
            $departments->data_seek(0); // reset pointer again
            while($dept = $departments->fetch_assoc()): ?>
                <option value="<?= $dept['id'] ?>"><?= htmlspecialchars($dept['name']) ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <!-- Note textarea -->
    <div class="mb-3">
        <label class="form-label">Note</label>
        <textarea name="note" class="form-control" rows="5" placeholder="Enter your note here..." required></textarea>
    </div>

    <div class="d-flex">
        <button type="submit" class="btn btn-primary px-5">Submit</button>
        <a href="index.php" class="btn btn-secondary ms-2">Cancel</a>
    </div>
</form>

                    </div>
                </div>
            </div>


              




        </div>
    





<!-- 
<div class="page-wrapper">
    <div class="page-content">
 -->






      <!--   </div>
    </div> -->

</div>
  </div>
</div>


<?php include 'include/footer.php'; ?>

