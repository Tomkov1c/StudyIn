<?php
function display($title, $organizer = null, $year, $image, $additionalClasses = null, $href = null) 
{
    if($organizer != null) {
        $organizer = '<div class="justify-start items-center gap-2.5 block w-min-fit w-max-[75%] overflow-hidden">
                        <div class="text-[var(--color-text)] text-[15px] font-normal font-sans truncate ">' . $organizer . '</div>
                        </div>';
    }
    $output = '<a ' . 'href="' . $href . '"' . ' class="w-[31.66%] h-[343px] p-5 bg-[var(--color-accent)] rounded-md border-l-2 border-r-2 border-t-2 border-b-4 border-[var(--color-text)] flex-col justify-center items-start gap-2.5 inline-flex' . ' ' . $additionalClasses . '">
                        <img class="min-w-full h-[226px] rounded-md object-cover" src="' . $image . '">
                        <div class="justify-start items-center gap-2.5 inline-flex">
                            <div class="text-[var(--color-text)] text-xl font-semibold font-sans">' . $title . '</div>
                        </div>
                        <div class="justify-start items-center gap-[10px] inline-flex w-full">
                            '.
                                $organizer
                            .'
                            <div class="justify-start items-center gap-2.5 flex w-[7rem]">
                                <div class="text-[var(--color-text)]/75 text-[15px] font-thin opacity-75 select-none w-fit font-sans">' . $year . '</div>
                            </div>
                        </div>
                    </a>';

    return $output;

}

?>