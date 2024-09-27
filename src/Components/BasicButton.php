<?php

function basicButton($text, $function = null, $fullWidth = false, $additionalClasses = "", $type = "button") {

    $classes = "button h-[53px] justify-center items-center gap-[5px] inline-flex bg-[var(--color-primary)] 
                px-[30px] py-[15px] outline outline-[var(--color-text)] outline-2] 
                rounded-md shadow-[0px_4px_0px_3px_var(--color-text)] relative top-0 block
                mx-0.5";
    $hover = "shadow-[0px_0px_0px_3px_var(--color-text)] top-1";
    $click = "bg-[var(--color-primary25)]";
    $animations = "transition-all duration-500 ease-[cubic-bezier(0,1,0,1)]";

    $hover = " " . $hover;
    $click = " " . $click;
    $allClasses = $classes . ' ' . str_replace(" ", " hover:", $hover) .' ' . str_replace(" ", " active:", $click) . " " . $animations;

    if($fullWidth) {
        $allClasses = $allClasses . " w-full";
    }

    if($additionalClasses != "") {
        $allClasses = $allClasses . " " . $additionalClasses;
    }
    
    if($type == "button") {
        return '
        <button class="' . $allClasses . '" onclick="' . $function . '">' . $text .'</button>
        ';
    }else if ($type == "a") {
        return '
        <a class="' . $allClasses . '" onclick="' . $function . '">' . $text .'</a>
        ';
    }else {
        return "error";
    }
}
?>