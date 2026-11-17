<?php
session_start();
include("include/connection.php");

// Authentication check
if (!isset($_COOKIE['auth_token'])) {
    header("location:index.php");
    exit();
}

include 'include/header.php';
?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <form action="validation/add_department.php" method="POST" onsubmit="combinePermissions()">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body">
                            <h6 class="mb-0 text-uppercase">Create New Department</h6>
                            <hr/>
                            <div class="border p-4 rounded">
                                
                                <!-- Department Name -->
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Department Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" placeholder="Enter department name" required>
                                    </div>
                                </div>


                                <!--<div class="row mb-3">-->
                                <!--    <label class="col-sm-3 col-form-label">Melting Value</label>-->
                                <!--    <div class="col-sm-9">-->
                                <!--        <input type="text" name="melting_value" class="form-control" placeholder="Enter Melting Value" required>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <!--<div class="row mb-3">-->
                                <!--    <label class="col-sm-3 col-form-label">Gold Weight</label>-->
                                <!--    <div class="col-sm-9">-->
                                <!--        <input type="number" name="gold_weight" step="0.01" class="form-control" placeholder="Enter gold weight" required>-->
                                <!--    </div>-->
                                <!--</div>-->


                                <!-- Permissions -->
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Permissions</label>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="0" id="perm_all">
                                            <label class="form-check-label" for="perm_all">All Orders</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="1" id="perm_add">
                                            <label class="form-check-label" for="perm_add">Add Orders</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="2" id="perm_transfer">
                                            <label class="form-check-label" for="perm_transfer">Transfer Orders</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="3" id="perm_transfer">
                                            <label class="form-check-label" for="perm_transfer">Edit Orders</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="4" id="perm_transfer">
                                            <label class="form-check-label" for="perm_transfer">Delete Orders</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="5" id="perm_transfer">
                                            <label class="form-check-label" for="perm_transfer">Accept Orders</label>
                                        </div>
                                        
                                        
                                        <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="6" id="perm_all">
                                            <label class="form-check-label" for="perm_all">All Metal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="9" id="perm_add">
                                            <label class="form-check-label" for="perm_add">Add Metal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="10" id="perm_transfer">
                                            <label class="form-check-label" for="perm_transfer">Transfer Metal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="7" id="perm_transfer">
                                            <label class="form-check-label" for="perm_transfer">Edit Metal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="8" id="perm_transfer">
                                            <label class="form-check-label" for="perm_transfer">Delete Metal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input perm-check" type="checkbox" value="11" id="perm_transfer">
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
                                        <div class="form-check"> 
                                        <input type="hidden" name="admin_perm_add" value="0">

    <!-- actual checkbox -->
    <input class="form-check-input admin_perm-check" 
           type="checkbox" 
           name="admin_perm_add" 
           value="1" 
           id="admin_perm_add">
                                            <!--<input class="form-check-input admin_perm-check" type="checkbox" value="1" id="admin_perm_add">-->
                                            <label class="form-check-label" for="admin_perm_add">Admin</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Hidden input for combined values -->
                                <input type="hidden" name="admin_permissions" id="admin_permissions_input">

                                

                                <!-- Buttons -->
                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary px-5">Create Department</button>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="manage_departments.php" class="btn btn-secondary px-5">View Departments</a>
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
    // Normal Permissions
    let selected = [];
    document.querySelectorAll('.perm-check:checked').forEach(cb => {
        selected.push(cb.value);
    });
    document.getElementById('permissions_input').value = selected.join(',');

    // Admin Permissions
    let adminSelected = [];
    document.querySelectorAll('.admin_perm-check:checked').forEach(cb => {
        adminSelected.push(cb.value);
    });
    document.getElementById('admin_permissions_input').value = adminSelected.join(',');
        let adminCheckbox = document.getElementById('admin_perm_add');

        document.getElementById('admin_permissions_input').value = adminCheckbox.checked ? "1" : "0";

}

</script>

<?php include 'include/footer.php'; ?>
