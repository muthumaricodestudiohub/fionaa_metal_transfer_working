<?php
session_start();
include("include/connection.php");

if (!isset($_COOKIE['auth_token'])) {
    header("location:index.php");
    exit();
}

include 'include/header.php';




// Fetch backup files from the database
$backups = $link->query("SELECT * FROM backup ORDER BY date DESC
");
?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-uppercase">Backup Files History</h6>
                            <form method="post" action="backup.php">
                                <button type="submit" name="backup" class="btn btn-primary">
                                    <i class="fas fa-database me-1"></i> Create New Backup
                                </button>
                            </form>
                        </div>
                        <hr/>

                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Backup File Name</th>
                                        <th>Created Date</th>
                                        <!--<th>Actions</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $sr = 1;
                                    while ($backup = $backups->fetch_assoc()):
                                    ?>
                                    <tr>
                                        <td><?= $sr++ ?></td>
                                        <td><?= htmlspecialchars($backup['sql_name']) ?></td>
                                        <td>
                                            <?php 
                                            if (!empty($backup['date'])) {
                                                echo date('d M Y H:i', strtotime($backup['date']));
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </td>
                                        <!--<td> -->
                                          <!--  <a href="cron/<?= htmlspecialchars($backup['sql_name']) ?>"  class="btn btn-sm btn-primary"  download> -->
                                               <!--<i class="fas fa-download me-1"></i> Download -->
                                         <!--   </a> -->
                                            <!--<button class="btn btn-sm btn-danger" -->
                                            <!--        onclick="confirmDelete('<?= htmlspecialchars($backup['sql_name']) ?>', <?= $backup['id'] ?>)">-->
                                            <!--    <i class="fas fa-trash me-1"></i> Delete-->
                                            <!--</button>-->
                                      <!--  </td> -->
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



<?php include 'include/footer.php'; ?>
<script>
    $(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
</script>
