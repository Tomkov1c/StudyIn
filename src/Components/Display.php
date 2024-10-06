<?php
function display($title, $organizer, $year, $image, $additionalClasses = null) 
{
    
    return '<div class="w-[31.66%] h-[343px] p-5 bg-[var(--color-accent)] rounded-md border-l-2 border-r-2 border-t-2 border-b-4 border-[var(--color-text)] flex-col justify-center items-start gap-2.5 inline-flex' . ' ' . $additionalClasses . '">
                        <img class="min-w-full h-[226px] rounded-md object-cover" src="' . $image . '">
                        <div class="justify-start items-center gap-2.5 inline-flex">
                            <div class="text-[var(--color-text)] text-xl font-semibold font-sams">' . $title . '</div>
                        </div>
                        <div class="justify-start items-center gap-[5px] inline-flex">
                            <div class="justify-start items-center gap-2.5 flex">
                                <div class="text-[var(--color-text)] text-[15px] font-normal font-sams">' . $organizer . '</div>
                            </div>
                            <div class="justify-start items-center gap-2.5 flex">
                                <div class="text-[var(--color-text)]/75 text-[15px] font-normal font-sams">' . $year . '</div>
                            </div>
                        </div>
                    </div>';

}

?>