<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EstateAd;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VolvoxController extends Controller
{

    public function search($name)
    {
        $model          = new EstateAd();
        $ads_collection = $model->getAdByName($name)->toArray();

        if ($ads_collection) {
            return json_encode($ads_collection, true);
        } else {
            // return view(error);
        }
    }

    public function store(Request $request)
    {
        $data = [
            'id'        => $request->input('ads_id'),
            'title'     => $request->input('ads_title'),
            'city'      => $request->input('ads_city'),
            'hood'      => $request->input('ads_hood'),
            'street'    => $request->input('ads_street'),
            'price'     => $request->input('ads_price'),
            'square'    => $request->input('ads_square'),
            'type'      => $request->input('ads_type'),
            'email'     => $request->input('ads_email'),
            'comment'   => $request->input('ads_comment'),
        ];

        $this->emailSend($data);

        return redirect()->route("form");
    }

    public function emailSend($data)
    {
        Mail::send('email_template', ['mail_data' => $data], function ($mail) use ($data) {
            $mail->to($data['email'], 'Support')->bcc("mladen@fleitec.com")->subject($data['title']);
        });
    }
}
