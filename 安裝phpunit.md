## 設定 composer

加入 autoload
```json
{
    "autoload": {
        "psr-4": {
            "Recca0120\\Todolist\\": "src/"
        }
    },
    "autoload-dev": {
        "psr-4": {
            "Recca0120\\Todolist\\Tests\\": "tests/"
        }
    }
}
```

## 設定 phpunit

```bash
# 安裝 phpunit
composer require phpunit/phpunit

# 初始化 phpunit
vendor/bin/phpunit --generate

# 建立 src 資料夾
mkdir src

# 建立 tests 資料夾
mkdir tests
```


