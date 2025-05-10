<?php

namespace Tourze\WechatMiniProgramUserContracts;

interface UserLoaderInterface
{
    public function loadUserByOpenId(string $openId): ?UserInterface;

    public function loadUserByUnionId(string $unionId): ?UserInterface;
}
