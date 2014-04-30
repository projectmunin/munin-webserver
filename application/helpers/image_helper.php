<?php

/*
*
*	This will create a thumbnail in resources/thumbs
*	The image will be cropped from the center.
*
*/
function image_thumb( $image_path, $width, $height) {
    $CI =& get_instance();
    
    list($orig_width, $orig_height) = getimagesize($image_path);
	//Get extension from the original image e.g. "jpg"
    $orig_ext = pathinfo($image_path, PATHINFO_EXTENSION);
    
    $thumbnail_directory = 'resources/thumbs/'.dirname( $image_path );
    
    //Create thumbs directory if it does not exist.
    if(!is_dir($thumbnail_directory))
    {
    	mkdir($thumbnail_directory, 0777, true);
    }
    
    $image_thumb = $thumbnail_directory . '/' . basename( $image_path, '.'.$orig_ext ) . '_' . $width . '_' . $height . '.jpg';

    if ( !file_exists( $image_thumb ) )
    {
        $CI->load->library( 'image_lib' );
        
        $orig_ratio = $orig_width/$orig_height;
		$thumb_ratio = $width/$height;
        
        $config['image_library']    = 'gd2';
        $config['source_image']     = $image_path;
        $config['new_image']        = $image_thumb;
        $config['maintain_ratio']   = TRUE;
		
		//Fill up either the width or height depending on the orientation of the original and the thumbnail to be created. The remaining will then be cropped off.
		if($orig_ratio > $thumb_ratio)
		{
	        $config['height']           = $height;
	        $config['width']            = 10000;
		}
		else
		{
	        $config['height']           = 10000;
	        $config['width']            = $width;
		}
        $CI->image_lib->initialize( $config );
        $CI->image_lib->resize();
        $CI->image_lib->clear();
        
        list($resized_width, $resized_height) = getimagesize($image_thumb);
        
        $config = array();
        $config['image_library']    = 'gd2';
        $config['source_image']     = $image_thumb;
        $config['maintain_ratio']   = FALSE;
        if($orig_ratio > $thumb_ratio)
		{
	        $config['x_axis']			= ($resized_width-$width)/2;
	        $config['y_axis']			= 0;
		}
		else
		{
	        $config['x_axis']			= 0;
	        $config['y_axis']			= ($resized_height-$height)/2;
		}
        $config['height']           = $height;
        $config['width']            = $width;
        $CI->image_lib->initialize( $config );
        $CI->image_lib->crop();
        $CI->image_lib->clear();
    }

    return $image_thumb;
}

/* End of file image_helper.php */
/* Location: ./application/helpers/image_helper.php */