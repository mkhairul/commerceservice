<?php

namespace Mkcommerce;
use Illuminate\Support\Facades\Response;

class Respond implements RespondInterface{
    
    var $response = array();
    var $callback;
    var $failed = false;
    
    public function callback($str)
    {
        $this->callback = $str;
        return $this->callback;
    }
    
    public function fail()
    {
        $this->response['status'] = 'error';
        $this->failed = true;
        return $this;
    }
    
    public function isFailed()
    {
        return $this->failed;
    }
    
    public function success()
    {
        $this->response['status'] = 'ok';
        return $this;
    }
    
    public function message($msg, $key_name="message")
    {
        if(is_array($msg) or is_object($msg))
        {
            $this->response = $msg;
        }
        else
        {
            if(array_key_exists($key_name, $this->response))
            {
                $tmp = $this->response[$key_name];
                $messages = array();
                $messages[] = $tmp;
                $messages[] = $msg;
                $this->response[$key_name] = $messages;
            }
            else
            {
                $this->response[$key_name][] = $msg;
            }
        }
        return $this;
    }
    
    public function json()
    {
        if($this->callback)
        {
            return Response::json($this->response)->setCallback($this->callback);
        }
        return Response::json($this->response);
    }
    
}