<?php
error_reporting(0);
session_start();
include("include/connection.php");

// Authentication check
if (!isset($_COOKIE['auth_token'])) {
    header("location:index.php");
    exit();
}


$goldBalances = [];
$totalToSum = 0;
$totalFromSum = 0;

$qGold1 = "SELECT *  FROM departments";
$resGold1 = mysqli_query($link, $qGold1);
if ($resGold1 && mysqli_num_rows($resGold1) > 0) {
    while ($row1 = mysqli_fetch_assoc($resGold1)) {
        $department_id = $row1['id'];
        $totalBalance = 0;
$qGold = "SELECT DISTINCT touch FROM metal_tracking";
$resGold = mysqli_query($link, $qGold);
if ($resGold && mysqli_num_rows($resGold) > 0) {
    while ($row = mysqli_fetch_assoc($resGold)) {
        $touchVal = $row['touch'];
        $toSum1 = 0;
        if($department_id==33){
             $toSum1 = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT SUM(weight) as total FROM metal_tracking WHERE to_dept=$department_id AND from_dept=$department_id AND  touch='$touchVal' AND status='1'"
        ))['total'] ?? 0;
            
        }
        
          $stonetoSum =0;
         if($department_id==56){
         $stonetoSum = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT SUM(stone_weight) as total FROM metal_tracking WHERE to_dept=$department_id AND touch='$touchVal' AND status='1'"
        ))['total'] ?? 0;
         }
        
        $toSum = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT SUM(weight) as total FROM metal_tracking WHERE to_dept=$department_id AND touch='$touchVal' AND status='1'"
        ))['total'] ?? 0;
        
          $ostonefromSum =0;
         if($department_id==67){
         $ostonefromSum = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT SUM(t_stone_weight) as total FROM order_tracking WHERE from_dept=$department_id AND gold_touch='$touchVal' AND status='1'"
        ))['total'] ?? 0;
         }
        
        
          $ordertoSum = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT SUM(weight) as total FROM order_tracking WHERE to_dept=$department_id AND gold_touch='$touchVal' AND status='1'"
        ))['total'] ?? 0;
            
         $orderfromSum = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT SUM(weight) as total FROM order_tracking WHERE from_dept=$department_id AND gold_touch='$touchVal' AND status='1'"
        ))['total'] ?? 0;
           $ostonefromSum = ($ostonefromSum * $touchVal) / 100;
        $o_bal = ((($ordertoSum ?: 0) - ($orderfromSum ?: 0)) * $touchVal) / 100; 
        
        
        $fromSum = 0;
        if($department_id==37){
             $fromSum = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT SUM(total_weight) as total FROM metal_entry WHERE from_dept=$department_id AND gold_touch='$touchVal' AND status='1'"
        ))['total'] ?? 0;
        }else{
             $fromSum = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT SUM(weight) as total FROM metal_tracking WHERE from_dept=$department_id AND touch='$touchVal' AND status='1'"
        ))['total'] ?? 0;
        }
       
        $new_toSum = $toSum + $toSum1 + $stonetoSum;
         $balance = ($new_toSum ?: 0) - ($fromSum ?: 0);
       
        $new_balance = ($balance * $touchVal) / 100;
         // Add to totals
        // $totalToSum += $new_toSum;
        // $totalFromSum += $fromSum;
         $totalBalance += $new_balance + $o_bal  + $ostonefromSum;
       
    }
}

 $goldBalances[] = [
            'touch' => $touchVal,
            't_bal' => $totalBalance,
            'did' => $department_id,
            'balance' => $balance
        ];

}

}

