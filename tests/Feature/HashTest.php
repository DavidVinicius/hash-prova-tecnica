<?php

namespace Tests\Feature;

use App\Services\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HashTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_hash_starts_with_0000()
    {
        $hash = (new Hash)->hash(md5(rand(1, 10000)));                
        $this->assertStringContainsString('0000', $hash['Hash']);
    }
}
