<?php

function myFooter() 
{
    return '
    <div class="h-[188px] p-[50px] bg-[var(--color-terciary)] rounded-[25px] border-2 border-[var(--color-text)] justify-center items-start gap-[100px] inline-flex">
        <div class="flex-col justify-center items-start gap-[25px] inline-flex">
            <div class="text-center text-[var(--color-text)] text-[35px] font-extrabold font-["Lexend Deca"]">StudyIn</div>
            <div class="text-center text-[var(--color-text)] text-[15px] font-normal font-["Lexend Deca"]">©Copyright 2024 - Tom Kliner</div>
        </div>
        <div class="grow shrink basis-0 self-stretch flex-col justify-center items-start gap-[25px] inline-flex">
            <div class="text-center text-[var(--color-text)] text-[15px] font-normal font-["Lexend Deca"]">©Copyright 2024 - Tom Kliner</div>
        </div>
    </div>
    ';

}
?>