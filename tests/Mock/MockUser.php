<?php

namespace Tourze\WechatMiniProgramUserContracts\Tests\Mock;

use Tourze\WechatMiniProgramAppIDContracts\MiniProgramInterface;
use Tourze\WechatMiniProgramUserContracts\UserInterface;

class MockUser implements UserInterface
{
    public function __construct(
        private MiniProgramInterface $miniProgram,
        private string $openId,
        private ?string $unionId = null,
        private ?string $avatarUrl = null
    ) {
    }
    
    public function getMiniProgram(): MiniProgramInterface
    {
        return $this->miniProgram;
    }
    
    public function getOpenId(): string
    {
        return $this->openId;
    }
    
    public function getUnionId(): ?string
    {
        return $this->unionId;
    }
    
    public function getAvatarUrl(): ?string
    {
        return $this->avatarUrl;
    }
} 