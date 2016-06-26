<?php

$app->get('dashboard', function () use ($app) {
    return response()->json(['user' => 'admin']);
});
