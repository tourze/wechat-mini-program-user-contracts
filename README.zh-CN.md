# 微信小程序用户合约

[English](README.md) | [中文](README.zh-CN.md)

用于微信小程序用户管理的 PHP 合约包。

## 安装

```bash
composer require tourze/wechat-mini-program-user-contracts
```

## 概述

此包提供了在 PHP 生态系统中管理微信小程序用户的基本接口。它定义了用户实体和用户加载操作的合约，确保在不同应用中实现的一致性。

## 接口

### UserInterface

定义微信小程序用户实体的合约：

```php
<?php

use Tourze\WechatMiniProgramUserContracts\UserInterface;
use Tourze\WechatMiniProgramAppIDContracts\MiniProgramInterface;

interface UserInterface
{
    /**
     * 获取关联的小程序
     */
    public function getMiniProgram(): MiniProgramInterface;

    /**
     * 获取用户的 Open ID
     */
    public function getOpenId(): string;

    /**
     * 获取用户的 Union ID（可选）
     */
    public function getUnionId(): ?string;

    /**
     * 获取用户头像 URL（可选）
     */
    public function getAvatarUrl(): ?string;
}
```

### UserLoaderInterface

定义加载和创建微信小程序用户的合约：

```php
<?php

use Tourze\WechatMiniProgramUserContracts\UserLoaderInterface;
use Tourze\WechatMiniProgramAppIDContracts\MiniProgramInterface;

interface UserLoaderInterface
{
    /**
     * 通过 Open ID 加载用户
     */
    public function loadUserByOpenId(string $openId): ?UserInterface;

    /**
     * 通过 Union ID 加载用户
     */
    public function loadUserByUnionId(string $unionId): ?UserInterface;

    /**
     * 创建新用户
     */
    public function createUser(MiniProgramInterface $miniProgram, string $openId, ?string $unionId = null): UserInterface;
}
```

## 使用示例

```php
<?php

use Tourze\WechatMiniProgramUserContracts\UserInterface;
use Tourze\WechatMiniProgramUserContracts\UserLoaderInterface;

class MyUserService implements UserLoaderInterface
{
    public function loadUserByOpenId(string $openId): ?UserInterface
    {
        // 从数据库加载用户的实现
        // return $this->userRepository->findByOpenId($openId);
    }

    public function loadUserByUnionId(string $unionId): ?UserInterface
    {
        // 从数据库加载用户的实现
        // return $this->userRepository->findByUnionId($unionId);
    }

    public function createUser(MiniProgramInterface $miniProgram, string $openId, ?string $unionId = null): UserInterface
    {
        // 创建新用户的实现
        // $user = new User($miniProgram, $openId, $unionId);
        // $this->userRepository->save($user);
        // return $user;
    }
}
```

## 依赖项

- `tourze/wechat-mini-program-appid-contracts`: 用于 MiniProgramInterface 依赖

## 许可证

此包采用 [MIT 许可证](LICENSE)。

## 贡献

欢迎贡献！请随时提交 Pull Request。
