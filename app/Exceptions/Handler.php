<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        $response = parent::render($request, $e);

        if ($request->expectsJson() || (! $response->isClientError() && ! $response->isServerError())) {
            return $response;
        }

        $statusCode = $response->getStatusCode();
        $errors = [
            401 => ['title' => 'Giriş yapmanız gerekiyor', 'message' => 'Bu sayfayı görüntülemek için hesabınıza giriş yapın.'],
            403 => ['title' => 'Erişim izniniz yok', 'message' => 'Bu sayfayı görüntüleme yetkiniz bulunmuyor.'],
            404 => ['title' => 'Sayfa bulunamadı', 'message' => 'Aradığınız sayfa veya içerik burada olmayabilir.'],
            419 => ['title' => 'Oturum süresi doldu', 'message' => 'Güvenliğiniz için oturumunuz yenilendi. Lütfen sayfayı tekrar deneyin.'],
            429 => ['title' => 'Çok fazla istek gönderdiniz', 'message' => 'Kısa sürede çok fazla istek aldık. Biraz bekleyip tekrar deneyin.'],
            500 => ['title' => 'Bir sorun oluştu', 'message' => 'İsteğiniz şu anda tamamlanamadı. Lütfen biraz sonra tekrar deneyin.'],
            503 => ['title' => 'Hizmet geçici olarak kullanılamıyor', 'message' => 'Site kısa süreliğine bakımda olabilir. Lütfen daha sonra tekrar deneyin.'],
        ];

        $error = $errors[$statusCode] ?? [
            'title' => 'İstek tamamlanamadı',
            'message' => 'İsteğiniz işlenirken bir sorun oluştu. Lütfen tekrar deneyin.',
        ];

        return response()->view('errors.generic', array_merge($error, [
            'statusCode' => $statusCode,
        ]), $statusCode, $response->headers->all());
    }
}
