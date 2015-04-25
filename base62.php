<?php

class Base62 {

    protected static $base='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    static public function encode($num, $b=62) {
        $r = (int) $num  % $b ;
        $res = self::$base[$r];
        $q = floor($num/$b);
        while ($q) {
            $r = $q % $b;
            $q =floor($q/$b);
            $res = self::$base[$r].$res;
            }

            return $res;
    }


    static public function decode( $num, $b=62) {
        $limit = strlen($num);
        $res=strpos(self::$base,$num[0]);
        for($i=1;$i<$limit;$i++) {
            $res = $b * $res + strpos(self::$base,$num[$i]);
    }

        return $res;
    }
}