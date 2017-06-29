<?php

use Symfony\Component\HttpFoundation\Request;
use App\Validators\Token;

$exception = [
    '/login',
    '/password/forgot',
    '/signup',
];

$app->before(function (Request $request) use ($exception) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
//    if (! $request->get('token') && !in_array($request->getRequestUri(), $exception)) {
//        throw new \Exception('Could not find the token');
//    }
//    $tokenValidator = new Token($request->get('token'));
//    if (!$tokenValidator->validateToken()) {
//            throw new \Exception('invalid Token');
//    }
});
