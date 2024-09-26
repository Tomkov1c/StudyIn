<?php

function basicButton($text, $href = '#') {

    $classes = "justify-center items-center inline-flex bg-[var(--color-primary)] font-sans px-[30px] py-[15px]
            rounded-md outl text-center flex 
            font-normal text-lg";
    return '<a class="' . $classes .'" href="' . $href . '">' . htmlspecialchars($text);
}
?>