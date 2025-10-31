<?php

declare(strict_types=1);

namespace Tourze\WechatMiniProgramUserContracts\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Tourze\WechatMiniProgramAppIDContracts\MiniProgramInterface;
use Tourze\WechatMiniProgramUserContracts\UserInterface;
use Tourze\WechatMiniProgramUserContracts\UserLoaderInterface;

/**
 * @internal
 */
#[CoversClass(UserLoaderInterface::class)]
class UserLoaderInterfaceTest extends TestCase
{
    public function testInterfaceExists(): void
    {
        $this->assertTrue(interface_exists(UserLoaderInterface::class));
    }

    public function testInterfaceHasRequiredMethods(): void
    {
        $reflection = new \ReflectionClass(UserLoaderInterface::class);

        $this->assertTrue($reflection->hasMethod('loadUserByOpenId'));
        $this->assertTrue($reflection->hasMethod('loadUserByUnionId'));
        $this->assertTrue($reflection->hasMethod('createUser'));
    }

    public function testLoadUserByOpenIdMethodSignature(): void
    {
        $reflection = new \ReflectionClass(UserLoaderInterface::class);
        $method = $reflection->getMethod('loadUserByOpenId');

        $this->assertTrue($method->isPublic());
        $this->assertSame('loadUserByOpenId', $method->getName());
        $this->assertSame(1, $method->getNumberOfParameters());

        $parameters = $method->getParameters();
        $openIdParam = $parameters[0];
        $this->assertSame('openId', $openIdParam->getName());
        $paramType = $openIdParam->getType();
        $this->assertInstanceOf(\ReflectionNamedType::class, $paramType);
        $this->assertSame('string', $paramType->getName());
        $this->assertFalse($paramType->allowsNull());

        $returnType = $method->getReturnType();
        $this->assertNotNull($returnType);
        $this->assertInstanceOf(\ReflectionNamedType::class, $returnType);
        $this->assertSame(UserInterface::class, $returnType->getName());
        $this->assertTrue($returnType->allowsNull());
    }

    public function testLoadUserByUnionIdMethodSignature(): void
    {
        $reflection = new \ReflectionClass(UserLoaderInterface::class);
        $method = $reflection->getMethod('loadUserByUnionId');

        $this->assertTrue($method->isPublic());
        $this->assertSame('loadUserByUnionId', $method->getName());
        $this->assertSame(1, $method->getNumberOfParameters());

        $parameters = $method->getParameters();
        $unionIdParam = $parameters[0];
        $this->assertSame('unionId', $unionIdParam->getName());
        $paramType = $unionIdParam->getType();
        $this->assertInstanceOf(\ReflectionNamedType::class, $paramType);
        $this->assertSame('string', $paramType->getName());
        $this->assertFalse($paramType->allowsNull());

        $returnType = $method->getReturnType();
        $this->assertNotNull($returnType);
        $this->assertInstanceOf(\ReflectionNamedType::class, $returnType);
        $this->assertSame(UserInterface::class, $returnType->getName());
        $this->assertTrue($returnType->allowsNull());
    }

    public function testCreateUserMethodSignature(): void
    {
        $reflection = new \ReflectionClass(UserLoaderInterface::class);
        $method = $reflection->getMethod('createUser');

        $this->assertTrue($method->isPublic());
        $this->assertSame('createUser', $method->getName());
        $this->assertSame(3, $method->getNumberOfParameters());

        $parameters = $method->getParameters();

        // First parameter: MiniProgramInterface $miniProgram
        $miniProgramParam = $parameters[0];
        $this->assertSame('miniProgram', $miniProgramParam->getName());
        $paramType = $miniProgramParam->getType();
        $this->assertInstanceOf(\ReflectionNamedType::class, $paramType);
        $this->assertSame(MiniProgramInterface::class, $paramType->getName());
        $this->assertFalse($paramType->allowsNull());

        // Second parameter: string $openId
        $openIdParam = $parameters[1];
        $this->assertSame('openId', $openIdParam->getName());
        $paramType = $openIdParam->getType();
        $this->assertInstanceOf(\ReflectionNamedType::class, $paramType);
        $this->assertSame('string', $paramType->getName());
        $this->assertFalse($paramType->allowsNull());

        // Third parameter: ?string $unionId = null (optional)
        $unionIdParam = $parameters[2];
        $this->assertSame('unionId', $unionIdParam->getName());
        $paramType = $unionIdParam->getType();
        $this->assertInstanceOf(\ReflectionNamedType::class, $paramType);
        $this->assertSame('string', $paramType->getName());
        $this->assertTrue($paramType->allowsNull());
        $this->assertTrue($unionIdParam->isOptional());
        $this->assertNull($unionIdParam->getDefaultValue());

        $returnType = $method->getReturnType();
        $this->assertNotNull($returnType);
        $this->assertInstanceOf(\ReflectionNamedType::class, $returnType);
        $this->assertSame(UserInterface::class, $returnType->getName());
        $this->assertFalse($returnType->allowsNull());
    }
}
