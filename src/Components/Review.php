<?php
function reviewFromUser($user, $rating, $comment = null, $pfp, $additionalClasses = null) 
{
    $classes = "w-[397px] h-fit bg-[var(--color-accent)] rounded-md justify-center items-start inline-flex outline outline-[var(--color-text)] outline-2] p-5
                shadow-[0px_7px_0px_3px_var(--color-text)] relative top-0 flex-col justify-center items-start gap-2.5 inline-flex";
    $hover = "shadow-[0px_0px_0px_3px_var(--color-text)] top-[9px]";
    $click = "bg-[var(--color-accentclicked)]";
    $animations = "transition-all duration-500 ease-[cubic-bezier(0,1,0,1)]";

    $output = '<div ' . ' class="' . $classes . str_replace(" ", " hover:", " " . $hover). str_replace(" ", " active:", subject: " " . $click) . ' ' . $animations . ' ' . $additionalClasses . '">
                        <div class="self-stretch h-fit justify-start items-center gap-[25px] inline-flex">
                            <img class="max-h-[60px] rounded-[100px] select-none" src="' . $pfp . '" />
                            <div class="my-auto h-fit">
                                <h4 class="text-[var(--color-text)] text-xl font-semibold font-sans select-none">'. $user .'</h4>
                                <h5 class="text-[var(--color-text)] text-[15px] font-normal font-sans select-none">'. $rating .'</h5>
                            </div>
                        </div>
                        <p class="grow shrink basis-0 text-[var(--color-text)] text-[15px] font-normal font-sans"> ' . $comment . '</p>
                    </div>';

    return $output;

}

function reviewForSchool($school, $rating, $comment = null, $schoolLogo, $additionalClasses = null, $schoolId) 
{
    $classes = "w-[397px] h-fit bg-[var(--color-accent)] rounded-md justify-center items-start inline-flex outline outline-[var(--color-text)] outline-2] p-5
                shadow-[0px_7px_0px_3px_var(--color-text)] relative top-0 flex-col justify-center items-start gap-2.5 inline-flex";
    $hover = "shadow-[0px_0px_0px_3px_var(--color-text)] top-[9px]";
    $click = "bg-[var(--color-accentclicked)]";
    $animations = "transition-all duration-500 ease-[cubic-bezier(0,1,0,1)]";

    $output = '<a ' . ' href="../pages/details.php?school=' . $schoolId . '" ' . ' class="' . $classes . str_replace(" ", " hover:", " " . $hover). str_replace(" ", " active:", subject: " " . $click) . ' ' . $animations . ' ' . $additionalClasses . '">
                        <div class="self-stretch h-fit justify-start items-center gap-[25px] inline-flex">
                            <img class="max-h-[60px] rounded-[15px] select-none" src="' . $schoolLogo . '" />
                            <div class="my-auto h-fit">
                                <h4 class="text-[var(--color-text)] text-xl font-semibold font-sans select-none">'. $school .'</h4>
                                <h5 class="text-[var(--color-text)] text-[15px] font-normal font-sans select-none">'. $rating .'</h5>
                            </div>
                        </div>
                        <p class="grow shrink basis-0 text-[var(--color-text)] text-[15px] font-normal font-sans"> ' . $comment . '</p>
                    </a>';

    return $output;

}

?>