<?php

namespace Amp\Mysql\Test;

use Amp\Mysql\ConnectionConfig;
use Amp\PHPUnit\AsyncTestCase;

class ConnectionConfigTest extends AsyncTestCase
{
    public function testInvalidConnectionString()
    {
        $this->expectException(\Error::class);
        $this->expectExceptionMessage('Host must be provided in connection string');

        ConnectionConfig::fromString("username=" . DB_USER);
    }

    public function testGetConnectionString()
    {
        $config = ConnectionConfig::fromString('host=host;port=1234;user=user;password=password');

        $this->assertSame('tcp://host:1234', $config->getConnectionString());
    }
}