//print_r($goldBalances);

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
                            <h6 class="mb-0 text-uppercase">Generate Report / Book Loss / Deduct Loss <small class="text-muted">
            (<?= date("M d, Y H:i:s") ?>)
        </small></h6>
                          <!--  <div>-->
                              
                              
                          <!--</div>-->
                        </div>
                        
                           <div>
                              <small class="text-muted ">Note: Total orders should be zero or all orders from particular department
                              should be in return department  to book loss</small>
                              </div>
                        <hr/>
                        <div class="table-responsive">
          <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Name</th>
                                        <th>Total GrossWeight</th>
                                        <th>Total NetWeight</th>
                                       
                                        <th>Total Orders</th>
                                        <th>Booked Loss</th>
                                        
                                         <th>Action</th>
                                        <th>Return Action</th>
                                         <!--<th>Total Rejection</th>-->
                                        <!--<th>Actions</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $departments =$link->query("SELECT * FROM departments WHERE id NOT IN (51, 69, 70)");
                                     $departmentss = $link->query(" SELECT * FROM departments WHERE name='Loss' OR name='Central' OR name='Month Loss'");
                                   
                                    $sr = 1;
                                    while ($dept = $departments->fetch_assoc()): 
                                    $dep_id = $dept['id'];
                                    ?>
                                    <tr>
                                        <td><?= $sr++ ?></td>
                                        <td><?= htmlspecialchars($dept['name']) ?></td>
  <td><?php
    // $total_stone_receive = mysqli_fetch_assoc(mysqli_query($link,
    //         "SELECT SUM(stone_weight) as total FROM metal_tracking WHERE to_dept=56  AND status='1'"
    //     ))['total'] ?? 0;
    //     if($dep_id == 56){
    //         $t = $dept['use_gold'] - $total_stone_receive;
    //         if($t<0){
    //             echo number_format(0, 2);
    //         }else{
    //             echo   number_format($t, 2);
    //         }
             
    //     }else{
            echo   number_format($dept['use_gold'], 2);
      //  }
       
        
  
                                      

?></td>
          
           <td>
    <?php
    
    $matched = null;

foreach ($goldBalances as $item) {
    if ($item['did'] == $dep_id) {
        $matched = $item;
        break;
    }
}
   // $fine_weight = $dept['use_gold'] * ($dept['melting_value'] / 100);


     // $fine_weight = $dept['use_gold'] * ($dept['melting_value'] / 100);
     if($matched==null){
         echo number_format(0, 2);
     }else{
          $t = $matched['t_bal'];
           $f = $matched['t_bal'];
        //   $total_stone_receive = mysqli_fetch_assoc(mysqli_query($link,
        //     "SELECT SUM(stone_weight) as total FROM metal_tracking WHERE to_dept=56  AND status='1'"
        // ))['total'] ?? 0;
        // if($dep_id == 56){
        //     $t = $t - $total_stone_receive;
        //     if($t<0){
        //         $t =  0;
        //     }else{
                
        //     }
             
        // }
        
           $total_book_loss = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT 
            SUM(weight) AS total_weight, 
            SUM(net_weight) AS total_net_weight 
        FROM loss 
        WHERE from_department='$dep_id' 
          AND to_department='0'"));
         // $total_weight = $row['total_weight'] ?? 0;
 $total_net_weight = $total_book_loss['total_net_weight'] ?? 0;
 $fine = 0;

         if($t>0){
             $fine= $t - $total_net_weight;    
         }

           // number_format($fine, 2);
          if($dep_id == 56){
            if($fine<0){
                echo number_format(0, 2);
            }else{
                echo number_format($fine, 2);
            }
          }elseif($dep_id== 32){
              if($fine<0){
                echo number_format(0, 2);
            }else{
                echo number_format($fine, 2);
            }

          }
          else{
            //   if($dept['use_gold'] ==0 && $fine < 0){
            //       echo 0.00;
            //   }else{
                   echo number_format($fine, 2);
             // }
             
          }
         
     }
    ?></td>
    <td>
    <?php
    $did=$dept['id'];
    $result = $link->query("SELECT COUNT(*) AS total FROM orders WHERE current_dept='$did'");
$row = $result->fetch_assoc();
echo $row['total'];

?>


