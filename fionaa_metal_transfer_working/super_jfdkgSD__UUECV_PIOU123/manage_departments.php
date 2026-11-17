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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
                    <?php endif; ?>
                    
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
                    <?php endif; ?>
                   
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-uppercase">All Departments</h6>
                            <div>
                                <a href="create_department.php" class="btn btn-primary">Create New Department</a>
                            </div>
                        </div>
                        <hr/>
                        <div class="table-responsive">
          <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                       <th>Gold Weight</th>
                                        <th>Permissions</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $departments = $link->query("SELECT * FROM departments ORDER BY name");
                                    $sr = 1;
                                    while ($dept = $departments->fetch_assoc()): ?>
                                    <tr>
                                        <td><?= $sr++ ?></td>
                                        <td><?= htmlspecialchars($dept['name']) ?></td>

                                        <td><?= htmlspecialchars($dept['use_gold']) ?></td>
                                       
                                        <td>
    <?php
    $roleLabels = [
        '0' => '<span class="badge bg-success">All Orders</span>',
        '1' => '<span class="badge bg-primary">Add Orders</span>',
        '2' => '<span class="badge bg-warning text-dark">Transfer Orders</span>',
        '3' => '<span class="badge bg-warning text-dark">Edit Orders</span>',
        '4' => '<span class="badge bg-warning text-dark">Delete Orders</span>',
        '5' => '<span class="badge bg-warning text-dark">Accept Orders</span>',
        '6' => '<span class="badge bg-success">All Metal</span>',
        '9' => '<span class="badge bg-primary">Add Metal</span>',
        '10' => '<span class="badge bg-warning text-dark">Transfer Metal</span>',
        '7' => '<span class="badge bg-warning text-dark">Edit Metal</span>',
        '8' => '<span class="badge bg-warning text-dark">Delete Metal</span>',
        '11' => '<span class="badge bg-warning text-dark">Accept Metal</span>'
    ];

    $roles = explode(',', $dept['role']); 
    foreach ($roles as $r) {
        if (isset($roleLabels[$r])) {
            echo $roleLabels[$r] . ' ';
        }
    }
    if (!empty($dept['admin']) && $dept['admin'] == '1') {
        echo '<span class="badge bg-dark">Admin</span>';
    } 
   
    ?>
</td>
                                        <td>
                                           <?php if($dept['name']=='Central' || $dept['name']=='Melting' || $dept['name']=='Indutherm melting' || $dept['name']=='Office' || $dept['name']=='Loss' || $dept['name']=='Return'){ ?>
                                            <?php }else{ ?>
                                             <a href="edit_department.php?id=<?= $dept['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                             <a href="javascript:void(0)" onclick="confirmDelete(<?= $dept['id'] ?>)" class="btn btn-sm btn-danger">Delete</a>
                                            <?php } ?>
                                            
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(deptId) {
    if (confirm("Are you sure you want to delete this department?")) {
        window.location.href = "delete_department.php?id=" + deptId;
    }
}

// Initialize DataTable for sorting and exporting
$(document).ready(function() {
    $('#departmentsTable').DataTable({
        dom: 'Bfrtip',
       
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
</script>

<?php include 'include/footer.php'; ?>

<script>
    $(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				  pageLength: -1,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
</script>