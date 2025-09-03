<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PasswordResetController extends Controller
{
    public function sendResetEmail(Request $request)
    {
        $email = $request->input('email');

        if (empty($email)) {
            return back()->withErrors(['email' => 'O campo email é obrigatório.']);
        }

        $usuario = DB::table('usuarios')->where('email', $email)->first();

        if (!$usuario) {
            return back()->withErrors(['email' => 'E-mail não encontrado no sistema.']);
        }

        $token = bin2hex(random_bytes(32));
        $expira = now()->addHour();

        DB::table('usuarios')->where('email', $email)->update([
            'token' => $token,
            'token_expira' => $expira
        ]);

        $link = url("/redefinir_senha?token=$token");

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'renan.yukio.arida@gmail.com';
            $mail->Password   = 'antr oelz iwkw mnab'; // app password do Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('renan.yukio.arida@gmail.com', 'Renan');
            $mail->addAddress($email, $usuario->nome ?? 'Usuário');
            $mail->CharSet = 'UTF-8';

            $mail->isHTML(true);
            $mail->Subject = 'Redefinir senha';
            $mail->Body = "Clique no link para redefinir sua senha: <a href='$link'>$link</a>";
            $mail->AltBody = "Copie e cole este link no navegador: $link";

            $mail->send();

            return back()->with('success', 'E-mail de redefinição enviado com sucesso!');
        } catch (Exception $e) {
            return back()->withErrors(['email' => "Erro ao enviar o e-mail: {$mail->ErrorInfo}"]);
        }
    }
}