</a>
</td>
                                            
                                        <td>
    <a href="javascript:void(0)" 
       class="loss-link" 
       data-id="<?= $dept['id'] ?>" 
       data-loss="<?= htmlspecialchars($dept['loss']) ?>">
       <?= number_format(htmlspecialchars($dept['loss']),2) ?>
    </a>
</td>

                                
<td>
     <?php
    $did=$dept['id'];
    $result = $link->query("SELECT COUNT(*) AS total FROM orders WHERE current_dept='$did'");
$row = $result->fetch_assoc();

$hasOrders = ($row['total'] > 0) || ($dept['use_gold'] == 0) ;
?>
 <?php if($dept['name']=='Central' || $dept['name']=='Office'  || $dept['name']=='Return'){ ?>
 
 <?php }else{ ?>
 <a href="book_loss.php?dep_id=<?php echo $dep_id ?>&net_weight=<?php echo $f ?>"
   id="bookLossBtn"
   class="btn-sm btn-primary <?= $hasOrders ? 'disabled' : '' ?>"
   <?= $hasOrders ? 'style="pointer-events:none;opacity:0.6;"' : '' ?>>
   Book Loss
   <?php } ?>
</a>
</td>


<td>
    <?php if($dept['name']=='Central' || $dept['name']=='Melting' || $dept['name']=='Indutherm melting' || $dept['name']=='Office' || $dept['name']=='Loss' || $dept['name']=='Return'){ ?>
 
 <?php }else{ ?>
 <a class="btn-sm btn-primary" href="return.php?dep_id=<?php echo $dep_id ?>">
   Return
</a>
  <?php } ?>
</td>
<!--<td>0</td>-->
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
 <tfoot>
    <tr>
        <th colspan="2" class="text-end">Total:</th>
        <th></th> <!-- Total Gold Weight -->
        <th></th> <!-- Total Fine -->
        <th></th> <!-- Total Orders -->
        <th></th> <!-- Total Loss -->
        <th colspan="2"></th>
    </tr>
</tfoot>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Loss Edit Modal -->
<div class="modal fade" id="lossModal" tabindex="-1" aria-labelledby="lossModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="lossForm" method="post" action="updateloss.php">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="lossModalLabel">Deduct Loss</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="dept_id" id="dept_id">
            <div class="mb-3">
                <label for="loss_value" class="form-label">Loss</label>
                <input type="number"  class="form-control" step="0.0001" name="weight" id="loss_value" required>
            </div>
            <div class="mb-3">
                <label for="loss_date" class="form-label">Date</label>
                <input type="datetime-local" class="form-control" name="loss_date" id="loss_date" required>
            </div>
             <div class="mb-3">
                                <label for="gold_touch" class="form-label">Gold Touch (%)</label>
                                <input type="number" step="0.01" class="form-control" id="gold_touch" name="gold_touch" placeholder="Enter Gold touch (99.5)" required>
                            </div>
        <!--</div>-->
        <div class="mb-3">
                                <label class="form-label">To Department(Note: Select Loss / Central)</label>
                                <select name="to_dept" class="form-control" required>
                                    <option value="">-- Select Department --</option>
                                    <?php 
                                    mysqli_data_seek($departments, 0); // reset pointer
                                    while ($dept = mysqli_fetch_assoc($departmentss)): ?>
                                        <option value="<?= $dept['id'] ?>" >
    <?= htmlspecialchars($dept['name']) ?> 
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>




<?php include 'include/footer.php'; ?>

<script>
// function confirmDelete(deptId) {
//     if (confirm("Are you sure you want to delete this department?")) {
//         window.location.href = "delete_department.php?id=" + deptId;
//     }
// }

// Initialize DataTable for sorting and exporting
// $(document).ready(function() {
//     var table = $('#example2').DataTable({
//         dom: 'Bfrtip',
//         pageLength: -1,
//         buttons: [
//             'copy', 
//             'csv', 
//             'excel', 
//             'pdf',
//             {
//                 extend: 'print',
//                 title: 'Report',
//                 messageTop: 'Report Generated on: <?= date("M d, Y H:i:s") ?>',
//                 exportOptions: {
//                     columns: ':visible'
//                 }
//             }
//         ]
//         footerCallback: function (row, data, start, end, display) {
//         var api = this.api();

