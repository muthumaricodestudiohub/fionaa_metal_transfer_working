<?php
session_start();
include("include/connection.php");
$current_time = date("Y-m-d H:i:s");

// ✅ Check UUID
if (isset($_COOKIE['uuid'])) {
    $uuid_cookie = mysqli_real_escape_string($link, $_COOKIE['uuid']);
} else {
    $uuid_cookie = '';
}

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

include("include/header.php");

// ✅ fetch alloy list from DB
$alloyList = [];
$resAlloy = mysqli_query($link, "SELECT * FROM alloy");
if ($resAlloy && mysqli_num_rows($resAlloy) > 0) {
    while ($row = mysqli_fetch_assoc($resAlloy)) {
        $alloyList[] = $row;
    }
}

$departments = mysqli_query($link, "SELECT id, name FROM departments WHERE id IN (14, 41, 51) ORDER BY name ASC");


// ✅ Fetch gold balances
$goldBalances = [];
$qGold = "SELECT DISTINCT touch FROM metal_tracking";
$resGold = mysqli_query($link, $qGold);
if ($resGold && mysqli_num_rows($resGold) > 0) {
    while ($row = mysqli_fetch_assoc($resGold)) {
        $touchVal = $row['touch'];

        $toSum = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT SUM(weight) as total FROM metal_tracking WHERE to_dept=$department_id AND touch='$touchVal' AND status='1'"
        ))['total'] ?? 0;

        $fromSum = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT SUM(total_weight) as total FROM metal_entry WHERE from_dept=$department_id AND gold_touch='$touchVal' AND status='1'"
        ))['total'] ?? 0;

        $balance = ($toSum ?: 0) - ($fromSum ?: 0);
       
        $goldBalances[] = [
            'touch' => $touchVal,
            'to_sum' => number_format($toSum, 2),
            'from_sum' => number_format($fromSum, 2),
            'balance' => $balance
        ];
    }
}
?>

