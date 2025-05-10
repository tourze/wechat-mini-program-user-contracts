<?php

namespace Tourze\WechatMiniProgramUserContracts\Tests;

use PHPUnit\Framework\TestCase;
use Tourze\WechatMiniProgramUserContracts\Tests\Mock\MockMiniProgram;
use Tourze\WechatMiniProgramUserContracts\Tests\Mock\MockUser;
use Tourze\WechatMiniProgramUserContracts\Tests\Mock\MockUserLoader;
use Tourze\WechatMiniProgramUserContracts\UserInterface;

class UserLoaderInterfaceTest extends TestCase
{
    private MockUserLoader $userLoader;
    private MockMiniProgram $miniProgram;
    
    protected function setUp(): void
    {
        $this->miniProgram = new MockMiniProgram('wx12345', 'secret12345');
        $this->userLoader = new MockUserLoader();
        
        // 预先添加一些用户
        $user1 = new MockUser($this->miniProgram, 'existing-open-id', 'existing-union-id');
        $user2 = new MockUser($this->miniProgram, 'another-open-id', 'another-union-id');
        
        $this->userLoader->addUser($user1);
        $this->userLoader->addUser($user2);
    }
    
    public function testLoadUserByOpenId_withExistingOpenId_returnsUser(): void
    {
        $user = $this->userLoader->loadUserByOpenId('existing-open-id');
        
        $this->assertInstanceOf(UserInterface::class, $user);
        $this->assertEquals('existing-open-id', $user->getOpenId());
        $this->assertEquals('existing-union-id', $user->getUnionId());
    }
    
    public function testLoadUserByOpenId_withNonExistingOpenId_returnsNull(): void
    {
        $user = $this->userLoader->loadUserByOpenId('non-existing-open-id');
        
        $this->assertNull($user);
    }
    
    public function testLoadUserByUnionId_withExistingUnionId_returnsUser(): void
    {
        $user = $this->userLoader->loadUserByUnionId('existing-union-id');
        
        $this->assertInstanceOf(UserInterface::class, $user);
        $this->assertEquals('existing-open-id', $user->getOpenId());
        $this->assertEquals('existing-union-id', $user->getUnionId());
    }
    
    public function testLoadUserByUnionId_withNonExistingUnionId_returnsNull(): void
    {
        $user = $this->userLoader->loadUserByUnionId('non-existing-union-id');
        
        $this->assertNull($user);
    }
    
    public function testCreateUser_withRequiredParameters_createsAndReturnsUser(): void
    {
        $user = $this->userLoader->createUser($this->miniProgram, 'new-open-id');
        
        $this->assertInstanceOf(UserInterface::class, $user);
        $this->assertEquals('new-open-id', $user->getOpenId());
        $this->assertNull($user->getUnionId());
        
        // 确认用户已添加到加载器
        $loadedUser = $this->userLoader->loadUserByOpenId('new-open-id');
        $this->assertSame($user, $loadedUser);
    }
    
    public function testCreateUser_withAllParameters_createsAndReturnsUser(): void
    {
        $user = $this->userLoader->createUser($this->miniProgram, 'new-open-id-2', 'new-union-id');
        
        $this->assertInstanceOf(UserInterface::class, $user);
        $this->assertEquals('new-open-id-2', $user->getOpenId());
        $this->assertEquals('new-union-id', $user->getUnionId());
        
        // 确认用户可以通过 unionId 加载
        $loadedUser = $this->userLoader->loadUserByUnionId('new-union-id');
        $this->assertSame($user, $loadedUser);
    }
} 