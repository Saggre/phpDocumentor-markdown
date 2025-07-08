# Pizza

A pizza \| pie.

***

* Full name: `\PhpDocumentorMarkdown\Example\Pizza`
* Parent class: [`\PhpDocumentorMarkdown\Example\AbstractProduct`](./AbstractProduct)
* This class implements:
  [`\PhpDocumentorMarkdown\Example\ProductInterface`](./ProductInterface),
  `JsonSerializable`

## Properties

### name

Product name.

```php
private string $name
```

***

### price

Product price.

```php
protected float $price
```

***

### base

Pizza base.

```php
protected \PhpDocumentorMarkdown\Example\Pizza\Base|null $base
```

Property base description 

- **See:** \PhpDocumentorMarkdown\Example\ManyInterfaces

***

## Methods

### __construct

Constructor title

```php
public __construct(string $name = '', float $price = 10.0, \PhpDocumentorMarkdown\Example\Pizza\Base|null $base = null): mixed
```

Constructor description 

- **See:** \PhpDocumentorMarkdown\Example\ManyInterfaces 
- **See:** https://example.com

**Parameters:**

| Parameter | Type                                                | Description    |
|-----------|-----------------------------------------------------|----------------|
| `$name`   | **string**                                          | Product name.  |
| `$price`  | **float**                                           | Product price. |
| `$base`   | **\PhpDocumentorMarkdown\Example\Pizza\Base\|null** | Pizza base.    |

***

### getName

Get the name of the product.

```php
public getName(): string
```

**Return Value:**

The name of the product.

***

### getPrice

Get the price of the product.

```php
public getPrice(): float
```

***

### jsonSerialize

```php
public jsonSerialize(): mixed
```

***

### toArray

Get the instance as an array.

```php
public toArray(): array
```

***

## Inherited methods

### getTaxRate

Get the tax rate for the product.

```php
public getTaxRate(): float
```

***

### isReviewed

Whether the object has been reviewed.

```php
public isReviewed(): bool
```

***