<style>
.highlighted { background-color: #fff3cd; transition: background-color 2s ease; }
</style>

<div class="page-wrapper">
  <div class="page-content">
      <?php
if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'
        . htmlspecialchars($_SESSION['success']) .
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
        . htmlspecialchars($_SESSION['error']) .
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    unset($_SESSION['error']);
}
?>

    <div class="row">
      <form action="add_order_action.php" method="POST">
        <div class="col-xl-12 mx-auto">
          <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0 text-uppercase">Add Metal Order</h6>
            <div>
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewGoldModal">
                View Gold Balance
              </button>
              <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#viewAlloyModal">
                View Alloy Balance
              </button>
            </div>
          </div>
          <hr/>
          <div class="card border-top border-0 border-4 border-info">
            <div class="card-body">
              <div class="border p-4 rounded">

                <h5 class="mb-0 text-info">Metal Entry</h5>
                <hr/>

                <!-- Touch Value Input -->
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label"><strong>Touch Value</strong></label>
                  <div class="col-sm-9">
                    <input type="number" step="0.01" class="form-control" id="touch_value" name="touch_value" placeholder="Enter Touch Value" >
                  </div>
                </div>

                <!-- Table Header -->
                <div class="row mb-2 fw-bold">
                  <div class="col-sm-1">Sr.No</div>
                  <div class="col-sm-2">Weight</div>
                  <div class="col-sm-2">Touch</div>
                  <div class="col-sm-2">Alloy</div>
                  <div class="col-sm-2">Total Weight</div>
                  <div class="col-sm-2">Note</div>
                  <div class="col-sm-1">Action</div>
                </div>

                <!-- Items Container -->
                <div id="items_container">
                  <div class="item">
                    <div class="row mb-2 jjk">
                      <div class="col-sm-1"><input type="text" class="form-control serial-number" disabled></div>
                      <div class="col-sm-2"><input type="number" step="0.01" class="form-control weight" name="weight[]" placeholder="Weight" required>
                      <small class="text-danger touch-row-error" style="display:none;"></small>
                      </div>
                      <div class="col-sm-2"><input type="number" step="0.01" class="form-control touch" name="touch[]" placeholder="Touch" required>
                      <small class="text-muted touch-balance"></small></div>
                      <div class="col-sm-2"><input type="number" step="0.01" class="form-control alloy" name="alloy[]" placeholder="Alloy" readonly></div>
                      <div class="col-sm-2"><input type="text" class="form-control row-total" name="row_total[]" readonly></div>
                      <div class="col-sm-2"><input type="text" class="form-control note" name="note[]" placeholder="Note"></div>
                      <div class="col-sm-1"><button type="button" class="btn btn-danger remove-item">X</button></div>
                      <div class="col-12"><small class="text-danger touch-row-error" style="display:none;"></small></div>
                    </div>
                  </div>
                </div>

                <!-- Add Item Button -->
                <div class="row mb-3 justify-content-end">
                  <div class="col-sm-3 text-end">
                    <button type="button" class="btn btn-info" id="addItemBtn">+ Add Row</button>
                  </div>
                </div>

                <hr/>
                <h5 class="mb-0 text-info">Alloy Details</h5>
                <hr/>

                <!-- Alloy Table Header -->
                <div class="row mb-2 fw-bold">
                  <div class="col-sm-1">Sr.No</div>
                  <div class="col-sm-3">Alloy Name</div>
                  <div class="col-sm-3">Percentage</div>
                  <div class="col-sm-3">Weight</div>
                  <div class="col-sm-2">Action</div>
                </div>

                <!-- Alloy Container -->
                <div id="alloy_container">
                  <div class="alloy-item">
                    <div class="row mb-2 jjk2">
                      <div class="col-sm-1"><input type="text" class="form-control alloy-serial" disabled></div>
                      <div class="col-sm-3">
                        <select class="form-control alloy-name" name="alloy_name[]" onchange="setAlloyPercentage(this)">
                          <option value="">Select Alloy</option>
                          <?php foreach($alloyList as $a): ?>
                            <option value="<?= htmlspecialchars($a['name']) ?>"
                                    data-percentage="<?= $a['percentage'] ?>"
                                    data-total-weight="<?= $a['total_weight'] ?>">
                              <?= htmlspecialchars($a['name']) ?> (<?= $a['total_weight'] ?>)
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-sm-3"><input type="number" step="0.01" class="form-control alloy-percentage" name="alloy_percentage[]" placeholder="%" readonly></div>
                      <div class="col-sm-3"><input type="number" step="0.01" class="form-control alloy-weight" name="alloy_weight[]" placeholder="Weight" readonly></div>
                      <div class="col-sm-2"><button type="button" class="btn btn-danger remove-alloy">X</button></div>
                       <div class="col-12"><small class="text-danger alloy-row-error" style="display:none;"></small></div>
                    </div>
                  </div>
                </div>
               

                <!-- Add Alloy Button -->
                <div class="row mb-3 justify-content-end">
                  <div class="col-sm-3 text-end">
                    <button type="button" class="btn btn-info" id="addAlloyBtn">+ Add Alloy</button>
                  </div>
                </div>
                 <!-- Error message placeholder -->
<div id="alloy-error" class="text-danger mt-2" style="display:none;"></div>

                <hr>
                <!-- Totals -->
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Total Weight</label>
                  <div class="col-sm-9"><input type="text" class="form-control" id="total_weight_input" name="total_weight_input" readonly></div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Total Alloy</label>
                  <div class="col-sm-9"><input type="text" name="total_alloy" class="form-control" id="total_alloy" readonly></div>
                </div>          
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Grand Total Weight</label>
                  <div class="col-sm-9"><input type="text" class="form-control" id="total_row_weight" readonly></div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Select Department:</label>
                  <div class="col-sm-9">
                    <select name="to_dept" class="form-control">
                      <option value="">-- Select Department --</option>
                      <?php if ($departments && mysqli_num_rows($departments) > 0): ?>
                        <?php while ($dept = mysqli_fetch_assoc($departments)): ?>
                          <option value="<?= htmlspecialchars($dept['id']) ?>">
                            <?= htmlspecialchars($dept['name']) ?>
                          </option>
                        <?php endwhile; ?>
                      <?php endif; ?>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label">Notes:</label>
                  <div class="col-sm-9">
                    <textarea name="notes" class="form-control" placeholder="Enter transfer notes"></textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="gold_touch" class="col-sm-3 col-form-label">Gold Touch (%)</label>
                  <div class="col-sm-9">
                    <input type="number" step="0.01" class="form-control" id="gold_touch" name="gold_touch" placeholder="Enter Gold touch (99.5)" readonly>
                  </div>
                </div>
                <div id="form-error" class="text-danger mb-2" style="display:none;"></div>

                <div class="row">
                  <div class="col-sm-9 offset-sm-3">
                    <button type="submit" class="btn btn-success px-5">Submit</button>
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

