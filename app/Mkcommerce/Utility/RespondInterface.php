<?php

namespace Mkcommerce;

interface RespondInterface
{
    public function fail();
    public function isFailed();
    public function success();
    public function message($msg, $key_name);
    public function json();
}