---

# Base

Represents a pizza base.



* Full name: `\PhpDocumentorMarkdown\Example\Pizza\Base`



## Constants

| Constant | Type | Value |
|:---------|:-----|:------|
|`\PhpDocumentorMarkdown\Example\Pizza\Base::YEAST_SOURDOUGH_STARTER`||0b1|
|`\PhpDocumentorMarkdown\Example\Pizza\Base::YEAST_FRESH`||0b10|
|`\PhpDocumentorMarkdown\Example\Pizza\Base::YEAST_ACTIVE_DRY`||0b11|

## Methods


### __construct



```php
public Base::__construct(\PhpDocumentorMarkdown\Example\Pizza\Sauce $sauce, int $yeast = self::YEAST_SOURDOUGH_STARTER): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `sauce` | **\PhpDocumentorMarkdown\Example\Pizza\Sauce** |  |
| `yeast` | **int** |  |


**Return Value:**





---

### getSauce



```php
public Base::getSauce(): \PhpDocumentorMarkdown\Example\Pizza\Sauce
```









**Return Value:**





---

### getYeast



```php
public Base::getYeast(): int
```









**Return Value:**





---


---
> Automatically generated from source code comments on 2022-04-14 using [phpDocumentor](http://www.phpdoc.org/) and [saggre/phpdocumentor-markdown](https://github.com/Saggre/phpDocumentor-markdown)
