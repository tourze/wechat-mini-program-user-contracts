<?php

namespace Tourze\WechatMiniProgramUserContracts\Tests;

use PHPUnit\Framework\TestCase;
use Tourze\WechatMiniProgramAppIDContracts\MiniProgramInterface;
use Tourze\WechatMiniProgramUserContracts\Tests\Mock\MockMiniProgram;
use Tourze\WechatMiniProgramUserContracts\Tests\Mock\MockUser;

class UserInterfaceTest extends TestCase
{
    private MockUser $user;
    private MockMiniProgram $miniProgram;
    
    protected function setUp(): void
    {
        $this->miniProgram = new MockMiniProgram('wx12345', 'secret12345');
        $this->user = new MockUser(
            $this->miniProgram,
            'test-open-id',
            'test-union-id',
            'https://example.com/avatar.jpg'
        );
    }
    
    public function testGetMiniProgram_returnsValidMiniProgram(): void
    {
        $miniProgram = $this->user->getMiniProgram();
        
        $this->assertInstanceOf(MiniProgramInterface::class, $miniProgram);
        $this->assertEquals('wx12345', $miniProgram->getAppId());
        $this->assertEquals('secret12345', $miniProgram->getAppSecret());
    }
    
    public function testGetOpenId_returnsNonEmptyString(): void
    {
        $openId = $this->user->getOpenId();
        
        $this->assertNotEmpty($openId);
        $this->assertEquals('test-open-id', $openId);
    }
    
    public function testGetUnionId_returnsExpectedValue(): void
    {
        $unionId = $this->user->getUnionId();
        
        $this->assertIsString($unionId);
        $this->assertEquals('test-union-id', $unionId);
    }
    
    public function testGetUnionId_canReturnNull(): void
    {
        $user = new MockUser($this->miniProgram, 'open-id-without-union', null);
        
        $this->assertNull($user->getUnionId());
    }
    
    public function testGetAvatarUrl_returnsExpectedValue(): void
    {
        $avatarUrl = $this->user->getAvatarUrl();
        
        $this->assertIsString($avatarUrl);
        $this->assertEquals('https://example.com/avatar.jpg', $avatarUrl);
    }
    
    public function testGetAvatarUrl_canReturnNull(): void
    {
        $user = new MockUser($this->miniProgram, 'open-id-without-avatar', 'union-id', null);
        
        $this->assertNull($user->getAvatarUrl());
    }
} 