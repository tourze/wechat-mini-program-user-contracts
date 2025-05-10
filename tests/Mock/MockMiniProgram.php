<?php

namespace Tourze\WechatMiniProgramUserContracts\Tests\Mock;

use Tourze\WechatMiniProgramAppIDContracts\MiniProgramInterface;

class MockMiniProgram implements MiniProgramInterface
{
    private string $appId;
    private string $appSecret;
    
    public function __construct(string $appId = 'test-app-id', string $appSecret = 'test-app-secret')
    {
        $this->appId = $appId;
        $this->appSecret = $appSecret;
    }
    
    public function getAppId(): string
    {
        return $this->appId;
    }
    
    public function getAppSecret(): string
    {
        return $this->appSecret;
    }
} 