# phpDocumentor-markdown - Automatically generate Markdown documentation

Use cases: In-repository documentation, GitHub/GitLab wikis, AI prompt context.

## Markdown template for phpDocumentor3

![Tests Status](https://github.com/Saggre/phpDocumentor-markdown/workflows/Run%20tests/badge.svg?style=flat-square)
![Generate Docs Status](https://github.com/Saggre/phpDocumentor-markdown/workflows/Generate%20docs/badge.svg?style=flat-square)
[![FOSSA Status](https://app.fossa.com/api/projects/git%2Bgithub.com%2FSaggre%2FphpDocumentor-markdown.svg?type=shield)](https://app.fossa.com/projects/git%2Bgithub.com%2FSaggre%2FphpDocumentor-markdown?ref=badge_shield)

Wish there was an easy way to generate PHP source code documentation? \
Using [`phpDocumentor`](https://www.phpdoc.org/) with `phpDocumentor-markdown` template, you can automatically generate GitHub/GitLab-ready Markdown documentation from PHP source code. 

This template can be used to document: 

|            | Name | Descriptions | Inheritance | Implements | Constants | Properties | Methods | Inherited methods | 
|------------|------|--------------|-------------|------------|-----------|------------|---------|-------------------|
| Classes    | ✅    | ✅            | ✅           | ✅          | ✅         | ✅          | ✅       | ✅                 |
| Interfaces | ✅    | ✅            | ✅           | ➖          | ✅         | ✅          | ✅       | ➖                 |
| Traits     | ✅    | ✅            | ➖           | ➖          | ✅         | ✅          | ✅       | ➖                 |

|            | Name | Descriptions | Types (parameter, return, etc.) | Access modifiers |
|------------|------|--------------|---------------------------------|------------------|
| Functions  | ✅    | ✅            | ✅                               | ✅                | 
| Methods    | ✅    | ✅            | ✅                               | ✅                | 
| Properties | ✅    | ✅            | ✅                               | ✅                |

## Example
Examples are available in the [.wiki](.wiki/Home.md) directory.

## Installation & Usage
- Please refer to [this guide](https://docs.phpdoc.org/guide/getting-started/installing.html) for instructions on installing phpDocumentor.
- Usage instructions assume that `phpdoc` is the phpDocumentor binary.

### Running manually
```bash
# Run phpDocumentor with --template argument pointed to this directory's markdown template
phpdoc --directory=src --target=docs --template=<PATH TO THIS REPOSITORY/themes/markdown>
```

### Using Composer

#### Installation via Composer
```bash
# Require this package. You probably want it as a dev dependency
composer require --dev saggre/phpdocumentor-markdown
```

#### Running manually after installing via Composer
```bash
# Run phpDocumentor with --template argument pointed to markdown template inside vendor directory
phpdoc --directory=src --target=docs --template="vendor/saggre/phpdocumentor-markdown/themes/markdown"
```

### Installation & Usage tips

#### Adding a Composer helper script

Add this script to your `composer.json` and run `composer create-docs` to generate the documentation.

```json
"scripts": {
    "create-docs": "phpdoc --directory=src --target=docs --template='vendor/saggre/phpdocumentor-markdown/themes/markdown'"
},
```

#### Using with PhpDocumentor XML config

Add a template element to your phpDocumentor XML config and run `phpDocumentor` to generate the documentation.

```xml
<phpdocumentor>
    <!-- Specify template element inside phpdocumentor -->
    <template name="./vendor/saggre/phpdocumentor-markdown/themes/markdown"/>
</phpdocumentor>
```

You can also check out the [config file](./phpdoc.dist.xml) used for generating this repository's example documentation for a full example.

#### GitLab wiki

The output of this template can be used directly as a GitLab wiki.

#### GitHub wiki

⚠️ GitHub wiki [uses a flat directory structure](https://github.com/orgs/community/discussions/14020) for linking, so the internal links in the resulting documentation will not work as expected.

#### CI pipelines

You can use the [PhpDocumentor Docker image](https://hub.docker.com/r/phpdoc/phpdoc) with this template in your CI pipelines to generate documentation automatically.

#### AI integration

The generated documentation can be used as prompt context for AI models that work with source code. For other use cases you'll likely want structured data, like JSON.

## Running tests
```bash
# Clone the repository
git clone git@github.com:Saggre/phpDocumentor-markdown.git

# Go to the cloned repository
cd phpDocumentor-markdown

# Install dependencies
composer install

# Set up PHPUnit configuration
cp phpunit.xml.dist phpunit.xml

# Run PHPUnit in project root directory
composer test
```

## Contributing
- There are unit tests and functional tests available in the `tests` directory.
  - Unit tests are used to test individual Twig macros
  - Functional tests are used to test the whole documentation generation process

## Inspired by:

* [dmarkic/phpdoc3-template-md](https://github.com/dmarkic/phpdoc3-template-md)
* [cvuorinen/phpdoc-markdown-public](https://github.com/cvuorinen/phpdoc-markdown-public)
* [evert/phpdoc-md](https://github.com/evert/phpdoc-md)
* [heimrichhannot/phpdoc-github-template](https://github.com/heimrichhannot/phpdoc-github-template)


## License
[![FOSSA Status](https://app.fossa.com/api/projects/git%2Bgithub.com%2FSaggre%2FphpDocumentor-markdown.svg?type=large)](https://app.fossa.com/projects/git%2Bgithub.com%2FSaggre%2FphpDocumentor-markdown?ref=badge_large)