<?php
class ml_tool_coords
{
    const FLOAT2INTTIMES = 1000000;
    static function toint($x){
        return round($x * self::FLOAT2INTTIMES);
    }
    
        
}
