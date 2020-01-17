<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Gumlet\ImageResize;
use \App\Employee;


class ImageController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\employee $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee)
    {
        return view('employee.edit', compact( 'employee'));
    }

    /**upload file using ajax and return where the file was saved
     * @param Request $request (get)
     * @return \Illuminate\Http\JsonResponse
     * @throws \Gumlet\ImageResizeException
     */
    public function upload_image(Request $request){
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:4096',
        ]);

        //instantiate employee
        $employee = employee::findOrFail($request['id']);

        //save initial image
        $image_name = time().'.'.request()->image->getClientOriginalExtension();
        $partial_path =  '/images/' . str_replace(' ', '_', $employee->full_name) . '/'; //the file gets saved to the employee's directory
        $image_path = public_path($partial_path);
        request()->image->move($image_path, $image_name); //save file

        //crop and resize image
        $this->crop_and_resize_image($image_path, $image_name); //resize and resave

        //save image details back to employee record
        $employee->image = $partial_path . $image_name;
        $employee->save();

        return response()->json([
            'url' => $partial_path . $image_name,
        ]);//tell requesting website the directory where the image is.
    }


    /**
     * @param $image_path
     * @param $image_name
     * @return bool
     * @throws \Gumlet\ImageResizeException
     */
    private function crop_and_resize_image($image_path, $image_name){
        //resize image
        $image = new ImageResize($image_path .  $image_name);
        $image->resizeToHeight(300);
        $image->crop(300, 300, true, ImageResize::CROPCENTER);
        $image->save($image_path . $image_name);
        return true;
    }

    private function start_generator(){
        $generator = new ComputerPasswordGenerator();
        $generator
            ->setUppercase()
            ->setLowercase()
            ->setNumbers()
            ->setSymbols(false)
            ->setLength(16);
        return $generator;

    }

}
