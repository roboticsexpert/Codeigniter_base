<?php

if(!function_exists('add_js')){
    function add_js($file='')
    {
        $str = '';
        $ci = &get_instance();
        $header_js  = $ci->config->item('header_js');
 
        if(empty($file)){
            return;
        }
 
        if(is_array($file)){
            if(!is_array($file) && count($file) <= 0){
                return;
            }
            foreach($file AS $item){
                $header_js[] = $item;
            }
            $ci->config->set_item('header_js',$header_js);
        }else{
            $str = $file;
            $header_js[] = $str;
            $ci->config->set_item('header_js',$header_js);
        }
    }
}
 
//Dynamically add CSS files to header page
if(!function_exists('add_css')){
    function add_css($file='')
    {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');
 
        if(empty($file)){
            return;
        }
 
        if(is_array($file)){
            if(!is_array($file) && count($file) <= 0){
                return;
            }
            foreach($file AS $item){   
                $header_css[] = $item;
            }
            $ci->config->set_item('header_css',$header_css);
        }else{
            $str = $file;
            $header_css[] = $str;
            $ci->config->set_item('header_css',$header_css);
        }
    }
}
 
if(!function_exists('put_headers')){
    function put_headers($css=array(),$js=array(),$return=TRUE)
    {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');
        $header_js  = $ci->config->item('header_js');
 		$js_array=array_merge($header_js,$js);
		$css_array=array_merge($header_css,$css);
        foreach($css_array AS $item){
			
	            $str .= '<link rel="stylesheet" href="'.base_url().TEMPLATEPATH.'css/'.$item.'" type="text/css" />'."\n";
        }
 
        foreach($js_array AS $item){
			
	            $str .= '<script type="text/javascript" src="'.base_url().TEMPLATEPATH.'js/'.$item.'"></script>'."\n";			
        }
 		if($return===TRUE)
	        return $str;
		echo $str;
    }
}