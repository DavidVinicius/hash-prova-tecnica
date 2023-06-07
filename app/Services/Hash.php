<?php
namespace App\Services;

class Hash
{
    public function hash(string $string) : array
    {
        $count = 0;
        
        do {
            $key = substr(md5(rand(10000000, 99999999)), 0, 8);
            $hash = md5($string . $key);
            $count++;
        } while (substr($hash, 0, 4) !== '0000');

        return [
            'Key' => $key,
            'Hash' => $hash,
            'times' => $count,
            'String' => $string,
        ];
    }
}