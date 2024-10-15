<?php 

function selectBox() {
    $result = "bg-[var(--color-background)] text-[var(--color-text)] px-[15px] py-[10px] font-sans text-xl font-medium 
                  hover:bg-[var(--color-primary)] hover:text-[var(--color-background)] cursor-pointer 
                  focus:bg-[var(--color-primary-dark)] focus:text-[var(--color-background)] 
                  transition-colors duration-300 ease-in-out";

    return $result;
}

?>