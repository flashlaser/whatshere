<?php
class ml_tool_coords
{
    const FLOAT2INTTIMES = 10000;
    static function toint($x){
        return (int)($x * self::FLOAT2INTTIMES);
    }
    
        
}
