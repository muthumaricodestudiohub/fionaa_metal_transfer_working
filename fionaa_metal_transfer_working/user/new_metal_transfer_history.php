<?php
session_start();
include("include/connection.php");

// ✅ Get user department from UUID
if (isset($_COOKIE['uuid'])) {
    $uuid_cookie = mysqli_real_escape_string($link, $_COOKIE['uuid']);
} else {
    header("location:logout.php");
    exit;
}

// Validate user
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
} else {
    header("location:logout.php");
    exit;
}

include("include/header.php");
?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="col-xl-12 mx-auto">
            <h6 class="mb-0 text-uppercase">Metal Transfer History</h6>
            <hr/>

            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">

                    <div class="table-responsive">
                       <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr. no</th>
                                    <th>Weight</th>
                                    <th>Touch</th>
                                    <th>From Department</th>
                                    <th>To Department</th>
                                    <th>Note</th>
                                    <th>Entry Details</th>
                                    <th>Alloy Details</th>
                                    <th>Status</th>
                                    <th>Transferred At</th>
                                    <th>Received At</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
$sr = 1;

// ✅ Fetch metal transfers with department names and related master entries
$sql = "
SELECT mt.id AS tracking_id, mt.weight, mt.touch, mt.notes AS mt_note, mt.status, mt.date AS transferred_at, mt.success_at AS received_at,
       df.name AS from_dept_name, dt.name AS to_dept_name FROM metal_tracking mt
LEFT JOIN departments df ON mt.from_dept = df.id
LEFT JOIN departments dt ON mt.to_dept = dt.id

WHERE mt.from_dept='$department_id'
ORDER BY mt.id DESC
";

$result = mysqli_query($link, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        
        $alloy_sql1 = "
        SELECT * FROM metal_entry
        WHERE entry_id = '{$row['tracking_id']}'
        ";
        $alloy_result1 = mysqli_query($link, $alloy_sql1);

        // ✅ Fetch alloy history for this metal_tracking entry
        $alloy_sql = "
        SELECT ah.weight AS alloy_weight, a.name AS alloy_name, ah.status AS alloy_status
        FROM alloy_history ah
        LEFT JOIN alloy a ON ah.alloy_id = a.id
        WHERE ah.entry_id = '{$row['tracking_id']}'
        ";
        $alloy_result = mysqli_query($link, $alloy_sql);

        $alloy_details = '';
        if ($alloy_result && mysqli_num_rows($alloy_result) > 0) {
            while ($arow = mysqli_fetch_assoc($alloy_result)) {
                $alloy_details .= htmlspecialchars($arow['alloy_name']) . " (" . $arow['alloy_weight'] . "g)<br>";
            }
        } else {
            $alloy_details = '-';
        }

        // Status badge
        switch ($row['status']) {
            case 0: $status = "<span class='badge bg-warning text-dark'>Pending</span>"; break;
            case 1: $status = "<span class='badge bg-success'>Success</span>"; break;
            case 2: $status = "<span class='badge bg-danger'>Failed</span>"; break;
            case 3: $status = "<span class='badge bg-info text-dark'>Waiting From Accept</span>"; break;
            default: $status = "<span class='badge bg-secondary'>Unknown</span>";
        }

        echo "<tr>
                <td>{$sr}</td>
                <td>{$row['weight']}</td>
                <td>{$row['touch']}</td>
                <td>{$row['from_dept_name']}</td>
                <td>{$row['to_dept_name']}</td>
                <td>{$row['mt_note']}</td>
<td>
    <button class='btn btn-sm btn-primary view-entry-btn' data-entry-id=".$row['tracking_id'].">View</button>
</td>

                <td>{$alloy_details}</td>
                <td>{$status}</td>
                <td>{$row['transferred_at']}</td>
                <td>{$row['received_at']}</td>
              </tr>";
        $sr++;
    }
} else {
    echo "<tr><td colspan='12' class='text-center'>No metal transfers found.</td></tr>";
}
?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>  
        </div>
    </div>
</div>
<!-- Metal Entry Modal -->
<div class="modal fade" id="metalEntryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Metal Entry Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered" id="metalEntryTable">
          <thead>
            <tr>
              <th>Metal Weight</th>
              <th>Gold Touch</th>
               <th>Notes</th>
              <th>Status</th>
              <th>Created At</th>
            </tr>
          </thead>
          <tbody>
            <!-- Dynamically filled via AJAX -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<?php include 'include/footer.php'; ?>
<script>
    $(document).ready(function() {
    $('.view-entry-btn').on('click', function() {
        var entryId = $(this).data('entry-id');

        $.ajax({
            url: 'fetch_metal_entry.php',
            method: 'POST',
            data: { entry_id: entryId },
            dataType: 'json',
            success: function(response) {
                var tbody = $('#metalEntryTable tbody');
                tbody.empty();

                if(response.length > 0) {
                    response.forEach(function(row) {
                        var statusBadge = '';
                        switch(row.status) {
                            case '0': statusBadge = "<span class='badge bg-warning text-dark'>Pending</span>"; break;
                            case '1': statusBadge = "<span class='badge bg-success'>Success</span>"; break;
                            case '2': statusBadge = "<span class='badge bg-danger'>Rejected</span>"; break;
                            default: statusBadge = "<span class='badge bg-secondary'>Unknown</span>";
                        }

                        tbody.append('<tr>'+
                           '<td>'+row.total_weight+'</td>'+
                            '<td>'+row.gold_touch+'</td>'+
                             '<td>'+row.notes+'</td>'+
                            '<td>'+statusBadge+'</td>'+
                            '<td>'+row.created_at+'</td>'+
                        '</tr>');
                    });
                } else {
                    tbody.append('<tr><td colspan="5" class="text-center">No entries found</td></tr>');
                }

                $('#metalEntryModal').modal('show');
            }
        });
    });
});

</script>
