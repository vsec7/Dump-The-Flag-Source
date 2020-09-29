<?php

// WAF Functions

function printWAF(){
return die(header('HTTP/1.0 403 Forbidden'));
}

function waf($id){
	if(preg_match('/sleep|SLEEP|delay|DELAY|wait|WAIT/i', $id)){
        printWAF();
      }
    return $id;
}
