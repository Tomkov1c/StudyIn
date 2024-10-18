<?php

function myHeader() 
{ 
    session_start();
    
    return '
    
    ';

}

function adminHeader() {

    $output = '<div class="w-fit 2xl:transform 2xl:-translate-y-1/2 h-fit p-[15px] bg-[var(--color-background)] outline outline-[var(--color-bad)] outline-[2px] rounded-2xl justify-start items-center gap-[15px] inline-flex fixed 2xl:top-1/2 top-5 left-1/2 transform -translate-x-1/2 2xl:left-[1%] 2xl:translate-x-0 2xl:flex-col flex-row">
                    <a href="../pages/profile.php?user=' . $_SESSION["user_id"].'"><img class=" h-[52px] min-w-[52px] rounded-md border-2 border-[var(--color-text)]" src="' .  $_SESSION["pfp"] . '" /></a>
                    <a href="create_new.php" class=" h-[52px] min-w-[52px] bg-[var(--color-primary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-plus"></i></a>
                    <a href="promotion.php" class=" h-[52px] min-w-[52px] bg-[var(--color-primary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-hand-point-up"></i></a>
                    ' . divider(false). '
                    <a href="../pages/browse.php" class=" h-[52px] min-w-[52px] bg-[var(--color-bad)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-arrow-left"></i></a>
                </div>';

    return $output;
}
function principalHeader() {

    $output = '<div class="w-fit 2xl:transform 2xl:-translate-y-1/2 h-fit p-[15px] bg-[var(--color-background)] outline outline-[var(--color-bad)] outline-[2px] rounded-2xl justify-start items-center gap-[15px] inline-flex fixed 2xl:top-1/2 top-5 left-1/2 transform -translate-x-1/2 2xl:left-[1%] 2xl:translate-x-0 2xl:flex-col flex-row">
                    <a href="../pages/profile.php?user=' . $_SESSION["user_id"].'"><img class=" h-[52px] min-w-[52px] rounded-md border-2 border-[var(--color-text)]" src="' .  $_SESSION["pfp"] . '" /></a>
                    <a href="course.php" class=" h-[52px] min-w-[52px] bg-[var(--color-primary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-plus"></i></a>
                    <a href="school.php" class=" h-[52px] min-w-[52px] bg-[var(--color-primary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-pen"></i></a>
                    <a href="promotion.php" class=" h-[52px] min-w-[52px] bg-[var(--color-primary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-hand-point-up"></i></a>
                    <a href="add_users.php" class=" h-[52px] min-w-[52px] bg-[var(--color-primary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-users"></i></a>
                    <a href="aplications.php" class=" h-[52px] min-w-[52px] bg-[var(--color-primary)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-newspaper"></i></a>
                    ' . divider(false). '
                    <a href="../pages/browse.php" class=" h-[52px] min-w-[52px] bg-[var(--color-bad)] rounded-md border-2 border-[var(--color-text)] flex-col justify-center items-center gap-2.5 flex"><i class="fa-solid fa-arrow-left"></i></a>
                </div>';

    return $output;
}


?>