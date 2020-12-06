<?php
/*
 * Requires: php-gd
 */

/*
[!] Get a resource to the image
[-] resource imagecreatefrompng  ( string $filename  )
*/

$image = iamgecreatefrompng("http://hax.tor.hu/level34/internetexplorerdecryptable.png");
//$image = imagecreatefrompng("internetexplorerdecryptable.png");


/*
[!] Save the color black into a variable
[-] int imagecolorallocate  ( resource $image  , int $red  , int $green  , int $blue  )
*/

$black = imagecolorallocate($image, 0, 0, 0);


/*
[!] Get the image width
[-] int imagesx  ( resource $image  )
*/

$x = imagesx($image);


/*
[!] Get the image height
[-] int imagesy  ( resource $image  )
*/

$y = imagesy($image);


/*
[!] Set all the % 2 pixels to black
[-] bool imagesetpixel  ( resource $image  , int $x  , int $y  , int $color  )
*/

for ($height = 0; $height < $y; $height++)            // Loop through the height of the image
{
  for ($width = 0; $width < $x; $width++)             // Loop through the width of the image
  {
    if (($width + $height) % 2 == 0)                  // If out current width position + the row position is
    {                                                 // divisible by 0 without any remainder, set the color
      imagesetpixel($image, $width, $height, $black); // to black. (This is a crosshatch pattern)
    }
  }
}


/*
[!] Display the image
[-] void header  ( string $string  [, bool $replace = true  [, int $http_response_code  ]] )
[-] bool imagepng  ( resource $image  [, string $filename  [, int $quality  [, int $filters  ]]] )
*/

header('Content-Type: image/png');
imagepng($image);

?>
