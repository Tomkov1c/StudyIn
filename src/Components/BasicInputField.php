<?php

function basicInputField($placeholder, $id, $name, $fullWidth = false, $additionalClasses = "", $type = "text", $required = null, $value = null) {

    $classes = "h-[53px] justify-center items-center gap-[5px] inline-flex bg-[var(--color-background)] 
                px-[15px] py-[10px] outline outline-[var(--color-text)] outline-2] 
                rounded-md shadow-[0px_4px_0px_3px_var(--color-text)] relative top-0 block
                mx-0.5 placeholder-gray-500 font-sans text-xl font-medium";
    $hover = "shadow-[0px_0px_0px_3px_var(--color-text)] top-1";
    $focus = "shadow-[0px_0px_0px_3px_var(--color-text)] top-1";
    $click = "";
    $animations = "transition-all duration-500 ease-[cubic-bezier(0,1,0,1)]";

    $allClasses = $classes . ' ' . str_replace(" ", " hover:", " " . $hover) .' ' . str_replace(" ", " active:", " " . $click) . " " . str_replace(" ", " focus:", " " . $focus) . " " . $animations;

    if($fullWidth) {
        $allClasses = $allClasses . " w-full";
    }

    if($additionalClasses != "") {
        $allClasses = $allClasses . " " . $additionalClasses;
    }
    
    if($required != null)
    {
        $required = "required";
    } 
    if($value != null) {
        $value = 'value="' . $value . '"';
    }

    return '
    <input type="' . $type . '" id="' . $id . '" name="' . $name . '" class="' . $allClasses . '" placeholder="' . $placeholder . '"' . $value . $required . '>';

}
?>