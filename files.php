<!-- uploading file   -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php
        echo "<h3 class='mt-4'>FILES DOWNLOAD </h3>"
        ?>

        <!-- حتي اشفر الداتا استخدم enctype="multipart/form-data"-->


        <form action="upload_file.php" method="post" enctype="multipart/form-data">
            <input type="file" placeholder="files" name="file-name" multiple>
            <input type="submit" value="upload">
        </form>
        <h1>------------------------------------------------</h1>
        <p style="color: teal;font-weight:600">

            <?php

            echo " (Y/m/d) Today is " . date("Y/m/d") . "<br>";
            echo "(Y.m.d) Today is " . date("Y.m.d") . "<br>";
            echo "(Y-m-d) Today is " . date("Y-m-d") . "<br>";
            echo "(l) day in week " . date("l") . "<br>";
            echo "(m) month is " . date("m") . "<br>";
            echo "(a) time now is is " . date("a") . "<br>";
            echo " (h/i/s) time now " . date("h/i/s") . "<br>";
            echo "<h2>--------------------- </h2>";
            echo 'use with cookes to limit time of صلاحية';
            echo "<br>";
            $t = strtotime("Next Saturday");

            echo 'created data by $t = strtotime("Next Saturday") variable is ' . "<br>" . date("Y-m-d  h:i:sa ", $t);

            echo "<h2>--------------------- </h2>";
            $d = mktime(11, 14, 54, 8, 12, 2022);
            echo 'created data by $d=mktime(11,14,54,8,12,2022) variable is ' . "<br>" . date("Y-m-d  h:i:s", $d);
            echo "<br>";
            echo "<h2>--------------------- </h2>";
            // ---- for time zone
            date_default_timezone_set("America/New_York"); #set dafault tiime zone for selected coutry 
            echo " (h/i/s) time now  in America/New_York " . date("h/i/s") . "<br>";
            // ---- for time zone
            echo "<h2>--------------------- </h2>";


            ?>

            <?php
            // 3--fiels

            echo "<h5>------------------------- files system --------------------------------------- </h5>";
            // open and close file on server 
            // fopen take two parameters("name of file.extension","r,w,a,x any one of them")
            // fread
            // fwrite
            // fclose
            // fcraete
            // a x w r +a +x +r +w
            echo "<h1>  1-fopen & fclose  file on server </h1>";
            echo ' $fileName = data.txt;
            $fileExist = file_exists($fileName);
            if ($fileExist) {
                echo "<>*file already exist in your folder</> ";
                $readFile = fopen($fileName, "r");
                if ($readFile) {
                    echo "<>**file opened succesfully </>";
                }
                echo "<>__now close your file </> ";
                if (fclose($readFile)) {
                    echo "file cloese succesfully";
                }
            } else {
                echo "your file not exist";
            }
            ';
            echo "<br>";
            echo "<h1 style='color:red'>Result</h1>";
            $fileName = "data.txt";
            $fileExist = file_exists($fileName);
            if ($fileExist) {
                echo "<h4  style='color:green'>*file already exist in your folder</h4> ";
                $readFile = fopen($fileName, "r");
                if ($readFile) {
                    echo "<h3  style='color:blue'>**file opened succesfully </h3>";
                }
                echo "<h3  style=''>__now close your file </h3> ";
                if (fclose($readFile)) {
                    echo "file cloese succesfully";
                }
            } else {
                echo "your file not exist";
            }
            echo "<h2>--------------------- </h2>";
            echo "<h1>  2-fread with fopen and fclose </h1>";
            $fraedfopenfclose = "fraedfopenfclose.txt";
            if (file_exists($fraedfopenfclose)) {
                //  open file
                $fileopen = fopen($fraedfopenfclose, "r+") or die("error :can not open your file ...");

                //  read file
                $fileread = fread($fileopen, "1001");  #1001 LENGTH OF LETTERS OF DATA FROM fraedfopenfclose.txt WHICH DISPALY IN BROWSER 

                // close file
                $fieclose = fclose($fileopen);
                echo $fileread;
            } else {
                echo "ERROR :file dose not exist ";
            }

            echo "<br>";

            echo ' <p style="color:blue;font-weight:600">// r  يطبع الداتا الموجودة بالملف اللي اني مشتغلة عليه .<br>
            // w   راح يمسح كل الداتا الموجودة بالملف ومع كل refresh for browswer .<br>
            // a الداتا راح تنسح فبس كتابة ملراح يعرض شي ع البراوزر .<br>
            // x create new file اذا كان موجود راح طلع ايررور  .<br>
            // after create file file will save in your folder.<br>
            // a & w.---- w--> delete file data and statrt from zero but ///a ---> complete old data without delete .<br>
            // a+ w+ r+ for read and write</h3>
            ';

            // r  يطبع الداتا الموجودة بالملف اللي اني مشتغلة عليه 
            // w   راح يمسح كل الداتا الموجودة بالملف ومع كل refresh for browswer 
            // a الداتا راح تنسح فبس كتابة ملراح يعرض شي ع البراوزر
            // x create new file اذا كان موجود راح طلع ايررور  
            // after create file file will save in your folder
            // a & w.---- w--> delete file data and statrt from zero but ///a ---> complete old data without delete
            // a+ w+ r+ for read and write

            echo "<h2>--------------------- </h2>";
            echo "<h1>  3-fwrite </h1>";
            echo '     $fileWrite = "newfile.txt";
            $data = "barar muthanna rakea ahmed react front end php laravel mysql ";
            $fileOpeen = fopen($fileWrite, "w");
            fwrite($fileOpeen,$data) or die ("Error here ");
            fclose($fileOpeen);';
            echo "<br>";
            echo "<br>";
            $fileWrite = "newfile.txt";
            $data = "barar muthanna rakea ahmed react front end php laravel mysql ";
            $fileOpeen = fopen($fileWrite, "w");
            fwrite($fileOpeen,$data) or die ("Error here ");
            fclose($fileOpeen);
            
            echo "abrar muthanna rakea ahmed ";



























            // echo '1--  $readFile = fopen("data.txt", "r")
            // "<br>"
            // if ($readFile) {
            //     echo "file opened succesfully ";
            // }else{
            //     fclose($readFile);
            // }';
            // echo "<br>";
            // $readFile = fopen("data.txt", "r");
            // if ($readFile) {
            //     echo "<h1>file opened succesfully </h1>";
            // } else {
            //     fclose($readFile);
            // }

            ?>


        </p>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

</body>

</html>



<?php


// 2----------------------------------------require & include
// الاثنين يستدعون ملف مثل شغل import in raect
// require اذا صار عطل بوحد متحمل الباقين
// include اذا صار عطل بواحد تستدعي الثاني وتمشي متوكف الشغل
// require "ma.php ";  
// require "main.php ";

?>

<?php

// 3---------date
// d---day of month (1-31)
// m--month (1-12)
// Y  year
// l day of week
// H houre of day 24
// h hour in day 12
// i minutes (0-59)
// s seconds (0-59)
// a pm or|| am 

// echo " (Y/m/d) Today is ".date("Y/m/d")."<br>";
// echo "(Y.m.d) Today is ".date("Y.m.d")."<br>";
// echo "(Y-m-d) Today is ".date("Y-m-d")."<br>";
// echo "(l) Today is ".date("l")."<br>";
// echo "(m) Today is ".date("m")."<br>";
// echo " (h/i/s) Today is ".date("h/i/s")."<br>";
// echo "(a) Today is ".date("a")."<br>";
?>