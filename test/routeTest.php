<?php declare(strict_types=1);
use phpFTW\system;
use PHPUnit\Framework\TestCase;

final class routeTest extends TestCase
{
    public function test_firstExample()
    {
	  $loader = new system\loader();
        $this->assertEquals(
            'path\to\controller\function',
            $loader->getRequestPath('path/to/controller/function')
        );
    }
}