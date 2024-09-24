<?php
// Define a dynamic component as a function
function basicButton($text, $href = '#') {
    return '<a class="justify-center items-center inline-flex bg-[var(--color-primary)] font-sans px-[30px] py-[15px]
            rounded-md border-l-2 border-r-2 border-t-2 border-b-4 border-[var(--color-text)] text-center flex font-normal text-lg"
            href="' . $href . '">' . htmlspecialchars($text) . '</a>';
}
?>