<!-- ✅ Gold Modal -->
<div class="modal fade" id="viewGoldModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Gold Balance</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Sr.No</th>
              <th>Touch</th>
              <th>Balance</th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($goldBalances)): $i=1; ?>
              <?php foreach($goldBalances as $g): ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= htmlspecialchars($g['touch']) ?></td>
                  <td><strong><?= $g['balance'] ?></strong></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="3" class="text-center">No data found</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- ✅ Alloy Modal -->
<div class="modal fade" id="viewAlloyModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title">Alloy Summary</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Sr.No</th>
              <th>Alloy Name</th>
              <th>Total Weight</th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($alloyList)): $i=1; ?>
              <?php foreach($alloyList as $a): ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= htmlspecialchars($a['name']) ?></td>
                  <td><?= htmlspecialchars($a['total_weight']) ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="3" class="text-center">No alloys found</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include("include/footer.php"); ?>
<script>
    const goldBalances = <?php echo json_encode(array_column($goldBalances, 'balance', 'touch')); ?>;
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
     
  updateSerialNumbers();
  updateAlloySerials();
  calculateTotals();

  document.getElementById('addItemBtn').addEventListener('click', addNewItem);
  document.getElementById('items_container').addEventListener('input', function(e) {
    if (e.target.classList.contains('weight') || e.target.classList.contains('touch')) {
      calculateTotals();
    }
  });
  document.getElementById('touch_value').addEventListener('input', calculateTotals);
  document.getElementById('items_container').addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-item')) removeItem(e.target);
  });

  document.getElementById('addAlloyBtn').addEventListener('click', addNewAlloy);
  document.getElementById('alloy_container').addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-alloy')) removeAlloy(e.target);
  });

  document.getElementById('alloy_container').addEventListener('input', function(e) {
    if (e.target.classList.contains('alloy-percentage')) {
      calculateAlloyWeights();
    }
  });
});

// ------------------ items ------------------
function addNewItem() {
  const itemsContainer = document.getElementById("items_container");
  const newItem = document.createElement("div");
  newItem.classList.add("item");
  newItem.innerHTML = `<div class="row mb-2 jjk">
      <div class="col-sm-1"><input type="text" class="form-control serial-number" disabled></div>
      <div class="col-sm-2"><input type="number" step="0.01" class="form-control weight" name="weight[]" placeholder="Weight" required>
      <small class="text-danger touch-row-error" style="display:none;"></small></div>
      <div class="col-sm-2"><input type="number" step="0.01" class="form-control touch" name="touch[]" placeholder="Touch" required>
      <small class="text-muted touch-balance"></small></div>
      <div class="col-sm-2"><input type="number" step="0.01" class="form-control alloy" name="alloy[]" placeholder="Alloy" readonly></div>
      <div class="col-sm-2"><input type="text" class="form-control row-total" name="row_total[]" readonly></div>
      <div class="col-sm-2"><input type="text" class="form-control note" name="note[]" placeholder="Note"></div>
      <div class="col-sm-1"><button type="button" class="btn btn-danger remove-item">X</button></div>
       <div class="col-12"><small class="text-danger touch-row-error" style="display:none;"></small></div>
    </div>`;
  itemsContainer.appendChild(newItem);
  updateSerialNumbers();
}

function removeItem(button) {
  const itemContainer = button.closest('.item');
  if (document.querySelectorAll('.item').length > 1) {
    itemContainer.remove();
    updateSerialNumbers();
    calculateTotals();
  } else {
    alert('At least one row is required.');
  }
}

function updateSerialNumbers() {
  document.querySelectorAll('.jjk').forEach((row, index) => {
    row.querySelector('.serial-number').value = index + 1;
    row.querySelector('.remove-item').style.display = (document.querySelectorAll('.jjk').length > 1) ? 'block' : 'none';
  });
}

