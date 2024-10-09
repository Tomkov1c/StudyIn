<?php

function indexButton($text, $fullWidth = false, $additionalClasses = "", $href = null) {

    $classes = "bg-[var(--color-secondary)] 
                px-[30px] py-[10px] outline outline-[var(--color-text)] outline-2] 
                rounded-md shadow-[0px_4px_0px_3px_var(--color-text)] relative top-0 block
                mx-0.5 font-sans font-medium text-xl";
    $hover = "shadow-[0px_0px_0px_3px_var(--color-text)] top-1";
    $click = "bg-[var(--color-secondary25)]";
    $animations = "transition-all duration-500 ease-[cubic-bezier(0,1,0,1)]";

    $hover = " " . $hover;
    $click = " " . $click;
    $allClasses = $classes . ' ' . str_replace(" ", " hover:", $hover). ' ' . str_replace(" ", " focus:", $hover) .' ' . str_replace(" ", " active:", $click) . " " . $animations;

    if($fullWidth) {
        $allClasses = $allClasses . " w-full";
    }

    if($additionalClasses != "") {
        $allClasses = $allClasses . " " . $additionalClasses;
    }
    
    return '
        <a class="' . $allClasses . '" href= "' . $href . '">' . $text .'</a>
        ';
}
?>