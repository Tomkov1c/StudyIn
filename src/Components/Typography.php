<?php

function h1($text, $fullWidth = false, $highlightable = true, $additionalClasses = null) 
{
    $classes = "text-[var(--color-text)] text-[100px] font-black font-sans h-fit";
    $click = "";
    $animations = "";

    // str_replace(" ", " hover:", " ". $hover) .' ' . str_replace(" ", " active:", " ". $click) . " "
    $allClasses = $classes . ' ' . $animations . ' ' . $additionalClasses;

    if($fullWidth) {
        $allClasses = $allClasses . " w-full";
    }
    if(!$highlightable) {
        $allClasses = $allClasses . " select-none";
    }
    
    return '<h1 class="' . $allClasses . '">' . $text . '</h1>';

}

function h2($text, $fullWidth = false, $highlightable = true, $additionalClasses = null) 
{
    $classes = "text-[var(--color-text)] text-[64px] font-extrabold font-sans h-fit";
    $click = "";
    $animations = "";

    // str_replace(" ", " hover:", " ". $hover) .' ' . str_replace(" ", " active:", " ". $click) . " "
    $allClasses = $classes . ' ' . $animations . ' ' . $additionalClasses;

    if($fullWidth) {
        $allClasses = $allClasses . " w-full";
    }
    if(!$highlightable) {
        $allClasses = $allClasses . " select-none";
    }
    
    return '<h2 class="' . $allClasses . '">' . $text . '</h2>';

}

function h3($text, $fullWidth = false, $highlightable = true, $additionalClasses = null) 
{
    $classes = "text-[var(--color-text)] text-[50px] font-bold font-sans h-fit w-fill";
    $click = "";
    $animations = "";

    // str_replace(" ", " hover:", " ". $hover) .' ' . str_replace(" ", " active:", " ". $click) . " "
    $allClasses = $classes . ' ' . $animations . ' ' . $additionalClasses;

    if($fullWidth) {
        $allClasses = $allClasses . " w-full";
    }
    if(!$highlightable) {
        $allClasses = $allClasses . " select-none";
    }
    
    return '<h3 class="' . $allClasses . '">' . $text . '</h3>';

}

function h4($text, $fullWidth = false, $highlightable = true, $additionalClasses = null) 
{
    $classes = "text-[var(--color-text)] text-[35px] font-semibold font-sans h-fit w-fill";
    $click = "";
    $animations = "";

    // str_replace(" ", " hover:", " ". $hover) .' ' . str_replace(" ", " active:", " ". $click) . " "
    $allClasses = $classes . ' ' . $animations . ' ' . $additionalClasses;

    if($fullWidth) {
        $allClasses = $allClasses . " w-full";
    }
    if(!$highlightable) {
        $allClasses = $allClasses . " select-none";
    }
    
    return '<h4 class="' . $allClasses . '">' . $text . '</h4>';

}

function h5($text, $fullWidth = false, $highlightable = true, $additionalClasses = null) 
{
    $classes = "text-[var(--color-text)] text-[20px] font-semibold font-sans h-fit w-fill";
    $click = "";
    $animations = "";

    // str_replace(" ", " hover:", " ". $hover) .' ' . str_replace(" ", " active:", " ". $click) . " "
    $allClasses = $classes . ' ' . $animations . ' ' . $additionalClasses;

    if($fullWidth) {
        $allClasses = $allClasses . " w-full";
    }
    if(!$highlightable) {
        $allClasses = $allClasses . " select-none";
    }
    
    return '<h5 class="' . $allClasses . '">' . $text . '</h5>';

}

function h6($text, $fullWidth = false, $highlightable = true, $additionalClasses = null) 
{
    $classes = "text-[var(--color-text)] text-[15px] font-normal font-sans h-fit w-fill";
    $click = "";
    $animations = "";

    // str_replace(" ", " hover:", " ". $hover) .' ' . str_replace(" ", " active:", " ". $click) . " "
    $allClasses = $classes . ' ' . $animations . ' ' . $additionalClasses;

    if($fullWidth) {
        $allClasses = $allClasses . " w-full";
    }
    if(!$highlightable) {
        $allClasses = $allClasses . " select-none";
    }
    
    return '<h6 class="' . $allClasses . '">' . $text . '</h6>';

}

function p($text, $fullWidth = false, $highlightable = true, $additionalClasses = null) 
{
    $classes = "text-[var(--color-text)] text-[15px] font-normal font-sans h-fit w-fill";
    $click = "";
    $animations = "";

    // str_replace(" ", " hover:", " ". $hover) .' ' . str_replace(" ", " active:", " ". $click) . " "
    $allClasses = $classes . ' ' . $animations . ' ' . $additionalClasses;

    if($fullWidth) {
        $allClasses = $allClasses . " w-full";
    }
    if(!$highlightable) {
        $allClasses = $allClasses . " select-none";
    }
    
    return '<p class="' . $allClasses . '">' . $text . '</p>';

}

function caption($text, $fullWidth = false, $highlightable = true, $additionalClasses = null) 
{
    $classes = "text-[var(--color-text)] text-[10px] font-light font-sans h-fit w-fill";
    $click = "";
    $animations = "";

    // str_replace(" ", " hover:", " ". $hover) .' ' . str_replace(" ", " active:", " ". $click) . " "
    $allClasses = $classes . ' ' . $animations . ' ' . $additionalClasses;

    if($fullWidth) {
        $allClasses = $allClasses . " w-full";
    }
    if(!$highlightable) {
        $allClasses = $allClasses . " select-none";
    }
    
    return '<p class="' . $allClasses . '">' . $text . '</p>';

}
?>