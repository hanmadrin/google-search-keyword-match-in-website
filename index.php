<?php /* Template Name: private */ ?>
<?php
$phpcontent=file_get_contents('https://www.google.com/search?start=0&q=Hartwig.Retzlaff@deutschesee.de');
    //$start=strpos($phpcontent,'<div id="main">');
    //$end=strpos($phpcontent,'<!-- cctlcm 5 cctlcm -->');
    //$phpcontent=substr($phpcontent,$start,$end-$start);
    //$phpcontent=removetag($phpcontent,'script');
    //$phpcontent=removetag($phpcontent,'style');
    //$phpcontent=removetag($phpcontent,'footer');
    $dom= new domDocument;
    $dom->loadHTML($phpcontent);
    $dom->preserveWhiteSpace = false;
    $main = $dom->getElementById('main'); 
    if($main->hasChildNodes())
    {
        $i=$main->childNodes->length;
        echo $main->tagName;
        $lol=true;
        for($i;$i>0;$i--)
        {
            //$childremoved=false;
            $tagname = $main->childNodes[$i]->nodeName;
            $child=$main->childNodes[$i];
            //echo $child->hasChildNodes();
            //if(!($child->hasChildNodes()))
            //$childremoved=true;
            //{
                //$main->removeChild($main->childNodes[$i]);
                
            //}
            echo 1;
            //if()
            //print_r($child);
            if($lol)
            {echo $child;
                $lol=false;}
            //if($child->hasChildNodes())
            //echo $child->hasChildNodes();
            //$main->removeChild($main->childNodes[$i]);
            
            if(!$childremoved && ($tagname=='script'||$tagname=='style'||$tagname=='footer'))
            {
                $main->removeChild($main->childNodes[$i]);
                $childremoved=true;
            }
        }
    }
    
    //echo $main->childNodes[1]->nodeName;
    $result = $main->c14N();
    echo $result;
    //$dom->validateOnParse = true;
    //$main=$dom->getElementsById('main');
    //print $main->nodeName;
    //nodeValue;
    //echo $dom->textcontent;
    //$output = @ $dom->saveHTML();
    //$doma= new domDocument;
    //@ $doma->loadHTML($footer);
    //$main = $dom->getElementById('main'); 
    //echo $dom->saveHTML($dom->getElementById('main'));
    //echo $main->nodeValue;
    //echo $output;

    //echo '<div id="phpcontent">'.$phpcontent.'</div>';


function removetag($content,$tag)
{
    while(strpos($content,'<'.$tag))
    {
        $start=strpos($content,'<'.$tag.'');
        $end=strpos($content,'</'.$tag.'>',$start)+3+strlen($tag);
        if($end>$start)
        {
        $replace=substr($content,$start,$end-$start);
        $content=str_replace($replace,'',$content);
        }
    }
    return $content;
}
