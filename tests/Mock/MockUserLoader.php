<?php

namespace Tourze\WechatMiniProgramUserContracts\Tests\Mock;

use Tourze\WechatMiniProgramAppIDContracts\MiniProgramInterface;
use Tourze\WechatMiniProgramUserContracts\UserInterface;
use Tourze\WechatMiniProgramUserContracts\UserLoaderInterface;

class MockUserLoader implements UserLoaderInterface
{
    /** @var UserInterface[] */
    private array $users = [];
    
    public function addUser(UserInterface $user): void
    {
        $this->users[$user->getOpenId()] = $user;
    }
    
    public function loadUserByOpenId(string $openId): ?UserInterface
    {
        return $this->users[$openId] ?? null;
    }
    
    public function loadUserByUnionId(string $unionId): ?UserInterface
    {
        foreach ($this->users as $user) {
            if ($user->getUnionId() === $unionId) {
                return $user;
            }
        }
        
        return null;
    }
    
    public function createUser(MiniProgramInterface $miniProgram, string $openId, ?string $unionId = null): UserInterface
    {
        $user = new MockUser($miniProgram, $openId, $unionId);
        $this->addUser($user);
        return $user;
    }
} 