<?php

include("include/connection.php");


// $id = $_GET['id']; 

// Department list laa rahe hai dropdown ke liye
$departments = $link->query("SELECT id, name FROM departments ORDER BY name ASC");
// $department_id already defined for current user dept
// Unread count निकालना
$unread_count = 0;
$q = mysqli_query($link, "SELECT COUNT(*) AS total FROM message WHERE receiver_type='admin'  AND status=0");
if ($q) {
    $row = mysqli_fetch_assoc($q);
    $unread_count = $row['total'];
}

?>
	<!-- Chat Icon -->
<div id="chat-icon" style="position:fixed; bottom:65px; right:15px; cursor:pointer; z-index:9999;    background: #fff;
    padding: 11px;
    border-radius: 50%;">
    <i class="bx bx-chat fs-1 text-primary"></i>
      <?php if($unread_count > 0): ?>
        <span id="chat-count" 
              style="position:absolute; top:-5px; right:-5px; background:red; color:#fff; font-size:12px; padding:2px 6px; border-radius:50%;">
            <?= $unread_count ?>
        </span>
    <?php endif; ?>
</div>

<!-- Chat Modal -->
<div id="chat-modal" style="display:none; position:fixed; bottom:80px; right:80px;height:70%; width:400px; max-height:500px; background:#fff; border:1px solid #ddd; border-radius:12px; box-shadow:0 0 10px rgba(0,0,0,0.3); z-index:10000; overflow:hidden;">
    <div style="background:#007bff; color:#fff; padding:10px; text-align:center; font-weight:bold; cursor:move;">
        Chat with Department
        <span id="chat-close" style="float:right; cursor:pointer;">&times;</span>
    </div>
      <div style="margin-left: 10px;
    margin-right: 10px;
    margin-top: 10px;">         
<label class="form-label">Receiver Department</label>
<select name="receiver_dept_id" id="receiver_dept_id" class="form-control" required>
    <option value="">-- Select Receiver Department --</option>
    <?php 
    $departments->data_seek(0);
    while($dept = $departments->fetch_assoc()){
      $did = $dept['id'];
      $unread_count1 = 0;
$q1 = mysqli_query($link, "SELECT COUNT(*) AS total FROM message WHERE receiver_type='admin' AND  receiver_id='$did'  AND status=0");
if ($q1) {
    $row1 = mysqli_fetch_assoc($q1);
    $unread_count1 = $row1['total'];
}

     ?>
        <option value="<?= $dept['id'] ?>"><?= htmlspecialchars($dept['name']) ?>
      
    </option>
    <?php } ?>
</select>
</div> 
    <!-- <div id="chat-content" style="padding:10px; height:400px; overflow-y:auto;"> -->
        <!-- Chat messages loaded here -->
        <!-- <div class="chat-box"> -->


<div id="chat-messages" class="chat-box mt-3" style="height:70%; overflow-y:auto; padding-bottom: 60px;">
    Select department to load messages...

</div>



 <div id="chat-footer" style="padding:10px;background-color:white; border-top:1px solid #ddd; display:flex; gap:5px;position: fixed;bottom: 80px;width:397px;">
    <input type="hidden" id="current_dept_id">
    <textarea id="chat-input" class="form-control" rows="1" placeholder="Type your message..." style="flex:1; resize:none;"></textarea>
    <button id="chat-send" class="btn btn-primary">Send</button>
</div>
</div>


		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2025. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
			    <script type="text/javascript">
				window.onload = function() {
			    <?php

					if ($_GET['success'] == 1 && $_GET['success'] != '') {
					?>
						Lobibox.notify('success', {
							pauseDelayOnHover: true,
							continueDelayOnInactiveTab: false,
							position: 'top right',
							icon: 'bx bx-check-circle',
							msg: 'Admin Login Successfully.'
						});
					<?php
					}
					?>
					
										<?php
									if ($_GET['error'] == 104 && $_GET['error'] != '') {
									?>
										Lobibox.notify('error', {
											pauseDelayOnHover: true,
											continueDelayOnInactiveTab: false,
											position: 'top right',
											icon: 'bx bx-x-circle',
											msg: 'Image File missing&id='
										});
									<?php
									}
									?>
									
									<?php

					if ($_GET['success'] == 2 && $_GET['success'] != '') {
					?>
						Lobibox.notify('success', {
							pauseDelayOnHover: true,
							continueDelayOnInactiveTab: false,
							position: 'top right',
							icon: 'bx bx-check-circle',
							msg: 'Updated Successfully.'
						});
					<?php
					}
					?>
								
			                        <?php
									if ($_GET['error'] == 3 && $_GET['error'] != '') {
									?>
										Lobibox.notify('error', {
											pauseDelayOnHover: true,
											continueDelayOnInactiveTab: false,
											position: 'top right',
											icon: 'bx bx-x-circle',
											msg: 'Not Updated Successfully'
										});
									<?php
									}
									?>
									
									<?php

					if ($_GET['success'] == 4 && $_GET['success'] != '') {
					?>
						Lobibox.notify('success', {
							pauseDelayOnHover: true,
							continueDelayOnInactiveTab: false,
							position: 'top right',
							icon: 'bx bx-check-circle',
							msg: 'Order Successfully.'
						});
					<?php
					}
					?>
					
				}
				</script>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>
			<hr/>
			<h6 class="mb-0">Sidebar Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/plugins/chartjs/js/Chart.min.js"></script>
	<script src="assets/plugins/chartjs/js/Chart.extension.js"></script>
	<script src="assets/js/index.js"></script>