//         var intVal = function (i) {
//             return typeof i === 'string'
//                 ? parseFloat(i.replace(/[^0-9.-]/g, '')) || 0
//                 : typeof i === 'number'
//                     ? i : 0;
//         };

//         // 👇 yaha par 2 ko us column index se replace karo jisme gold_weight dikh rha hai
//         var total = api
//             .column(2, { page: 'current' }) 
//             .data()
//             .reduce(function (a, b) {
//                 return intVal(a) + intVal(b);
//             }, 0);

//         $(api.column(2).footer()).html(total.toFixed(2) + " g");
//     }
//     });
    
//     // // --- Check if all orders are zero ---
//     // function checkOrders() {
//     //     var allZero = true;
//     //     table.column(4).data().each(function(value) { // column index 4 = "Total Orders"
//     //         if (parseInt(value) !== 0) {
//     //             allZero = false;
//     //         }
//     //     });

//     //     if (allZero) {
//     //         $("#bookLossBtn").removeClass("disabled").prop("disabled", false);
//     //     } else {
//     //         $("#bookLossBtn").addClass("disabled").prop("disabled", true);
//     //     }
//     // }

//    // checkOrders(); // run on page load
    
// });

$(document).ready(function() {
    var table = $('#example2').DataTable({
        dom: 'Bfrtip',
        pageLength: -1,
        buttons: [
            'copy', 
            'csv', 
            'excel', 
            'pdf',
            {
                extend: 'print',
                title: 'Report',
                messageTop: 'Report Generated on: <?= date("M d, Y H:i:s") ?>',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ],
        footerCallback: function (row, data, start, end, display) {
            var api = this.api();

            var intVal = function (i) {
        if (typeof i === 'string') {
            i = i.replace(/<[^>]*>/g, '').replace(/[^0-9.\-]/g, '');
            return parseFloat(i) || 0;
        }
        return typeof i === 'number' ? i : 0;
    };

            // 👉 Total Gold Weight (col 2)
            var goldTotal = api
                .column(2, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // 👉 Total Loss (col 3)
           

            // 👉 Total Orders (col 4)
            var orderTotal = api
                .column(4, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);


                // 👉 Total Fine (col 5)
    var fineTotal = api
        .column(3, { page: 'current' })
        .data()
        .reduce(function (a, b) {
            return intVal(a) + intVal(b);
        }, 0);
        
         var lossTotal = api
                .column(5, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);



            // 👉 Total Fine = Gold - Loss
            // var fineTotal = goldTotal - lossTotal;

            // Footer update
            $(api.column(2).footer()).html("<b>" + goldTotal.toFixed(2) + " g</b>");
            $(api.column(3).footer()).html("<b>" + fineTotal.toFixed(2) + " g</b>");
            $(api.column(4).footer()).html("<b>" + orderTotal + "</b>");
    $(api.column(5).footer()).html("<b>" + lossTotal.toFixed(2) + " g</b>");

        }
    });

    table.buttons().container()
        .appendTo('#example2_wrapper .col-md-6:eq(0)');
});



$(document).on("click", ".loss-link", function() {
    var deptId = $(this).data("id");
    var lossVal = $(this).data("loss");

    $("#dept_id").val(deptId);
   // $("#loss_value").val(parseFloat(lossVal).toFixed(2));
       $("#loss_value").val(lossVal);
    $("#loss_date").val(new Date().toISOString().slice(0,16));
    $("#lossModal").modal("show");
});


document.getElementById('lossModal').addEventListener('shown.bs.modal', function () {
  const now = new Date();
  const offset = now.getTimezoneOffset();
  const local = new Date(now.getTime() - offset * 60000);
  document.getElementById('loss_date').value = local.toISOString().slice(0, 16);
});



</script>

