<?php


use PHPUnit\Framework\TestCase;

class DBTest extends TestCase
{

    public function selectMany_Success(): void
    {
        $array = [];
        $res = DB::selectMany("SELECT * FROM roles", $array);
        $this->assertSame(3, count($res));
    }
}
