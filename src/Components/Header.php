<?php

function userHeader($profile = false, $search = false, $settings = false, $logout = false, $goBack = false, $admin = false, $principal = false, $applicationist = false ) {

    $output = '<div class="w-fit 2xl:transform 2xl:-translate-y-1/2 h-fit p-[15px] bg-[var(--color-background)] outline outline-[var(--color-text)] outline-[2px] rounded-2xl justify-start items-center gap-[15px] inline-flex fixed 2xl:top-1/2 top-5 left-1/2 transform -translate-x-1/2 2xl:left-[1%] 2xl:translate-x-0 2xl:flex-col flex-row">';

    if($profile)
        $output = $output . '<a title="Your profile" href="../pages/profile.php?user=' . $_SESSION["user_id"].'"><img class=" h-[52px] min-w-[52px] rounded-md border-2 border-[var(--color-text)]" src="' .  $_SESSION["pfp"] . '" /></a>';
                    
    if($search)
        $output = $output . '<a title="Search" href="../pages/browse.php" class=" h-[52px] min-w-[52px] bg-[var(--color-primary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-magnifying-glass"></i></a>';
                    
    if($search)
        $output = $output . '<a title="Settings" href="../pages/account-settings.php" class=" h-[52px] min-w-[52px] bg-[var(--color-primary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-gear "></i></a>';
                    
    if($admin && ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 2 || $_SESSION['user_role'] == 3)) {
        $output = $output . divider(false) . '<a title="Admin panel" href="../admin/dashboard.php" class=" h-[52px] min-w-[52px] bg-[var(--color-bad)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-user-tie"></i></a>';

    }else if($admin && $_SESSION['user.isPrincipal'] != false) {
        $output = $output . divider(false) . '<a title="Principal panel" href="../principal/dashboard.php" class=" h-[52px] min-w-[52px] bg-[var(--color-bad)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-id-badge"></i></a>';

    }else if($applicationist && $_SESSION['user_role'] == 4) {
        $output = $output . divider(false) . '<a title="Applications panel" href="../principal/aplications.php" class=" h-[52px] min-w-[52px] bg-[var(--color-bad)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-list"></i></a>';

    }

    if($logout)
        $output = $output .  divider(false) . '<a title="Log out" href="../Scripts/user_logout.php" class=" h-[52px] min-w-[52px] bg-[var(--color-bad)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-door-open"></i></a>';

    if($goBack != false && $logout == true) {
        $output = $output . '<a title="Go back" href="' . $goBack . '" class=" h-[52px] min-w-[52px] bg-[var(--color-secondary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-arrow-left"></i></a>';
    }else if ($goBack != false && $logout == false) {
        $output = $output .  divider(false) . '<a title="Go back" href="' . $goBack . '" class=" h-[52px] min-w-[52px] bg-[var(--color-secondary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-arrow-left"></i></a>';
    }

    $output = $output . '</div>';

    return $output;
}

function adminHeader() {

    $output = '<div class="w-fit 2xl:transform 2xl:-translate-y-1/2 h-fit p-[15px] bg-[var(--color-background)] outline outline-[var(--color-bad)] outline-[2px] rounded-2xl justify-start items-center gap-[15px] inline-flex fixed 2xl:top-1/2 top-5 left-1/2 transform -translate-x-1/2 2xl:left-[1%] 2xl:translate-x-0 2xl:flex-col flex-row">
                    <a title="Your profile" href="../pages/profile.php?user=' . $_SESSION["user_id"].'"><img class=" h-[52px] min-w-[52px] rounded-md border-2 border-[var(--color-text)]" src="' .  $_SESSION["pfp"] . '" /></a>
                    <a title="New ..." href="create_new.php" class=" h-[52px] min-w-[52px] bg-[var(--color-primary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-plus"></i></a>
                    <a title="Promotion" href="promotion.php" class=" h-[52px] min-w-[52px] bg-[var(--color-primary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-hand-point-up"></i></a>
                    ' . divider(false). '
                    <a title="Go back" href="../pages/browse.php" class=" h-[52px] min-w-[52px] bg-[var(--color-bad)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-arrow-left"></i></a>
                </div>';

    return $output;
}
function principalHeader() {

    $output = '<div class="w-fit 2xl:transform 2xl:-translate-y-1/2 h-fit p-[15px] bg-[var(--color-background)] outline outline-[var(--color-bad)] outline-[2px] rounded-2xl justify-start items-center gap-[15px] inline-flex fixed 2xl:top-1/2 top-5 left-1/2 transform -translate-x-1/2 2xl:left-[1%] 2xl:translate-x-0 2xl:flex-col flex-row">
                    <a title="Your profile" href="../pages/profile.php?user=' . $_SESSION["user_id"].'"><img class=" h-[52px] min-w-[52px] rounded-md border-2 border-[var(--color-text)]" src="' .  $_SESSION["pfp"] . '" /></a>
                    <a title="Add course" href="course.php" class=" h-[52px] min-w-[52px] bg-[var(--color-primary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-plus"></i></a>
                    <a title="Edit school info" href="school.php" class=" h-[52px] min-w-[52px] bg-[var(--color-primary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-pen"></i></a>
                    <a title="Promotion" href="promotion.php" class=" h-[52px] min-w-[52px] bg-[var(--color-primary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-hand-point-up"></i></a>
                    <a title="Add to the collective" href="add_users.php" class=" h-[52px] min-w-[52px] bg-[var(--color-primary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-users"></i></a>
                    <a title="Applications" href="aplications.php" class=" h-[52px] min-w-[52px] bg-[var(--color-primary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-newspaper"></i></a>
                    ' . divider(false). '
                    <a title="Go back" href="../pages/browse.php" class=" h-[52px] min-w-[52px] bg-[var(--color-bad)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-arrow-left"></i></a>
                </div>';

    return $output;
}


?>