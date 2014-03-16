<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class ClassSimpleImage 
{

   var $image;
   var $image_type;

   function load($filename) 
   {
      $image_info = getimagesize($filename);
      $this->image_type = $image_info[2];
      if ($this->image_type == IMAGETYPE_JPEG) 
         $this->image = imagecreatefromjpeg($filename);
      elseif ($this->image_type == IMAGETYPE_GIF)
         $this->image = imagecreatefromgif($filename);
      elseif ($this->image_type == IMAGETYPE_PNG)
         $this->image = imagecreatefrompng($filename);      
   }
   
   function save($filename, $image_type = IMAGETYPE_JPEG, $compression = 75, $permissions = null) 
   {
      if ($image_type == IMAGETYPE_JPEG)
         imagejpeg($this->image, $filename, $compression);
      elseif ($image_type == IMAGETYPE_GIF)
         imagegif($this->image, $filename);
      elseif ($image_type == IMAGETYPE_PNG)
         imagepng($this->image, $filename);
      
      if ($permissions != null) 
         chmod($filename, $permissions);
   }
   
   function getWidth() 
   {
      return imagesx($this->image);
   }
   
   function getHeight() 
   {
      return imagesy($this->image);
   }

   function cutAndResize($width, $height) {
      $oldWidth  = $this->getWidth();
      $oldHeight = $this->getHeight();
      
      if ($oldHeight === 0 || $height === 0 || $oldWidth === 0)
          return;      
      
      $oldAspectRation = $oldWidth / $oldHeight;
      $aspectRation = $width / $height;
      
      $factor = 0;
      if ($aspectRation > $oldAspectRation)      
          $factor = $height / $oldHeight;
      else
          $factor = $width / $oldWidth;          
      
      $height = floor($oldHeight * $factor);
      $width = floor($oldWidth * $factor);      
       
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;
   }
}
