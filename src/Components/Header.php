<?php

function myHeader() 
{ 
    return '
    <div class="w-fill z-10 sticky top-10 mt-[-5vh] h-[110px] px-[50px] py-[5px] bg-[var(--color-terciary)] rounded-[25px] border-2 border-[var(--color-text)] justify-start items-center gap-2.5 inline-flex">
        <div class="grow shrink basis-0 h-[104px] py-[30px] justify-start items-center gap-2.5 flex">
            <div class="text-center text-[var(--color-text)] text-[35px] font-extrabold font-["Lexend Deca"]">StudyIn</div>
        </div>
        <div class="h-[19px] justify-center items-center gap-2.5 flex">
            
        </div>
        <div class="grow shrink basis-0 h-[78px] justify-end items-center gap-2.5 flex">
            <img class="w-[78px] h-[78px] rounded-[999px] border-2 border-[var(--color-text)]" src="https://via.placeholder.com/78x78" />
        </div>
    </div>
    ';

}
?>