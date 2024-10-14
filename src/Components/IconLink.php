<?php
function iconLink($text, $icon, $additionalClasses = null, $href = null) 
{
    $classes = "w-fit inline-flex gap-[7px] h-fit cursor-default border border-b-transparent border-dashed";
    $hover = "";
    $click = "";
    $animations = "transition-all duration-500 ease-[cubic-bezier(0,1,0,1)]";

    if($href != null || $href != "") {
        $href = 'href="' . $href . '"';
        $classes = $classes . " cursor-pointer";
        $hover = "border-b-[var(--color-text)]";
        $click = "text-[var(--color-text25)]";
    }

    $output = '<a ' . $href . ' class="' . $classes . str_replace(" ", " hover:", " " . $hover). str_replace(" ", " active:", subject: " " . $click) . ' ' . $animations . ' ' . $additionalClasses . '">
                        <i class="' . $icon .' block h-fit mt-0 mb-auto text-2xl text-[var(--color-text)]"></i>
                        <div class="text-[var(--color-text)] text-lg font-semibold font-sans my-auto">' . $text . '</div>
                    </a>';

    return $output;

}

?>