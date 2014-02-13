<?php
class ml_tool_coords
{
    const FLOAT2INTTIMES = 10000;
    const FLOAT2INTTIMESBIG = 1000;
    const FLOAT2INTTIMESBIGGEST = 10;
    static function toint($x){
        return str_pad((int)($x * self::FLOAT2INTTIMES), 7 , 0 , STR_PAD_RIGHT);
    }
    static function tointBig($x){
        return str_pad((int)($x * self::FLOAT2INTTIMESBIG), 7 , 0 , STR_PAD_RIGHT);
    }
    static function tointBiggest($x){
        return str_pad((int)($x * self::FLOAT2INTTIMESBIGGEST), 7 , 0 , STR_PAD_RIGHT);
    }
     
    static function highAccuracy($x){
        $x = intval($x*self::FLOAT2INTTIMES)/self::FLOAT2INTTIMES;
        return $x;
    }
    static function norAccuracy($x){
        $x = intval($x*self::FLOAT2INTTIMESBIG)/self::FLOAT2INTTIMESBIG;
        return $x;
    }
    static function lowAccuracy($x){
        $x = intval($x*self::FLOAT2INTTIMESBIGGEST)/self::FLOAT2INTTIMESBIGGEST;
        return $x;
    }   
}
