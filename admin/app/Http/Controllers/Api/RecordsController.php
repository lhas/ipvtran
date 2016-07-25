<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response as LaravelResponse;
use App\Http\Requests;
use App\Records;

use \Serverfireteam\Panel\CrudController;
use PayPal;

class RecordsController extends CrudController
{
    private $_apiContext;

    public function __construct()
    {
        $this->_apiContext = PayPal::ApiContext(
            config('services.paypal.client_id'),
            config('services.paypal.secret'));

        $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'service.EndPoint' => 'https://api.sandbox.paypal.com',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'FINE'
        ));

    }

    // API
    public function send(Request $request)
    {
        $dados = [
            'estado' => $request->input('estado'),
            'cpf' => $request->input('cpf'),
            'renach' => $request->input('renach'),
            'nascimento' => $request->input('nascimento'),
            'categoria' => $request->input('categoria')];
        
        // verificar se já existe cadastro com este CPF
        $record = Records::where('cpf', $dados['cpf'])->first();

        // se existir, retornar erro
        if(!empty($record)) {
            return response()->json('CPF Já Cadastrado', LaravelResponse::HTTP_CONFLICT);
        }

        // se não existir, prosseguir com cadastro
        if(empty($record)) {

            $record = Records::create($dados);

            /* início paypal */
            $payer = PayPal::Payer();
            $payer->setPaymentMethod('paypal');

            $amount = PayPal:: Amount();
            $amount->setCurrency('BRL');
            $amount->setTotal(270); // This is the simple way,
            // you can alternatively describe everything in the order separately;
            // Reference the PayPal PHP REST SDK for details.

            $transaction = PayPal::Transaction();
            $transaction->setAmount($amount);
            $transaction->setDescription('What are you selling?');

            $redirectUrls = PayPal:: RedirectUrls();

            // TEM QUE MUDAR ESSAS URLS AQUI
            $redirectUrls->setReturnUrl('http://localhost:9000/pagamento-finalizado.html');
            $redirectUrls->setCancelUrl('http://localhost:9000/pagamento-cancelado.html');

            $payment = PayPal::Payment();
            $payment->setIntent('sale');
            $payment->setPayer($payer);
            $payment->setRedirectUrls($redirectUrls);
            $payment->setTransactions(array($transaction));

            $response = $payment->create($this->_apiContext);
            $redirectUrl = $response->links[1]->href;
            /* fim paypal */

            $record->paypal_url = $redirectUrl;

            return response()->json($record);
        }

        return response()->json([$dados]);
    }
}
