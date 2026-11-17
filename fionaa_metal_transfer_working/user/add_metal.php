<?php
session_start();
include("include/connection.php");
$current_time = date("M d, Y H:i:s");

// Check UUID cookie
if (isset($_COOKIE['uuid'])) {
    $uuid_cookie = mysqli_real_escape_string($link, $_COOKIE['uuid']);
} else {
    $uuid_cookie = '';
}

// Validate user session
$sql4 = "SELECT * FROM ods WHERE uuid='$uuid_cookie' AND status='verified'";
$result4 = mysqli_query($link, $sql4);

if ($result4 && mysqli_num_rows($result4) > 0) {
    $row4 = mysqli_fetch_assoc($result4);
    $user_id = mysqli_real_escape_string($link, $row4['user_id']);
} else {
    header("location:logout.php");
    exit;
}

$sql47 = "SELECT * FROM users WHERE userid='$user_id'";
$result47 = mysqli_query($link, $sql47);
if ($result47 && $result47->num_rows > 0) {
     $row47 = $result47->fetch_assoc();
     $department_id = mysqli_real_escape_string($link, $row47['department_id']);
} 

// Handle new order
if (isset($_POST['add_order'])) {
    $gold_weight = $_POST['gold_weight'];
    $notes = $_POST['notes'];
     $gold_touch = $_POST['gold_touch'];
    mysqli_query($link,"INSERT INTO `metal_tracking`(`weight`, `to_dept`,`notes`, `from_dept`,`status`,`touch`) VALUES('$gold_weight','$department_id','$notes','$department_id','1','$gold_touch')");
    
     $sql_to = "SELECT use_gold FROM departments WHERE id='$department_id'";
        $res_to = mysqli_query($link, $sql_to);
        if ($res_to && $res_to->num_rows > 0) {
            $row_to = $res_to->fetch_assoc();
            $to_use_gold = $row_to['use_gold'] + $gold_weight;
            mysqli_query($link, "UPDATE departments SET use_gold='$to_use_gold' WHERE id='$department_id'");
        }
    
   $success = "Metal added successfully.";

}
?>

<?php include('include/header.php'); ?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <main>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Add New Metal</h1>
                </div>

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <?php if (isset($success)): ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            <!--<div class="mb-3">-->
                            <!--    <label for="order_id" class="form-label">Order id</label>-->
                            <!--    <div class="input-group">-->
                            <!--        <input type="text" class="form-control" id="order_id" name="order_id" autofocus  placeholder="Scan or Enter Order ID" required>-->
                                    
                            <!--    </div>-->
                            <!--</div>-->
                            <!-- Notes -->
                        <div class="mb-3">
                            <label><strong>Notes:</strong></label>
                            <textarea name="notes" class="form-control" placeholder="Enter transfer notes"></textarea>
                        </div>
                            <div class="mb-3">
                                <label for="gold_weight" class="form-label">Gold Weight (grams)</label>
                                <input type="number" step="0.01" class="form-control" id="gold_weight" name="gold_weight" placeholder="Enter Gold Weight" required>
                            </div>
                             <div class="mb-3">
                                <label for="gold_touch" class="form-label">Gold Touch (%)</label>
                                <input type="number" step="0.01" class="form-control" id="gold_touch" name="gold_touch" placeholder="Enter Gold touch (99.5)" required>
                            </div>
                            <!--<div class="mb-3">-->
                            <!--    <label for="pieces" class="form-label">Order pieces</label>-->
                            <!--    <input type="number" class="form-control" id="pieces" name="pieces" placeholder="Enter Number of Pieces" min="1" required>-->
                            <!--</div>-->
                            <button type="submit" name="add_order" class="btn btn-primary">Add Metal</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<!-- Barcode Scanner Modal -->
<div class="modal fade" id="scanModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Scan Order ID</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="reader" style="width:100%;"></div>
      </div>
    </div>
  </div>
</div>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
let html5QrCode;

function startScanner() {
    html5QrCode = new Html5Qrcode("reader");
    const qrConfig = { fps: 10, qrbox: { width: 250, height: 250 } };

    html5QrCode.start({ facingMode: "environment" }, qrConfig, qrCodeMessage => {
        console.log("Scanned result:", qrCodeMessage);
        document.getElementById("order_id").value = qrCodeMessage;

        // Stop scanner after success
        html5QrCode.stop().then(() => {
            console.log("Camera stopped after scan.");
            let modalEl = document.getElementById('scanModal');
            let modal = bootstrap.Modal.getInstance(modalEl);
            modal.hide();
        }).catch(err => {
            console.error("Stop failed:", err);
        });

    }).catch(err => {
        console.error("Unable to start scanning:", err);
    });
}

// Start scanner when modal opens
document.getElementById('scanModal').addEventListener('shown.bs.modal', startScanner);

// Stop scanner if modal closed without scanning
document.getElementById('scanModal').addEventListener('hidden.bs.modal', () => {
    if (html5QrCode) {
        html5QrCode.stop().then(() => {
            console.log("Camera stopped on modal close.");
        }).catch(err => {
            console.error("Stop failed:", err);
        });
    }
});
</script>

<?php include('include/footer.php'); ?>
