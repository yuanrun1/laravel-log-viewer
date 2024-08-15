<div align="center">

# Yuanrun Laravel Log Viewer

`Yuanrun Log Viewer`是一个`Laravel`日志查看工具，支持大文件日志的查看和搜索功能，更改自[laravel-admin-extensions/log-viewer](https://github.com/laravel-admin-extensions/log-viewer)。

</div>

## 功能

- [x] 支持多层级目录
- [x] 支持查看大文件日志
- [x] 支持日志关键词检索
- [x] 支持多层级目录文件名称搜索
- [x] 支持下载功能
- [x] 支持分页
- [x] 支持手机页面


## 环境

- PHP >= 7
- laravel >= 5.5


## 安装

```bash
composer require yuanrun/laravel-log-viewer
```

发布配置文件，此步骤可省略

```bash
php artisan vendor:publish --tag=yuanrun-log-viewer
```

然后访问 `http://hostname/logs` 即可

配置文件

```php

return [
    'route' => [
        // 路由前缀
        'prefix'     => 'logs',
         // 命名空间
        'namespace'  => 'Yuanrun\LogViewer',
         // 中间件
        'middleware' => [],
    ],

    // 日志目录
    'directory' => storage_path('logs'),

    // 搜索页显示条目数（搜索后不分页，所以这个参数可以设置大一些）
    'search_page_items' => 500,

    // 默认每页条目数
    'page_items' => 30,
];
```

## License
[The MIT License (MIT)](LICENSE).
