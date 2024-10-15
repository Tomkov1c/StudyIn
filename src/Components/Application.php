<?php
function application($title, $date, $status, $image, $additionalClasses = null, $href) 
{
    $classes = "w-[500px] min-h-[343px] h-fit p-5 
                rounded-md outline outline-[var(--color-text)] outline-2]
                shadow-[0px_7px_0px_3px_var(--color-text)] relative top-0 flex-col justify-center items-start gap-2.5 inline-flex";
    $hover = "shadow-[0px_0px_0px_3px_var(--color-text)] top-[9px] cursor-pointer";
    $click = "bg-[var(--color-accentclicked)]";
    $animations = "transition-all duration-500 ease-[cubic-bezier(0,1,0,1)]";

    if($status == "true") {
        $newStatus = "Approved";
        $classes = $classes . " bg-[var(--color-good)]";
    }else if ($status == "false") {
        $newStatus = "Declined";
        $classes = $classes . " bg-[var(--color-bad)]";
    }else {
        $newStatus = "Pending";
        $classes = $classes . " bg-[var(--color-accent)]";
    }

    $output = '<a ' . 'href="' . $href . '"' . ' class="' . $classes . str_replace(" ", " hover:", " " . $hover). str_replace(" ", " active:", subject: " " . $click) . ' ' . $animations . ' ' . $additionalClasses . '">
                        <img class="min-w-full h-[226px] rounded-md object-cover select-none" src="' . $image . '">
                        <h4 class="text-[var(--color-text)] text-[35px] font-semibold font-sans h-fit w-fill select-none">' . $title . '</h4>
                        <div class="justify-start items-center gap-[10px] inline-flex w-full">
                            <h5 class="text-[var(--color-text)] text-[15px] font-normal font-sans truncate select-none">' . $date . '</h5>
                            <h6 class="text-[var(--color-text)]/75 text-[15px] font-thin opacity-90 w-fit font-sans select-none">' . $newStatus . '</h6>
                        </div>
                    </a>';

    return $output;

}

?>