function calculateTotals() {
  let totalWeight = 0, totalRowWeight = 0, totalAlloy = 0;
  const touchValue = parseFloat(document.getElementById('touch_value').value) || 0;
  let hasError = false;

  document.querySelectorAll('.item').forEach(item => {
    const w = parseFloat(item.querySelector('.weight').value) || 0;
    const t = parseFloat(item.querySelector('.touch').value.trim()).toFixed(2);
    const tNum = parseFloat(t) || 0;
    let rowTotal = 0, alloyValue = 0;

    if (touchValue > 0) {
      rowTotal = (w * tNum) / touchValue;
      alloyValue = rowTotal - w;
      item.querySelector('.alloy').value = alloyValue.toFixed(2);
    }
    item.querySelector('.row-total').value = rowTotal.toFixed(2);

    totalWeight += w;
    totalRowWeight += rowTotal;
    totalAlloy += alloyValue;
    
     const rowError = item.querySelector('.touch-row-error');
    // Check if touch exists in balance list
    if (!(t in goldBalances)) {
        if (t) { // only if user typed something
            rowError.innerText = "❌ No balance for entered touch ";   
            rowError.style.display = "block";
              hasError = true;
        }
    }else{ 
// console.log(t);
    // ✅ Balance display
    const balanceDiv = item.querySelector('.touch-balance');
    const available = parseFloat(goldBalances[t]) || 0;
    console.log(goldBalances);
    if (balanceDiv) {
      balanceDiv.innerText = `Balance: ${available.toFixed(2)}` ;
    }

    // ✅ Error below weight
   
    if (w > available ) {
      rowError.innerText = `⚠️ Weight (${w.toFixed(2)}) exceeds balance (${available.toFixed(2)})`;
      rowError.style.display = "block";
      hasError = true;
    } else {
      rowError.style.display = "none";
    }
    }
  });

  document.getElementById('total_weight_input').value = totalWeight.toFixed(2);
  document.getElementById('total_row_weight').value = totalRowWeight.toFixed(2);
  document.getElementById('total_alloy').value = totalAlloy.toFixed(2);

  document.getElementById('gold_touch').value = touchValue.toFixed(2);

  calculateAlloyWeights();

  // ✅ Disable submit if any error
  document.querySelector('button[type="submit"]').disabled = hasError;
}





// ------------------ alloy ------------------
function addNewAlloy() {
  const alloyContainer = document.getElementById("alloy_container");
  const newAlloy = document.createElement("div");
  newAlloy.classList.add("alloy-item");
  newAlloy.innerHTML = `<div class="row mb-2 jjk2">
      <div class="col-sm-1"><input type="text" class="form-control alloy-serial" disabled></div>
      <div class="col-sm-3">
        <select class="form-control alloy-name" name="alloy_name[]" onchange="setAlloyPercentage(this)">
          <option value="">Select Alloy</option>
          <?php foreach($alloyList as $a): ?>
            <option value="<?= htmlspecialchars($a['name']) ?>"
                    data-percentage="<?= $a['percentage'] ?>"
                    data-total-weight="<?= $a['total_weight'] ?>">
              <?= htmlspecialchars($a['name']) ?> (<?= $a['total_weight'] ?>)
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-sm-3"><input type="number" step="0.01" class="form-control alloy-percentage" name="alloy_percentage[]" placeholder="%" readonly></div>
      <div class="col-sm-3"><input type="number" step="0.01" class="form-control alloy-weight" name="alloy_weight[]" placeholder="Weight" readonly></div>
      <div class="col-sm-2"><button type="button" class="btn btn-danger remove-alloy">X</button></div>
           <div class="col-12"><small class="text-danger alloy-row-error" style="display:none;"></small></div>
    </div>`;
  alloyContainer.appendChild(newAlloy);
  updateAlloySerials();
}

function removeAlloy(button) {
  const alloyRow = button.closest('.alloy-item');
  if (document.querySelectorAll('.alloy-item').length > 1) {
    alloyRow.remove();
    updateAlloySerials();
    calculateAlloyWeights();
  } else {
    alert('At least one alloy row is required.');
  }
}

