<?php
session_start();
include("connection.php");
$current_time = date("M d, Y H:i:s");

// Check UUID cookie
if (isset($_COOKIE['uuid'])) {
    $uuid_cookie = mysqli_real_escape_string($link, $_COOKIE['uuid']);
} else {
    $uuid_cookie = '';
}

// Validate user session
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
?>      <!--start overlay-->
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

<?php
$unread_count = 0;
$q = mysqli_query($link, "SELECT COUNT(*) AS total FROM message WHERE receiver_type='department' AND receiver_id='$department_id' AND status=0");
if ($q) {
    $row = mysqli_fetch_assoc($q);
    $unread_count = $row['total'];
}


?>

<style>
.chat-box { max-width: 700px; margin:auto; border:1px solid #ddd; border-radius:12px; padding:15px; background:#f9f9f9; }
.message { padding:10px 15px; border-radius:15px; margin-bottom:10px; display:inline-block; max-width:80%; clear:both; }
.message.sent { background:#007bff; color:#fff; float:right; text-align:right; }
.message.received { background:#e9ecef; color:#000; float:left; text-align:left; }
.read-status { font-size:11px; color:#666; margin-top:3px; }
</style>


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
<div id="chat-modal" style="display:none; position:fixed; bottom:80px; right:80px; width:400px; max-height:521px; background:#fff; border:1px solid #ddd; border-radius:12px; box-shadow:0 0 10px rgba(0,0,0,0.3); z-index:10000; overflow:hidden;">
    <div style="background:#007bff; color:#fff; padding:10px; text-align:center; font-weight:bold; cursor:move;">
        Chat with Admin / Emergency Orders
        <span id="chat-close" style="float:right; cursor:pointer;">&times;</span>
    </div>
    <div id="chat-content" style="padding:10px; height:400px; overflow-y:auto;">
        <!-- Chat messages loaded here -->
        <!-- <div class="chat-box"> -->
            <div id="chat-messages">
                Loading messages...
            </div>
    </div>
    <div id="chat-footer" style="border-top:1px solid #ddd; padding:10px; background:#f9f9f9;">
    <form id="reply-form" action="message_action.php" method="POST" style="display:flex; gap:5px;">
        <input type="hidden" name="dept_id" value="<?= $department_id ?>">
        <textarea name="reply" id="reply" placeholder="Type your reply..." 
                  style="flex:1; resize:none; border-radius:8px; padding:6px;" required></textarea>
        <button type="submit" class="btn btn-primary btn-sm">Send</button>
    </form>
</div>

</div>


<script>
(function(){

  const chatIcon = document.getElementById('chat-icon');
  const chatModal = document.getElementById('chat-modal');
  const chatClose = document.getElementById('chat-close');
  const chatContainer = document.getElementById('chat-content'); // <-- scroll container (important)
  const chatMessages = document.getElementById('chat-messages'); // child where HTML injected
  const replyForm = document.getElementById('reply-form');
  const deptId = '<?= $department_id ?>';

  let pollInterval = null;
  let countInterval = null;

  function scrollToBottom() {
    if (chatContainer) {
      // primary: scroll the container that actually scrolls
      chatContainer.scrollTop = chatContainer.scrollHeight;
    }
    // secondary: if messages have .message nodes, scroll last into view
    if (chatMessages) {
      const last = chatMessages.querySelector('.message:last-child');
      if (last) last.scrollIntoView({ block: 'end', behavior: 'auto' });
    }
  }

  async function loadMessages() {
    try {
      const res = await fetch('fetch_messages.php?dept_id=' + encodeURIComponent(deptId) + '&_=' + Date.now(), { cache: 'no-store' });
      const html = await res.text();
      if (chatMessages) {
        chatMessages.innerHTML = html;
        // allow brief time for layout (images/fonts) then scroll
        //setTimeout(scrollToBottom, 50);
      }

if (chatModal.style.display === 'block') {
      await markAsRead();
    }

      
    } catch (err) {
      console.error('loadMessages error', err);
    }
  }

  async function markAsRead() {
    try {
      await fetch('update_status.php?dept_id=' + encodeURIComponent(deptId));
      const badge = document.getElementById('chat-count');
      if (badge) badge.style.display = 'none';
    } catch (err) { console.error('markAsRead', err); }
  }

  chatIcon && chatIcon.addEventListener('click', () => {
    chatModal.style.display = 'block';
    loadMessages();
    markAsRead();
    setTimeout(scrollToBottom, 50);
  
  });
  
    if (!pollInterval) pollInterval = setInterval(loadMessages, 2000);
    if (!countInterval) { updateChatCount(); countInterval = setInterval(updateChatCount, 2000); }

  chatClose && chatClose.addEventListener('click', () => {
    chatModal.style.display = 'none';
    // if (pollInterval) { clearInterval(pollInterval); pollInterval = null; }
    // if (countInterval) { clearInterval(countInterval); countInterval = null; }
  });

  replyForm && replyForm.addEventListener('submit', async function(e) {
    e.preventDefault();
    const btn = this.querySelector('button[type="submit"]');
    const input = this.querySelector('#reply');
    const val = input && input.value.trim();
    if (!val) return;
    btn.disabled = true;
    try {
      const body = new URLSearchParams({ dept_id: deptId, reply: val }).toString();
      const res = await fetch('message_action.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body
      });
      const data = await res.json();
      if (data.status === 'success') {
        input.value = '';
        await loadMessages();
      } else {
        alert(data.message || 'Failed to send message');
      }
    } catch (err) {
      console.error('send error', err);
      alert('Error sending message');
    } finally {
      btn.disabled = false;
      setTimeout(scrollToBottom, 80);
    }
  });

  async function updateChatCount() {
    try {
      const res = await fetch('count_unread.php?dept_id=' + encodeURIComponent(deptId) + '&_=' + Date.now(), { cache: 'no-store' });
      const txt = await res.text();
      const count = parseInt(txt) || 0;
      let badge = document.getElementById('chat-count');
      if (count > 0) {
        if (!badge) {
          const icon = document.getElementById('chat-icon');
          badge = document.createElement('span');
          badge.id = 'chat-count';
          badge.style.cssText = "position:absolute; top:-5px; right:-5px; background:red; color:#fff; font-size:12px; padding:2px 6px; border-radius:50%;";
          icon.appendChild(badge);
        }
        badge.innerText = count;
        badge.style.display = 'inline-block';
      } else {
        if (badge) badge.style.display = 'none';
      }
    } catch (err) {
      console.error('updateChatCount error', err);
    }
  }

  // initial count check
  updateChatCount();

})();
</script>




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
        $(document).ready(function() {
            $('#example').DataTable();
          } );
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable( {
                lengthChange: false,
                // buttons: [ 'copy', 'excel', 'pdf', 'print']
            } );
         
            table.buttons().container()
                .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
        } );
    </script>   <script src="assets/js/app.js"></script>

</body>

</html>
