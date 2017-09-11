<?
    include_once './snoopy/Snoopy.class.php';
    $snoopy = new snoopy;
    $snoopy->fetch("http://adsoftheworld.com/cards?terms=&created=all&medium=4&industry=All&country=All&sort_by=created");

    $txt = $snoopy->results;
    print_r($txt);
    $exp_array1  = explode("file file-image file-image-jpeg",$txt);
    //print_r($exp_array1[1]);
    $arr_count      = count($exp_array1);

    // for ($i=1; $i<$arr_count; $i++)
    // {
    //     $exp_array2     = explode('"',$exp_array1[$i]);

    //     $snoopy2 = new snoopy;
    //     $snoopy2->fetch($exp_array2[10]);
    //     $txt2 = $snoopy2->results;

    //     $exp_array3  = explode("media-youtube-player",$txt2);
    //     $exp_array4  = explode('"',$exp_array3[1]);
    //     $exp_array5  = explode('?',$exp_array4[8]);
    //     print_r($exp_array5[0]."<br />");
    // }

    $exp_array2     = explode('"',$exp_array1[1]);

    $snoopy2 = new snoopy;
    $snoopy2->fetch($exp_array2[10]);
    $txt2 = $snoopy2->results;

    $exp_array3  = explode("media-youtube-player",$txt2);
    $exp_array4  = explode('"',$exp_array3[1]);
    $exp_array5  = explode('?',$exp_array4[8]);
    print_r($exp_array5[0]."<br />");
?>
