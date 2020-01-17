# laravel-image-upload-with-dropzone
entire upload plus dropzone. When you drag a new image over the existing image, it uploads and replaces the image automatically.


I want to upload an employee photo and resize it by dragging a new image over the existing one. I watched my HR try to do that when I released an app for him and realized the way he wanted to do it was better.

To get started:
* laravel new project
* composer require gumlet/php-image-resize
* composer dump-autoload

You'll need the newest version of dropzone.js as well

https://www.dropzonejs.com

and I used all of the bootstrap files and jquery. Not sure either would be 100% necessary. 

The js could easily be rewritten. The bootstrap isn't really relevant in this sample.

This was designed around 300x300 profile pictures. That's easy enough to change.

I am only including the relevant files, and I will list them here
* Http>Controllers>EmployeeController.php
* public>css>styles.css
* public>js>dropzone_script.js
* public>images>300.png //palceholder image
* routes>web.php
* resources>views>employee>edit
* app\Employee //employee model

resources>views>employee>edit.blade.php



You can see that I use an employee model because after I upload, 
I persist the employee back to the table with an image file location. 

