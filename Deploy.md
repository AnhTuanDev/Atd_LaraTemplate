## Change public directory to public_html

**1. Change public to public_html**

**2. thêmm hàm sau vào public_html/index.php**

```php

// set the public path to this directory
$app->bind('path.public', function() {
    return __DIR__;
});

```

**3. Để nó hoạt động từ cả Http và Console, hãy thêm vào bootstrap / app.php**

```php

$app->bind('path.public', function() {
    return base_path().'/public_html';
});

```

**4. Thêm function sau vào app/Providers/AppServiceProvider.php**

```php

$this->app->bind('path.public', function() {
            //return base_path('public_html');
            return base_path().'/public_html';
        });

```

**5. Thay đổi trong tệp root/server.php như sau**

```php

//if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

//require_once __DIR__.'/public/index.php';


if ($uri !== '/' && file_exists(__DIR__.'/public_html'.$uri)) {
    return false;
}

require_once __DIR__.'/public_html/index.php';

```
