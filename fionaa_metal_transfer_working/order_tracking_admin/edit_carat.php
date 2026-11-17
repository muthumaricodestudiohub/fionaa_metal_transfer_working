<?php
session_start();
include("include/connection.php");

if (!isset($_GET['id'])) {
    header("Location: all_carat.php");
    exit;
}

$id = intval($_GET['id']);
$result = mysqli_query($link, "SELECT * FROM carat WHERE id=$id");
$carat = mysqli_fetch_assoc($result);

if (!$carat) {
    $_SESSION['error'] = "Carat not found!";
    header("Location: all_carat.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $percentage = mysqli_real_escape_string($link, $_POST['percentage']);

    $sql = "UPDATE carat SET name='$name', percentage='$percentage' WHERE id=$id";
    if (mysqli_query($link, $sql)) {
        $_SESSION['success'] = "Carat updated successfully!";
        header("Location: all_carat.php");
        exit;
    } else {
        $_SESSION['error'] = "Error updating carat: " . mysqli_error($link);
    }
}

include 'include/header.php';
?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="col-xl-6 mx-auto">
            <h6 class="mb-0 text-uppercase">Edit Carat</h6>
            <hr/>
            <div class="card border-top border-0 border-4 border-warning">
                <div class="card-body">
                    <form method="POST">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Carat Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" 
                                       value="<?= htmlspecialchars($carat['name']) ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Percentage</label>
                            <div class="col-sm-9">
                                <input type="number" step="0.01" name="percentage" class="form-control" 
                                       value="<?= htmlspecialchars($carat['percentage']) ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary px-5">Update</button>
                                <a href="all_carat.php" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>
