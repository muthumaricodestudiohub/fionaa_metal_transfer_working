<?php
session_start();
include("include/connection.php");

if (!isset($_GET['id'])) {
    header("Location: alloy_history.php");
    exit;
}

$id = intval($_GET['id']);
$result = mysqli_query($link, "SELECT * FROM alloy WHERE id=$id");
$alloy = mysqli_fetch_assoc($result);

if (!$alloy) {
    $_SESSION['error'] = "Alloy not found!";
    header("Location: alloy_history.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $percentage = mysqli_real_escape_string($link, $_POST['percentage']);

    $sql = "UPDATE alloy SET name='$name', percentage='$percentage' WHERE id=$id";
    if (mysqli_query($link, $sql)) {
        $_SESSION['success'] = "Alloy updated successfully!";
        header("Location: alloy_history.php");
        exit;
    } else {
        $_SESSION['error'] = "Error updating alloy: " . mysqli_error($link);
    }
}

include 'include/header.php';
?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="col-xl-6 mx-auto">
            <h6 class="mb-0 text-uppercase">Edit Alloy</h6>
            <hr/>
            <div class="card border-top border-0 border-4 border-warning">
                <div class="card-body">
                    <form method="POST">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Alloy Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($alloy['name']) ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Percentage</label>
                            <div class="col-sm-9">
                                <input type="number" step="0.01" name="percentage" class="form-control" value="<?= htmlspecialchars($alloy['percentage']) ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary px-5">Update</button>
                                <a href="alloy_history.php" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>
