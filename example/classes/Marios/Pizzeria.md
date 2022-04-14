---
title: \Marios\Pizzeria
footer: false
---

# Pizzeria

Entrypoint for this pizza ordering application.

This class provides an interface through which you can order pizza's and pasta's from Mario's Pizzeria.

We have:
- American pizzas
- And real (italian) pizzas

* Full name: `\Marios\Pizzeria`
* This class is marked as **final** and can't be subclassed
* This class implements: \JsonSerializable

**See Also:**

* https://wwww.phpdoc.org 
* https://docs.phpdoc.org 



## Methods

### order



```php
public Pizzeria::order(\Marios\Pizza $pizzas): bool
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `pizzas` | **\Marios\Pizza** |  |




---
### doOrder

Places an order for a pizza.

```php
protected static Pizzeria::doOrder(\Marios\Pizza $pizza): bool
```

This is an example of a protected function with the static modifier whose parameters' type and return type is
determined by the DocBlock and no type hints are given in the method signature.

* This method is **static**.




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `pizza` | **\Marios\Pizza** | The specific pizza to place an order for. |


**Return Value:**

Whether the order succeeded



---
### doOldOrder



```php
final private Pizzeria::doOldOrder(): bool
```





* This method is **final**.
* **Warning:** this method is **deprecated**. This means that this method will likely be removed in a future version.




**Return Value:**

Demonstrate that 'false' is a valid return type in an DocBlock to indicate it won't just return any
boolean; it will _always_ be false.



---
### jsonSerialize



```php
public Pizzeria::jsonSerialize(): array
```











---


---
> Automatically generated from source code comments on 2020-06-18 using [phpDocumentor](http://www.phpdoc.org/) and [dmarkic/phpdoc3-template-md](https://github.com/dmarkic/phpdoc3-template-md)
