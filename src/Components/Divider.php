<?php 
function divider($colored = null) {

    if($colored != null || $colored) {
        return '
            <div class="w-full h-0.5 self-stretch bg-[var(--color-text)] opacity-10 rounded-[74px]"></div>
        ';
    }else {
        return '
            <div class="w-full h-0.5 self-stretch bg-[var(--color-text)]/0 rounded-[74px]"></div>
        ';
    }
}


?>