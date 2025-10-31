<?php

declare(strict_types=1);

namespace Tourze\WechatMiniProgramUserContracts;

use Tourze\WechatMiniProgramAppIDContracts\MiniProgramInterface;

interface UserInterface
{
    /**
     * 在微信小程序生态，一定要存在关联的
     */
    public function getMiniProgram(): MiniProgramInterface;

    public function getOpenId(): string;

    public function getUnionId(): ?string;

    public function getAvatarUrl(): ?string;
}
