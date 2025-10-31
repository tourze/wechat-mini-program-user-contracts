<?php

declare(strict_types=1);

namespace Tourze\WechatMiniProgramUserContracts\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Tourze\WechatMiniProgramAppIDContracts\MiniProgramInterface;
use Tourze\WechatMiniProgramUserContracts\UserInterface;

/**
 * @internal
 */
#[CoversClass(UserInterface::class)]
class UserInterfaceTest extends TestCase
{
    public function testInterfaceExists(): void
    {
        $this->assertTrue(interface_exists(UserInterface::class));
    }

    public function testInterfaceHasRequiredMethods(): void
    {
        $reflection = new \ReflectionClass(UserInterface::class);

        $this->assertTrue($reflection->hasMethod('getMiniProgram'));
        $this->assertTrue($reflection->hasMethod('getOpenId'));
        $this->assertTrue($reflection->hasMethod('getUnionId'));
        $this->assertTrue($reflection->hasMethod('getAvatarUrl'));
    }

    public function testGetMiniProgramMethodSignature(): void
    {
        $reflection = new \ReflectionClass(UserInterface::class);
        $method = $reflection->getMethod('getMiniProgram');

        $this->assertTrue($method->isPublic());
        $this->assertSame('getMiniProgram', $method->getName());
        $this->assertSame(0, $method->getNumberOfParameters());

        $returnType = $method->getReturnType();
        $this->assertNotNull($returnType);
        $this->assertInstanceOf(\ReflectionNamedType::class, $returnType);
        $this->assertSame(MiniProgramInterface::class, $returnType->getName());
        $this->assertFalse($returnType->allowsNull());
    }

    public function testGetOpenIdMethodSignature(): void
    {
        $reflection = new \ReflectionClass(UserInterface::class);
        $method = $reflection->getMethod('getOpenId');

        $this->assertTrue($method->isPublic());
        $this->assertSame('getOpenId', $method->getName());
        $this->assertSame(0, $method->getNumberOfParameters());

        $returnType = $method->getReturnType();
        $this->assertNotNull($returnType);
        $this->assertInstanceOf(\ReflectionNamedType::class, $returnType);
        $this->assertSame('string', $returnType->getName());
        $this->assertFalse($returnType->allowsNull());
    }

    public function testGetUnionIdMethodSignature(): void
    {
        $reflection = new \ReflectionClass(UserInterface::class);
        $method = $reflection->getMethod('getUnionId');

        $this->assertTrue($method->isPublic());
        $this->assertSame('getUnionId', $method->getName());
        $this->assertSame(0, $method->getNumberOfParameters());

        $returnType = $method->getReturnType();
        $this->assertNotNull($returnType);
        $this->assertInstanceOf(\ReflectionNamedType::class, $returnType);
        $this->assertSame('string', $returnType->getName());
        $this->assertTrue($returnType->allowsNull());
    }

    public function testGetAvatarUrlMethodSignature(): void
    {
        $reflection = new \ReflectionClass(UserInterface::class);
        $method = $reflection->getMethod('getAvatarUrl');

        $this->assertTrue($method->isPublic());
        $this->assertSame('getAvatarUrl', $method->getName());
        $this->assertSame(0, $method->getNumberOfParameters());

        $returnType = $method->getReturnType();
        $this->assertNotNull($returnType);
        $this->assertInstanceOf(\ReflectionNamedType::class, $returnType);
        $this->assertSame('string', $returnType->getName());
        $this->assertTrue($returnType->allowsNull());
    }
}
