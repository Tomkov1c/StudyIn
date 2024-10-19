<?php

function filterButton($text, $additionalClasses = "", $href) {

    $classes = "bg-[var(--color-secondary)] 
    px-[30px] py-[10px] outline outline-[var(--color-text)] outline-2] 
    rounded-[100vw] shadow-[0px_8px_0px_3px_var(--color-text)] relative top-[0px] block
    mx-0.5 font-sans font-medium text-xl";
    $hover = "shadow-[0px_4px_0px_3px_var(--color-text)] top-[4px]";
    $click = "bg-[var(--color-secondary25)]";
    $animations = "transition-all duration-500 ease-[cubic-bezier(0,1,0,1)]";

    $hover = " " . $hover;
    $click = " " . $click;
    $allClasses = $classes . ' ' . str_replace(" ", " hover:", $hover). ' ' . str_replace(" ", " focus:", $hover) .' ' . str_replace(" ", " active:", $click) . " " . $animations;

    if($additionalClasses != "") {
    $allClasses = $allClasses . " " . $additionalClasses;
    }

    return '
    <a href="' . $href . '" class="' . $allClasses . '">' . $text .'</a>
    ';
}
function toggledFilterButton($text, $additionalClasses = "", $href) {

        $classes = "bg-[var(--color-secondary)] 
        px-[30px] py-[10px] outline outline-[var(--color-text)] outline-2] 
        rounded-[100vw] shadow-[0px_0px_0px_3px_var(--color-text)] relative top-[8px] block
        mx-0.5 font-sans font-medium text-xl";
        $hover = "shadow-[0px_8px_0px_3px_var(--color-text)] top-[0px]";
        $click = "bg-[var(--color-secondary25)]";
        $animations = "transition-all duration-500 ease-[cubic-bezier(0,1,0,1)]";

        $hover = " " . $hover;
        $click = " " . $click;
        $allClasses = $classes . ' ' . str_replace(" ", " hover:", $hover). ' ' . str_replace(" ", " focus:", $hover) .' ' . str_replace(" ", " active:", $click) . " " . $animations;

        if($additionalClasses != "") {
        $allClasses = $allClasses . " " . $additionalClasses;
        }

        return '
        <a href="' . $href . '" class="' . $allClasses . '">' . $text .'</a>
        ';
}
?>