# Google Suggest Keywords Scraper

Get list of suggested keywords from Google Search by given keyword

## Installation:

```bash
composer require opendisk/google-suggest
```

### Usage:

```php
<?php

include 'vendor/autoload.php';

use Opendisk\WebScraper\GoogleSuggest;

$keyword = 'cara membuat';
$results = GoogleSuggest::get($keyword);

echo '<pre>';
print_r($results);
```

**Result:** 
```
Array
(
    [0] => cara membuat donat
    [1] => cara membuat daftar isi
    [2] => cara membuat seblak
    [3] => cara membuat daftar isi otomatis
    [4] => cara membuat google form
    [5] => cara membuat cireng
    [6] => cara membuat cilok
    [7] => cara membuat nasi goreng
)
```
