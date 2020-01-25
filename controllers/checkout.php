<?php
// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
require_once '../Stripe/vendor/autoload.php';

if (!empty($_POST['idcurso'])) {
    \Stripe\Stripe::setApiKey('sk_test_hS0hzHczZEqt4o4Y5wL0M7Yx000FvBZFhZ');

    $session = \Stripe\Checkout\Session::create([
        'customer_email' => 'customer@example.com', //traerse el email de la sesion
        'payment_method_types' => ['card'],
        'line_items' => [[
            'name' => 'Programacion avanzada php',
            'description' => 'Este curso es apto para programadores expertos en el lenguaje php',
            'images' => ['http://localhost:8888/uniline/img/course_1.jpg'],
            'amount' => 10000,
            'currency' => 'mxn',
            'quantity' => 1,
        ]],
        'success_url' => 'https://example.com/success?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => 'https://example.com/cancel',
    ]);
    echo $session->id;
}
