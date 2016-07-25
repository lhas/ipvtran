<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response as LaravelResponse;

use App\Http\Requests;
use App\Record;

use PayPal;

class RecordsController extends Controller
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
    //
    public function send(Request $request)
    {
        $dados = [
            'estado' => 'RJ',
            'cpf' => '14706414709',
            'renach' => 'RJ 142384928',
            'nascimento' => '28/04/1995',
            'categoria' => 'A'
        ];
        
        // verificar se já existe cadastro com este CPF
        $record = Record::where('cpf', $dados['cpf'])->first();

        // se existir, retornar erro
        if(!empty($record)) {
            // return response()->json('CPF Já Cadastrado', LaravelResponse::HTTP_CONFLICT);
        }

        // se não existir, prosseguir com cadastro
        // if(empty($record)) {
        if(true) {

            $record = Record::create($dados);

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
