##captcha.class.php 
-----------------

Script enables you to create a captcha code, which increase security of your website.
To use this class, you need to modify your form by including `create.php` into `src=""` attribute in `<img>` code.

How class is built?
-----------------

Class has 6 method and 2 properities. 

Methods:
- `__construct()` inits font using in captcha image 
- `generateCode()` generate random code(lenght is included in: *$characters*) 
- `CaptchaSecurityImages()` main method of class, creates images and save code into session

Properties:
- `$config` defaultly contains font name and dir, where font is placed
- `defaultFont` deafult dir with fonts 
