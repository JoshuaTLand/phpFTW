<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class routeTest extends TestCase
{
    public function test_firstExample()
    {
	  require_once($_SERVER['DOCUMENT_ROOT']."\..\system\init.php");
	  $loader = new system\loader();
        $this->assertEquals(
            'path/to/controller/function',
            $loader::getRequestPath('https://test.domain.com/path/to/controller/function')
        );
    }
}