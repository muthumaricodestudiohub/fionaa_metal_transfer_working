<?php
session_start();
include("include/connection.php");

// Authentication check
if (!isset($_COOKIE['auth_token'])) {
    header("location:index.php");
    exit();
}

// Get department ID from query string
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("location:manage_departments.php");
    exit();
}

$dept_id = intval($_GET['id']);

// Fetch department data
$stmt = $link->prepare("SELECT * FROM departments WHERE id = ?");
$stmt->bind_param("i", $dept_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("location:manage_departments.php");
    exit();
}

$dept = $result->fetch_assoc();
$permissions = explode(',', $dept['role']); // Permissions stored as CSV

// Fetch all departments for dropdown
$deptList = [];
$dResult = $link->query("SELECT id, name,melting_value FROM departments WHERE id='$dept_id' ORDER BY name ASC");
while ($row = $dResult->fetch_assoc()) {
    $deptList[] = $row;
}

include 'include/header.php';
?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <form action="validation/update_department.php" method="POST" onsubmit="combinePermissions()">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($dept_id) ?>">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body">
                               <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
                    <?php endif; ?>
                    
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
                    <?php endif; ?>
                   
                            <h6 class="mb-0 text-uppercase">Edit Department</h6>
                            <hr/>
                            <div class="border p-4 rounded">
                                
                                <!-- Department Name Dropdown -->
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Department Name</label>
                                    <div class="col-sm-9">
                                        <select name="name" class="form-control" required>
                                            <option value="">-- Select Department --</option>
                                            <?php foreach ($deptList as $d): ?>
                                                <option value="<?= htmlspecialchars($d['name']) ?>"
                                                    <?= ($d['name'] == $dept['name']) ? 'selected' : '' ?>>
                                                    <?= htmlspecialchars($d['name']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- Permissions -->
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Permissions</label>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="0" id="perm_all"
                                                <?= in_array("0", $permissions) ? "checked" : "" ?>>
                                            <label class="form-check-label" for="perm_all">All Orders</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="1" id="perm_add"
                                                <?= in_array("1", $permissions) ? "checked" : "" ?>>
                                            <label class="form-check-label" for="perm_add">Add Orders</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="2" id="perm_transfer"
                                                <?= in_array("2", $permissions) ? "checked" : "" ?>>
                                            <label class="form-check-label" for="perm_transfer">Transfer Orders</label>
                                        </div>
                                         <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="3" id="perm_transfer"
                                            <?= in_array("3", $permissions) ? "checked" : "" ?>>
                                            <label class="form-check-label" for="perm_transfer">Edit Orders</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="4" id="perm_transfer"
                                            <?= in_array("4", $permissions) ? "checked" : "" ?>>
                                            <label class="form-check-label" for="perm_transfer">Delete Orders</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="5" id="perm_transfer"
                                            <?= in_array("5", $permissions) ? "checked" : "" ?>>
                                            <label class="form-check-label" for="perm_transfer">Accept Orders</label>
                                        </div>
                                        
                                        
                                        
                                        
                                        <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="6" id="perm_all"
                                                <?= in_array("6", $permissions) ? "checked" : "" ?>>
                                            <label class="form-check-label" for="perm_all">All Metal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="9" id="perm_add"
                                                <?= in_array("9", $permissions) ? "checked" : "" ?>>
                                            <label class="form-check-label" for="perm_add">Add Metal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="10" id="perm_transfer"
                                                <?= in_array("10", $permissions) ? "checked" : "" ?>>
                                            <label class="form-check-label" for="perm_transfer">Transfer Metal</label>
                                        </div>
                                         <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="7" id="perm_transfer"
                                            <?= in_array("7", $permissions) ? "checked" : "" ?>>
                                            <label class="form-check-label" for="perm_transfer">Edit Metal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="8" id="perm_transfer"
                                            <?= in_array("8", $permissions) ? "checked" : "" ?>>
                                            <label class="form-check-label" for="perm_transfer">Delete Metal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="11" id="perm_transfer"
                                            <?= in_array("11", $permissions) ? "checked" : "" ?>>
                                            <label class="form-check-label" for="perm_transfer">Accept Metal</label>
                                        </div>
                                        
                                        
                                        
                                    </div>
                                </div>

                                <!-- Hidden input for combined values -->
                                <input type="hidden" name="permissions" id="permissions_input">
                                
                                  <!-- Permissions -->
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Admin Permissions</label>
                                    <div class="col-sm-9">
                                        <!--<div class="form-check">-->
                                        <!--    <input class="form-check-input admin_perm-check" type="checkbox" value="0" id="admin_perm_all">-->
                                        <!--    <label class="form-check-label" for="admin_perm_all">Not Admin</label>-->
                                        <!--</div>-->
                                        <!--<div class="form-check">-->
                                        <!--    <input class="form-check-input admin_perm-check" type="checkbox" value="1" id="admin_perm_add"-->
                                        <!--       <?= ($dept['admin'] == 1) ? "checked" : "" ?>>-->
                                        <!--    <label class="form-check-label" for="admin_perm_add">Admin</label>-->
                                        <!--</div>-->
                                        <div class="form-check">
    <input class="form-check-input admin_perm-check"
           type="checkbox"
           id="admin_perm_add"
           <?= ($dept['admin'] == 1) ? "checked" : "" ?>>
    <label class="form-check-label" for="admin_perm_add">Admin</label>
</div>
                                    </div>
                                </div>
                                <!-- Hidden input for combined values -->
                                <!--<input type="hidden" name="admin_permissions" id="admin_permissions_input">-->
<input type="hidden" name="admin_permissions" id="admin_permissions_input" 
       value="<?= ($dept['admin'] == 1) ? "1" : "0" ?>">
                                

                                <!-- Buttons -->
                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary px-5">Submit</button>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="manage_departments.php" class="btn btn-secondary px-5">Cancel</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function combinePermissions() {
    // collect normal permissions
    let selected = [];
    document.querySelectorAll('.perm-check:checked').forEach(cb => {
        selected.push(cb.value);
    });
    document.getElementById('permissions_input').value = selected.join(',');

    // collect admin permission separately (1 if checked else 0)
    let adminCheckbox = document.getElementById('admin_perm_add');
    document.getElementById('admin_permissions_input').value = adminCheckbox.checked ? "1" : "0";
}

</script>

<?php include 'include/footer.php'; ?>
