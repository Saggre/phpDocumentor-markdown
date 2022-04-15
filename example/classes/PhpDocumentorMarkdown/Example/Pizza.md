***

# Pizza

A pizza.



* Full name: `\PhpDocumentorMarkdown\Example\Pizza`
* Parent class: [`\PhpDocumentorMarkdown\Example\AbstractProduct`](./AbstractProduct.md)
* This class implements:
[`\PhpDocumentorMarkdown\Example\ProductInterface`](./ProductInterface.md), [`\JsonSerializable`](../../JsonSerializable.md)



## Methods


### __construct



```php
public Pizza::__construct(string $name, float $price, \PhpDocumentorMarkdown\Example\Pizza\Base|null $base = null): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `name` | **string** | Product name. |
| `price` | **float** | Product price. |
| `base` | **\PhpDocumentorMarkdown\Example\Pizza\Base&#124;null** | Pizza base. |


**Return Value:**





***

### getName

Get the name of the product.

```php
public Pizza::getName(): string
```









**Return Value:**





***

### getPrice

Get the price of the product.

```php
public Pizza::getPrice(): float
```









**Return Value:**





***

### jsonSerialize



```php
public Pizza::jsonSerialize(): mixed
```









**Return Value:**





***


## Inherited methods


### isReviewed

Whether the object has been reviewed.

```php
public ReviewableTrait::isReviewed(): bool
```









**Return Value:**





***

### getTaxRate

Get the tax rate for the product.

```php
public AbstractProduct::getTaxRate(): float
```









**Return Value:**





***


***
> Automatically generated from source code comments on 2022-04-16 using [phpDocumentor](http://www.phpdoc.org/) and [saggre/phpdocumentor-markdown](https://github.com/Saggre/phpDocumentor-markdown)
