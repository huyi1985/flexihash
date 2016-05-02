<?php

namespace Flexihash\Hasher;

/**
 * Uses DJBX33A (Daniel J. Bernstein, Times 33 with Addition)
 * to hash a value into a signed 32bit int address space.
 * It basically uses a function like 
 *        ``hash(i) = hash(i-1) * 33 + str[i]''
 * This is one of the best known hash functions for strings. 
 * Because it is both computed very fast and distributes very well.
 * See also: Zend/zend_hash.h zend_inline_hash_func()
 * Under 32bit PHP this (safely) overflows into negatives ints.
 *
 * @author huyi1985
 * @license http://www.opensource.org/licenses/mit-license.php
 */
class Times33Hasher implements HasherInterface
{
    public function hash($string)
    {
    	$hash = 5381;
    	$length = strlen($string);

    	for ($i = 0; $i < $length; $i++) {
    		$hash = (($hash * 33) & (pow(2, 32) - 1)) + ord($string[$i]) ;
    	}
echo "\t", $hash, PHP_EOL;
        return $hash;
    }
}
