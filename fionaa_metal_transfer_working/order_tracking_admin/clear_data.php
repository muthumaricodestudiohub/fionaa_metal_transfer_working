<?php
    include("include/connection.php");

    // Departments reset
    mysqli_query($link,"UPDATE `departments` 
                        SET use_gold='0', loss='0', previous_gold='0'");
    // Alloy reset
    mysqli_query($link,"UPDATE `alloy` SET total_weight='0'");
    
    
    // Metal related data clear
    mysqli_query($link,"TRUNCATE TABLE `metal_tracking`");
    mysqli_query($link,"TRUNCATE TABLE `metal_entry`");
        // Orders aur tracking clear
    mysqli_query($link,"TRUNCATE TABLE `order_tracking`");
    mysqli_query($link,"TRUNCATE TABLE `orders`");
    
    
    mysqli_query($link,"TRUNCATE TABLE `loss`");

    // Messages clear
    mysqli_query($link,"TRUNCATE TABLE `message`");






    mysqli_query($link,"TRUNCATE TABLE `alloy_history`");

    // Redirect after completion
    header("Location: dashboard.php?success=data clear successfully");
    exit;

?> 