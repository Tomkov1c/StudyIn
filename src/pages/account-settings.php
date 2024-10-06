<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <?php include "../components/MustInclude.php"; ?>
</head>
<body class="light bg-[var(--color-background)] overflow-x-hidden w-screen m-0 p-[75px] flex gap-[100px]">
    <div class="h-fit fixed w-[15%] p-[25px] bg-[var(--color-terciary)] rounded-md border-2 border-[#0b0f13] flex-col justify-start items-start gap-2.5 inline-flex">
        <?php echo h5("Table of Contents")?>
        <?php echo basicButton("Lorem", fullWidth: true, additionalClasses: "my-1") ?>
        <?php echo basicButton("Lorem", fullWidth: true, additionalClasses: "my-1") ?>
        <?php echo basicButton("Lorem", fullWidth: true, additionalClasses: "my-1") ?>
        <?php echo basicButton("Lorem", fullWidth: true, additionalClasses: "my-1") ?>
    </div>
    <div class=" flex-col w-[80%] ml-auto mr-0 justify-start items-start gap-5 inline-flex">
        <?php echo h3("Settings") ?>
        <?php echo p("Adelit quo, vero neque, eos amet totam quae tempora ut quis sed ratione. Eosvel ipsa alias ipsa lorem tempora, natus minima iusto odit ipsum, rem laborum iusto quam ut. Animilibero aut nobis, dolore quae neque, odio tempora vel, ut sunt ut quae, iusto. Etfacilis velit laborum ut qui totam vero facilis alias sed quam nobis odit facilis at. ") ?>
        <?php echo divider() ?>
        <?php echo h4("Account Information") ?>
        <?php echo divider(true) ?>
        <?php echo h5("Profile Picture") ?>
        <div class="self-stretch h-[249px] justify-start items-center gap-[30px] inline-flex">
            <img class="w-[249px] h-[249px] rounded-[229px] border-2 border-[#0b0f13]" src="https://via.placeholder.com/249x249" />
            <div class="w-[245px] p-2.5 flex-col justify-center items-start gap-2.5 inline-flex">
                <?php echo basicButton("Browse images", additionalClasses: "mb-2") ?>
                <?php echo basicButton("Remove image",) ?>
            </div>
        </div>
        <?php echo p("Dolorsunt autem quis tempore neque quam autem modi nobis qui id. Idculpa dolore, alias quas rem tempore vitae id rem ut! Ullammodi ad vel ad, natus elit dolor, in elit rem totam, in autem quis cumque. Adsed culpa ea, animi sint tempore nesciunt id eveniet odio lorem sit odit ipsum tempora. Ipsamid elit dolore natus facilis odio harum, odio sit. Minimaharum ea, alias illo lorem, at unde nesciunt odio tempore sint at culpa. ") ?>
        <?php echo divider() ?>
        
        <?php echo h5("Personal Information") ?>
        <?php echo basicInputField("Name","name", "name", true) ?>
        <?php echo basicInputField("Surname","surname", "surname", true) ?>
        <?php echo basicInputField("School Email","semail", "semail", true) ?>
        <?php echo basicButton("Change", fullWidth: true) ?>
        <?php echo divider() ?>

        <?php echo h5("Change Email") ?>
        <?php echo basicInputField("New Email","email", "email", true) ?>
        <?php echo basicInputField("Password","epassword", "epassword", true) ?>
        <?php echo basicButton("Change", fullWidth: true) ?>
        <?php echo divider() ?>
        <div class="justify-start items-center gap-2.5 inline-flex">
            <div class="text-[#0b0f13] text-xl font-semibold font-['Lexend Deca']">Change Password</div>
        </div>
        <div class="self-stretch h-[50px] bg-[#e6eef4] rounded-md justify-start items-center gap-2.5 inline-flex">
            <div class="grow shrink basis-0 h-[43px] pl-2.5 pr-[49px] py-[15px] bg-[#e6eef4] rounded-md border-l-2 border-r-2 border-t-2 border-b-4 border-[#0b0f13] justify-start items-center gap-[5px] flex">
                <div class="text-[#0b0f13]/50 text-lg font-normal font-['Lexend Deca']">Password</div>
            </div>
        </div>
        <div class="self-stretch h-[50px] bg-[#e6eef4] rounded-md justify-start items-center gap-2.5 inline-flex">
            <div class="grow shrink basis-0 h-[43px] pl-2.5 pr-[49px] py-[15px] bg-[#e6eef4] rounded-md border-l-2 border-r-2 border-t-2 border-b-4 border-[#0b0f13] justify-start items-center gap-[5px] flex">
                <div class="text-[#0b0f13]/50 text-lg font-normal font-['Lexend Deca']">Confirm Password</div>
            </div>
        </div>
        <div class="self-stretch h-[50px] justify-center items-center gap-[5px] inline-flex">
            <div class="grow shrink basis-0 h-[43px] px-[30px] py-[15px] bg-[#dfaf6c] rounded-md border-l-2 border-r-2 border-t-2 border-b-4 border-[#0b0f13] justify-center items-center gap-[5px] flex">
                <div class="text-center text-[#0b0f13] text-lg font-normal font-['Lexend Deca']">Change</div>
            </div>
        </div>
        <div class="justify-start items-center gap-2.5 inline-flex">
            <div class="text-[#0b0f13]/75 text-[15px] font-normal font-['Lexend Deca']">Changing will require email verification.</div>
        </div>
        <div class="h-0.5 justify-center items-center inline-flex">
            <div class="w-[1314px] self-stretch bg-[#0b0f13]/0 rounded-[74px]"></div>
        </div>
        <div class="self-stretch h-[50px] justify-center items-center gap-[5px] inline-flex">
            <div class="grow shrink basis-0 h-[43px] px-[30px] py-[15px] bg-[#6cdf88] rounded-md border-l-2 border-r-2 border-t-2 border-b-4 border-[#0b0f13] justify-center items-center gap-[5px] flex">
                <div class="text-center text-[#0b0f13] text-lg font-normal font-['Lexend Deca']">Update Info</div>
            </div>
        </div>
        <div class="h-0.5 justify-center items-center inline-flex">
            <div class="w-[1314px] self-stretch bg-[#0b0f13]/0 rounded-[74px]"></div>
        </div>
        <div class="h-0.5 justify-center items-center inline-flex">
            <div class="w-[1314px] self-stretch bg-[#0b0f13]/0 rounded-[74px]"></div>
        </div>
        <div class="justify-start items-center gap-2.5 inline-flex">
            <div class="text-[#0b0f13] text-[35px] font-semibold font-['Lexend Deca']">Miscellaneous </div>
        </div>
        <div class="h-0.5 justify-center items-center inline-flex">
            <div class="w-[1314px] self-stretch bg-[#0b0f13]/25 rounded-[74px]"></div>
        </div>
        <div class="h-0.5 justify-center items-center inline-flex">
            <div class="w-[1314px] self-stretch bg-[#0b0f13]/0 rounded-[74px]"></div>
        </div>
        <div class="justify-start items-center gap-2.5 inline-flex">
            <div class="text-[#0b0f13] text-xl font-semibold font-['Lexend Deca']">Delete Account</div>
        </div>
        <div class="self-stretch h-[50px] bg-[#e6eef4] rounded-md justify-start items-center gap-2.5 inline-flex">
            <div class="grow shrink basis-0 h-[43px] pl-2.5 pr-[49px] py-[15px] bg-[#e6eef4] rounded-md border-l-2 border-r-2 border-t-2 border-b-4 border-[#0b0f13] justify-start items-center gap-[5px] flex">
                <div class="text-[#0b0f13]/50 text-lg font-normal font-['Lexend Deca']">Password</div>
            </div>
        </div>
        <div class="self-stretch h-[50px] justify-center items-center gap-[5px] inline-flex">
            <div class="grow shrink basis-0 h-[43px] px-[30px] py-[15px] bg-[#df6c6c] rounded-md border-l-2 border-r-2 border-t-2 border-b-4 border-[#0b0f13] justify-center items-center gap-[5px] flex">
                <div class="text-center text-[#0b0f13] text-lg font-normal font-['Lexend Deca']">Delete Account</div>
            </div>
        </div>
    </div>
</body>
</html> 