function updateAlloySerials() {
  document.querySelectorAll('.jjk2').forEach((row, index) => {
    row.querySelector('.alloy-serial').value = index + 1;
    row.querySelector('.remove-alloy').style.display = (document.querySelectorAll('.jjk2').length > 1) ? 'block' : 'none';
  });
}

function setAlloyPercentage(select) {
  const selected = select.options[select.selectedIndex];
  const percentage = parseFloat(selected.getAttribute('data-percentage')) || 0;
  const row = select.closest('.jjk2');
  row.querySelector('.alloy-percentage').value = percentage;
  calculateAlloyWeights();
}

function calculateAlloyWeights() {
  const totalAlloy = parseFloat(document.getElementById('total_alloy').value) || 0;
  let sumAlloyWeight = 0;
  let sumPercentage = 0;  // <-- track total %
  let hasError = false;

  document.querySelectorAll('.jjk2').forEach(row => {
    const perc = parseFloat(row.querySelector('.alloy-percentage').value) || 0;
    const totalAvailable = parseFloat(row.querySelector('.alloy-name').selectedOptions[0]?.getAttribute('data-total-weight')) || 0;

    const weight = (totalAlloy * perc) / 100;
    row.querySelector('.alloy-weight').value = weight.toFixed(2);

    sumAlloyWeight += weight;
    sumPercentage += perc;

    // Row error for exceeding balance
    const rowError = row.querySelector('.alloy-row-error');
    if (weight > totalAvailable + 0.01) {
      rowError.innerText = `⚠️ Alloy weight (${weight.toFixed(2)}) exceeds balance (${totalAvailable.toFixed(2)})`;
      rowError.style.display = "block";
      hasError = true;
    } else {
      rowError.style.display = "none";
    }
  });

  const errorDiv = document.getElementById('alloy-error');

  // Check if total alloy % is 100
  if (sumPercentage.toFixed(2) !== "100.00") {
    errorDiv.innerText = `⚠️ Total alloy percentage must be 100%. Currently ${sumPercentage.toFixed(2)}%.`;
    errorDiv.style.display = "block";
    hasError = true;
  } else if (sumAlloyWeight > totalAlloy + 0.01) {
    // existing total alloy weight check
    errorDiv.innerText = `⚠️ Total alloy weight (${sumAlloyWeight.toFixed(2)}) cannot exceed ${totalAlloy.toFixed(2)}`;
    errorDiv.style.display = "block";
    hasError = true;
  } else {
    errorDiv.style.display = "none";
  }

  // Disable/enable submit
  const submitBtn = document.querySelector('button[type="submit"]');
  submitBtn.disabled = hasError;
}


function validateForm() {
  let hasError = false;

  // 1️⃣ Check empty required fields
  document.querySelectorAll("input, select, textarea").forEach(field => {
    if (
      !field.readOnly &&
     
      field.name !== "notes" &&
      field.type !== "hidden"
       &&
      field.name !== "reply"
    ) {
      if (!field.value.trim()) {
          console.log(field)
        hasError = true;
        field.classList.add("is-invalid");
      } else {
        field.classList.remove("is-invalid");
      }
    }
  });

  // 2️⃣ Check if any row errors are already visible (weight > balance, alloy > balance)
  document.querySelectorAll('.touch-row-error, .alloy-row-error, #alloy-error').forEach(errEl => {
    if (errEl.style.display === 'block') {
      hasError = true;
    }
  });

  // 3️⃣ Show general error if any
  const errorDiv = document.getElementById("form-error");
  if (hasError) {
    errorDiv.innerText = "⚠️ Please fix errors before submitting.";
    errorDiv.style.display = "block";
  } else {
    errorDiv.style.display = "none";
  }

  // 4️⃣ Disable submit
  document.querySelector('button[type="submit"]').disabled = hasError;
}

document.addEventListener('input', () => {
  calculateTotals();     // updates row totals and balance errors
  calculateAlloyWeights();
  validateForm();        // then check empty fields + row errors
});

document.addEventListener('change', () => {
  calculateTotals();
  calculateAlloyWeights();
  validateForm();
});


// Run once on page load
 validateForm();



</script>
