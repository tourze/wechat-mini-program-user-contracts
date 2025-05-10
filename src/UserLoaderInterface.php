<?php

namespace Tourze\WechatMiniProgramUserContracts;

use Tourze\WechatMiniProgramAppIDContracts\MiniProgramInterface;

interface UserLoaderInterface
{
    public function loadUserByOpenId(string $openId): ?UserInterface;

    public function loadUserByUnionId(string $unionId): ?UserInterface;

    public function createUser(MiniProgramInterface $miniProgram, string $openId, ?string $unionId = null): UserInterface;
}