<!--notification js -->
<script src="assets/plugins/notifications/js/lobibox.min.js"></script>
<script src="assets/plugins/notifications/js/notifications.min.js"></script>
<script src="assets/plugins/notifications/js/notification-custom-script.js"></script>
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<!--app JS-->
<script>
// 		$(document).ready(function() {
// 			$('#example').DataTable();
// 		  } );
	</script>
	<script>
// 		$(document).ready(function() {
// 			var table = $('#example2').DataTable( {
// 				lengthChange: false,
// 				buttons: [ 'copy', 'excel', 'pdf', 'print']
// 			} );
		 
// 			table.buttons().container()
// 				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
// 		} );
	</script>	<script src="assets/js/app.js"></script>
	<script>
    // Auto scroll to bottom
    var chatBox = document.getElementById('chat-messages');
    chatBox.scrollTop = chatBox.scrollHeight;
</script>



<script>
const chatIcon = document.getElementById('chat-icon');
const chatModal = document.getElementById('chat-modal');
const chatClose = document.getElementById('chat-close');
let currentDeptId = null;

// ✅ Common scroll function
function scrollChat() {
    const chatBox = document.getElementById('chat-messages');
    if(chatBox){
        setTimeout(() => {
            chatBox.scrollTop = chatBox.scrollHeight;
        }, 200); // थोड़ा delay ताकि content render हो जाए
    }
}

// ✅ Open chat → scroll bottom
chatIcon.addEventListener('click', () => {
    chatModal.style.display = 'block';
    scrollChat();
});

// ✅ Close chat
chatClose.addEventListener('click', () => {
    chatModal.style.display = 'none';
});

// ✅ Dept change पर messages load और scroll
document.getElementById("receiver_dept_id").addEventListener("change", function() {
    let deptId = this.value;
    currentDeptId = deptId;

    if (deptId) {
        loadMessages(deptId, true);
        fetch("update_status.php?dept_id="+deptId)
        .then(res => res.text())
        .then(() => {
            const chatCount = document.getElementById("chat-count");
            if(chatCount) chatCount.style.display = "none";

            let option = this.querySelector("option[value='" + deptId + "']");
            if(option){
                option.textContent = option.textContent.replace(/\(\d+\)|🔴/g, "").trim();
            }
        });
    } else {
        document.getElementById("chat-messages").innerHTML = "Select department to load messages...";
    }
});

// ✅ Send message → reload + scroll bottom
document.getElementById("chat-send").addEventListener("click", function() {
    const deptId = document.getElementById("receiver_dept_id").value;
    const msg = document.getElementById("chat-input").value.trim();

    if (!deptId) {
        alert("Please select a department first");
        return;
    }
    if (!msg) return;

    fetch("message_action.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "receiver_dept_id=" + encodeURIComponent(deptId) + "&note=" + encodeURIComponent(msg)
    })
    .then(res => res.text())
    .then(() => {
        loadMessages(deptId, true); // true = force scroll bottom after reload
        document.getElementById("chat-input").value = "";
    });
});

// ✅ Load messages (extra param for scroll)
function loadMessages(deptId, forceScroll = false) {
    fetch("load_messages.php?dept_id=" + deptId)
    .then(res => res.text())
    .then(data => {
        document.getElementById("chat-messages").innerHTML = data;
        if(forceScroll) scrollChat();
    });
}

function updateDeptCounts() {
    fetch("count_unread_departments.php")
        .then(res => res.json())
        .then(counts => {
            let select = document.getElementById("receiver_dept_id");
            if (!select) return;

            for (let i = 0; i < select.options.length; i++) {
                let opt = select.options[i];
                let deptId = opt.value;
                if (!deptId) continue;

                // ✅ Store base label once
                if (!opt.dataset.label) {
                    opt.dataset.label = opt.textContent.replace(/\s*🔴\(\d+\)/g, "").trim();
                }

                let baseLabel = opt.dataset.label;
                let count = counts[deptId] || 0;

                // ✅ Only change text if needed (prevents flicker)
                let newText = count > 0 ? `${baseLabel} 🔴(${count})` : baseLabel;
                if (opt.textContent !== newText) {
                    opt.textContent = newText;
                }
            }
        })
        .catch(err => console.error("Count refresh error:", err));
}


function updateChatCount() {
    fetch("count_unread.php")
    .then(res => res.text())
    .then(count => {
        let chatCount = document.getElementById("chat-count");
        if (count > 0) {
            if (!chatCount) {
                const icon = document.getElementById("chat-icon");
                chatCount = document.createElement("span");
                chatCount.id = "chat-count";
                chatCount.style.cssText = "position:absolute; top:-5px; right:-5px; background:red; color:#fff; font-size:12px; padding:2px 6px; border-radius:50%;";
                icon.appendChild(chatCount);
            }
            chatCount.innerText = count;
            chatCount.style.display = "inline-block";
        } else {
            if (chatCount) chatCount.style.display = "none";
        }
    });
}
setInterval(() => {
    if (currentDeptId) {
        loadMessages(currentDeptId, false);
       // scrollChat();

        // ✅ Chatbox खुला है तो status update भी करते रहो
        if (chatModal.style.display === "block") {
            fetch("update_status.php?dept_id=" + currentDeptId)
            .then(res => res.text())
            .then(() => {
                const chatCount = document.getElementById("chat-count");
                if (chatCount) chatCount.style.display = "none";

                let select = document.getElementById("receiver_dept_id");
                if (select) {
                    let option = select.querySelector("option[value='" + currentDeptId + "']");
                    if (option) {
                        option.textContent = option.textContent.replace(/\(\d+\)|🔴/g, "").trim();
                    }
                }
            });
        }
    }

    updateChatCount();
    updateDeptCounts();
}, 2000);
</script>


</body>

</html>