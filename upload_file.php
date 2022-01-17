<!-- 1------------------------------------ -->
<?php
// basic things in files
// name 
// type
// size
// error

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1-اتاكد الملف اللي ينىفه مبي ايرور

    #isset هل موجودة 
    # && $_FILES["file-name"]["error"]==0  اذاالايرور صفر طلعلي الصورة
    if (isset($_FILES["file-name"]) && $_FILES["file-name"]["error"] == 0) {
        #assosative array with key and value
        # كل الامتدادات اللي اريدة
        $fileTypesallowd = array(
            "jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png", "gif" => "image/gif", "pdf" => "application/pdf", "mp4" => "video/mp4"
        );
        // video / mp4

        #هتلي name ,type,size
        $fileName = $_FILES["file-name"]["name"];
        $filetype = $_FILES["file-name"]["type"];
        $fileSize = $_FILES["file-name"]["size"];
        // [tmp_name]  # اي صورة ارفهة على سيرفر تاخذ اسم مؤقت اسمو 
        // tmp_name



        // ** extension بتاعي الامتداد 
        $extensionFile = pathinfo($fileName, PATHINFO_EXTENSION);  #من الاسم جيبلي الامتداد 

        // اذا الامتداد اللي بالملف المحمل كو كطابف لاي واحد بالاراي مالتي بال كي 
        if (!array_key_exists($extensionFile, $fileTypesallowd)) die("Error:Please select a valid file format"); # die جاهزة باللفة يغني اذا الكود باضز ومشتغل موت كلشي وطلعلي ايررو

        // size لاةك احول الحجم من خلال ضري احجم ب 1024 واشتغل علي megebyte
        $maxSize = 5 * 1024 * 1024;
        if ($fileSize > $maxSize) die("Erorr: File Size  is larger than the allowed limit ");
        // if ($fileSize > 500000) {echo "Sorry, your file is too large.";}


        // mimi_type # تحيب نوع الملف
        // حانشا فولدر اسمو مثلا uploadfiles راج يتاكد هل موجود او لاء اذا موجود انقل الملف او اصورة الحملو الو 
        if (in_array($filetype, $fileTypesallowd)) {
            if (file_exists("uploadfiles/" . $fileName)) {
                echo "file is alraedy exist";
            } else {

                // تذت مموجود انقل الملف المحما اللا 
                // وانقلو الى الفولدر اللي اسمو ........بالامتداد الحقيق مالتو 
                move_uploaded_file($_FILES["file-name"]["tmp_name"], "uploadfiles/" . $fileName);
                echo "Your file was uploaded successfully";
            }
        } else {
            echo "Error:three was problem uploading your file";
        }
    } else {
        echo "Error:" . $_FILES["file-name"]["error"];
    }
}


// 2----------------------------------------require & include
// الاثنين يستدعون ملف مثل شغل import in raect 
// require اذا صار عطل بوحد متحمل الباقين 
// include اذا صار عطل بواحد تستدعي الثاني وتمشي متوكف الشغل 


