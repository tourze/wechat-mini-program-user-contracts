# WeChat Mini Program User Contracts

[English](README.md) | [中文](README.zh-CN.md)

A PHP contract package for WeChat Mini Program user management.

## Installation

```bash
composer require tourze/wechat-mini-program-user-contracts
```

## Overview

This package provides essential interfaces for managing WeChat Mini Program users within the PHP ecosystem. It defines contracts for user entities and user loading operations, ensuring consistent implementation across different applications.

## Features

- **User Entity Contract**: Defines the structure and behavior of WeChat Mini Program users
- **User Loading Contract**: Provides interfaces for loading and creating users
- **Type Safety**: Uses strict typing for better code reliability
- **PSR-4 Autoloading**: Follows PHP standards for easy integration

## Interfaces

### UserInterface

Defines the contract for a WeChat Mini Program user entity:

```php
<?php

use Tourze\WechatMiniProgramUserContracts\UserInterface;
use Tourze\WechatMiniProgramAppIDContracts\MiniProgramInterface;

interface UserInterface
{
    /**
     * Get the associated mini program
     */
    public function getMiniProgram(): MiniProgramInterface;

    /**
     * Get the user's Open ID
     */
    public function getOpenId(): string;

    /**
     * Get the user's Union ID (optional)
     */
    public function getUnionId(): ?string;

    /**
     * Get the user's avatar URL (optional)
     */
    public function getAvatarUrl(): ?string;
}
```

### UserLoaderInterface

Defines the contract for loading and creating WeChat Mini Program users:

```php
<?php

use Tourze\WechatMiniProgramUserContracts\UserLoaderInterface;
use Tourze\WechatMiniProgramAppIDContracts\MiniProgramInterface;

interface UserLoaderInterface
{
    /**
     * Load a user by their Open ID
     */
    public function loadUserByOpenId(string $openId): ?UserInterface;

    /**
     * Load a user by their Union ID
     */
    public function loadUserByUnionId(string $unionId): ?UserInterface;

    /**
     * Create a new user
     */
    public function createUser(MiniProgramInterface $miniProgram, string $openId, ?string $unionId = null): UserInterface;
}
```

## Usage Example

Here's a complete example of how to implement these interfaces:

```php
<?php

use Tourze\WechatMiniProgramUserContracts\UserInterface;
use Tourze\WechatMiniProgramUserContracts\UserLoaderInterface;
use Tourze\WechatMiniProgramAppIDContracts\MiniProgramInterface;

class MyUser implements UserInterface
{
    public function __construct(
        private MiniProgramInterface $miniProgram,
        private string $openId,
        private ?string $unionId = null,
        private ?string $avatarUrl = null
    ) {}

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

class MyUserService implements UserLoaderInterface
{
    public function __construct(
        private UserRepository $userRepository
    ) {}

    public function loadUserByOpenId(string $openId): ?UserInterface
    {
        return $this->userRepository->findByOpenId($openId);
    }

    public function loadUserByUnionId(string $unionId): ?UserInterface
    {
        return $this->userRepository->findByUnionId($unionId);
    }

    public function createUser(MiniProgramInterface $miniProgram, string $openId, ?string $unionId = null): UserInterface
    {
        $user = new MyUser($miniProgram, $openId, $unionId);
        $this->userRepository->save($user);
        return $user;
    }
}
```

## Dependencies

- **PHP**: 8.1 or higher
- **tourze/wechat-mini-program-appid-contracts**: For MiniProgramInterface dependency
- **ext-json**: Required for JSON operations

## Development Dependencies

- **phpstan/phpstan**: ^2.1 - Static analysis
- **phpunit/phpunit**: ^11.5 - Unit testing

## Quality Assurance

This package maintains high code quality standards:

- **Static Analysis**: Uses PHPStan for type checking and error detection
- **Unit Testing**: Comprehensive test coverage with PHPUnit
- **Strict Types**: Enforces strict typing throughout the codebase
- **PSR Standards**: Follows PSR-4 autoloading and PSR-12 coding standards

## Versioning

This package follows [Semantic Versioning](https://semver.org/). Major versions are introduced when breaking changes are made.

## License

This package is licensed under the [MIT License](LICENSE).

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request. For major changes, please open an issue first to discuss what you would like to change.

### Development Setup

1. Clone the repository
2. Install dependencies: `composer install`
3. Run tests: `composer test`
4. Run static analysis: `composer analyze`

### Testing

Run the test suite:

```bash
composer test
```

Run static analysis:

```bash
composer analyze
```

## Support

If you encounter any issues or have questions, please:

1. Check the [GitHub Issues](https://github.com/tourze/php-monorepo/issues)
2. Create a new issue if needed
3. Join our discussions for community support