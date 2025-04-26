
# Laravel Remote Documentation

[![Latest Version on Packagist](https://img.shields.io/packagist/v/veiliglanceren/laravel-remote-documentation.svg?style=flat-square)](https://packagist.org/packages/veiliglanceren/laravel-remote-documentation)
[![Total Downloads](https://img.shields.io/packagist/dt/veiliglanceren/laravel-remote-documentation.svg?style=flat-square)](https://packagist.org/packages/veiliglanceren/laravel-remote-documentation)
[![License](https://img.shields.io/packagist/l/veiliglanceren/laravel-remote-documentation.svg?style=flat-square)](LICENSE)

**Easily fetch, parse, and display remote Markdown documentation from GitHub (or other sources) directly into customizable Blade views inside your Laravel application.**

---

## ✨ Features

- Fetch remote `.md` files from public GitHub repositories
- Convert Markdown to clean HTML
- Generate Blade templates automatically
- Fully customizable Blade layouts
- Service-oriented, extensible, and tested

---

## 📦 Installation

Install the package via Composer:

```bash
composer require veiliglanceren/laravel-remote-documentation
```

Laravel will automatically discover the package.  
If needed, manually register the ServiceProvider:

```php
Veiliglanceren\LaravelRemoteDocumentation\RemoteDocumentationServiceProvider::class
```

And the Facade:

```php
'RemoteDocumentation' => Veiliglanceren\LaravelRemoteDocumentation\Facades\RemoteDocumentation::class,
```

---

## ⚡ Quick Usage

### Fetch documentation and generate Blade file via command:

```bash
php artisan remote-docs:fetch vendor/repository README.md
```

This will:
- Fetch the `README.md` from GitHub `vendor/repository`
- Convert it to HTML
- Save it as a Blade file under `resources/views/vendor/remote-documentation/vendor_repository.blade.php`

### Customize your layout

Override the default layout by publishing the views:

```bash
php artisan vendor:publish --tag=remote-documentation-views
```

You can then edit `resources/views/vendor/remote-documentation/layout.blade.php`.

---

## 🛠 Available Services

You can use services manually if needed:

| Service | Purpose |
|:---|:---|
| `RemoteDocumentation::get($repo, $file)` | Fetch and parse remote Markdown |
| `FileGenerateService::generate($repo, $file)` | Generate a Blade view file |

All services are fully extensible and injectable for advanced use cases.

---

## ✅ Testing

Run the tests using PestPHP:

```bash
./vendor/bin/pest
```

---

## 📚 Future Roadmap

- [ ] Add feature tests for full command flow
- [ ] Support private repositories with token authentication

---

## 📝 License

The MIT License (MIT).  
Please see [License File](LICENSE) for more information.

---

## 👨‍💻 About

Developed by [VeiligLanceren](https://veiliglanceren.nl) —  
Secure and professional Laravel development.

---
