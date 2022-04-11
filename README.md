Http-Cache-Control
------------------

A tiny lib which provides documented [constants](https://github.com/staabm/http-cache-control/blob/main/lib/Constants.php) and [example use-cases](https://github.com/staabm/http-cache-control/blob/main/lib/UseCase.php) for the HTTP `Cache-Control` header, based on the [official cloudflare documentation](https://developers.cloudflare.com/cache/about/cache-control/).

Sending proper Cache-Control headers is essential to each web-application, but the required keywords are sometimes misleading and ambiguous. 
This library aims to provide a more reliable and consistent way to set the Cache-Control header.


Example
-------

```php
use staabm\HttpCacheControl\Constants;
use staabm\HttpCacheControl\UseCase;

class MyController {
    public function sendPdf(string $pdfFile) {
        header(Constants::CACHE_CONTROL .':'. UseCase::cacheOnBrowserAndProxyRequireProxyRevalidation());
        
        readfile($pdfFile);
    }
    
    public function sendGdpr(string $pdfFile) {
        header(Constants::CACHE_CONTROL_CLOUDFLARE .':'. UseCase::cacheOnBrowserAndProxyForDifferentTime(300, 3600));
        
        readfile($pdfFile);
    }
}
```
