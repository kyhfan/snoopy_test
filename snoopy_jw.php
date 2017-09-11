<?
    include_once './snoopy/Snoopy.class.php';
	include_once './simplehtmldom_1_5/simple_html_dom.php';
    $snoopy = new snoopy;
    $snoopy->fetch("http://adsoftheworld.com/cards?terms=&created=all&medium=4&industry=All&country=All&sort_by=created");
    $txt = $snoopy->results;

	$html = new simple_html_dom();
	$html->load($txt);

	$block = $html->find('.file-image-jpeg');
//	print_r($block);
//	$url = $block->first_child();
//	$url = $block->find('.content');
//	echo $url;

//	$block_cnt = count($block);


	foreach($block as $element) {
		$anchor = $element->children(1)->children(0);
		$url = $anchor->href;

		$snoopy2 = new snoopy;
		$snoopy2->fetch($url);
		$txt2 = $snoopy2->results;
		$html2 = new simple_html_dom();
		$html2->load($txt2);

		$innerEl = $html2->find('.content-container');

		$brandBlock = $innerEl[0]->find('.field-brand');
		$titleTag = $innerEl[0]->find('#page-title');
		$brandName = $brandBlock[0]->children(0)->plaintext;
		$titleName = $titleTag[0]->plaintext;
		$agencyBlock = $titleTag[0]->nextSibling();

		if(!empty($agencyName)) {
			$agencyName = $agencyBlock->children(1)->plaintext;
		} else {
			$agencyName = "null";
		}

//
		echo $brandName.", ".$titleName.", ".$agencyName."<br/>";
//		break;

//		echo $url."<br/>";
	}

//	for($i=1; $i<$content_cnt; $i++) {
//		$link =
//	}

//    $exp_array1  = explode("file file-image file-image-jpeg",$txt);
//	$arr_count   = count($exp_array1);
//
//    for ($i=1; $i<$arr_count; $i++)
//    {
//        $exp_array2 = explode('"',$exp_array1[$i]);
//
//        $snoopy2 = new snoopy;
//        $snoopy2->fetch($exp_array2[10]);
//        $txt2 = $snoopy2->results;
//
//        $exp_array3  = explode("media-youtube-player media-vimeo-player",$txt2);
//        $exp_array4  = explode('"',$exp_array3[1]);
//		print_r($exp_array4);
//        $exp_array5  = explode('?',$exp_array4[8]);
//        print_r($exp_array5[0]."<br />");
//    }
?>
