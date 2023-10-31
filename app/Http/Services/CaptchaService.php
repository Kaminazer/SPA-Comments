<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use Mews\Captcha\Facades\Captcha;
class CaptchaService
{
    public function getCaptcha()
    {
        $captchaData = Captcha::create('default')->original;
        // Отримуємо зображення CAPTCHA у форматі PNG і кодуємо його в base64
        $pngImageData = base64_encode($captchaData);
        // Передаємо закодоване зображення у відповіді JSON
        return response()->json(['captcha' => $pngImageData]);
    }
    public function checkCaptcha(Request $request)
    {
        $data = $request->all();
        if (Captcha::check($data['captcha'])) {
            return 1;
        } else {
           return 0;
        }
    }
}
