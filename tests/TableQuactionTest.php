<?php

use Sonjaturo\DuckmodeFilament\Tables\Quaction;

it('has a default name', function () {

    expect(Quaction::getDefaultName())->toBe('quack');

});

it('renders the correct view', function () {

    $action = Quaction::make();

    expect($action->render()->name())->toBe('duckmode::button-quaction');

});