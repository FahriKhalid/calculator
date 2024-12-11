# STUDI KASUS HARI 2

## Requirements

- PHP 8.3
- Composer
- Xdebug extension
  - https://xdebug.org/wizard
  - https://herd.laravel.com/docs/windows/1/advanced-usage/xdebug

## Menjalankan Test

```bash
# as HTML
php vendor/bin/phpunit --coverage-html .coverage

# as CLI output
XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-text .coverage

# as standard code coverage for other tools
XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-clover=clover.xml
```

## Tugas

1. Lengkapi unit test agar 100% coverage
2. Refactor kode agar lebih SOLID, tanpa mengganggu behavior yang sudah ada (tetap 100% test coverage)
3. Integrasikan dengan github actions agar setiap push otomatis menjalankan sonar scanner dan mengupdate dashboard sonarqube
