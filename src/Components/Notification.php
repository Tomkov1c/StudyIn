<?php
function notification($title, $detail, $additionalClasses = null) 
{
    $classes = "w-[397px] h-fit bg-[var(--color-accent)] rounded-md items-start inline-flex 
                outline outline-[var(--color-text)] outline-2] p-5 relative top-0 items-start gap-[20px] inline-flex";

    $output = '<a ' . ' class="' . $classes . ' ' . $additionalClasses . '">
                        <i class="fa-solid fa-bell text-2xl block my-auto"></i>
                        <div class="my-auto h-fit">
                            <h4 class="text-[var(--color-text)] text-xl font-semibold font-sans select-none">'. $title .'</h4>
                            <h5 class="text-[var(--color-text)] text-[15px] font-normal font-sans select-none">'. $detail .'</h5>
                        </div>
                </a>';

    return $output;

}

?>