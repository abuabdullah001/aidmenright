<?php

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

if (!function_exists('imageupload')) {
    /**
     *
     * @return integer
     */
    function imageUpload($request, $name, $existingImage = null)
    {
        // Check if a new file is being uploaded
        if ($request->hasFile($name)) {
            $file = $request->file($name);
            $fileName = $name . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = '/uploads/file/' . $fileName;
            $file->move(public_path('/uploads/file/'), $fileName);

            return $filePath;
        }

        return $existingImage;
    }


    function sendEmail( $from , $messageBody, $name,$phone)
    {
        $to = 'info@odmsfund.com';
        $notification = "Notification from " . $name;





        Mail::to($to)->send(new ContactMail(
            $from,
            $messageBody,
            $notification,
            $name,
            $phone

        ));
    }
}
