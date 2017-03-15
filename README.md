[![Latest Stable Version](https://poser.pugx.org/egobude/conti/v/stable)](https://packagist.org/packages/egobude/conti)
[![Latest Unstable Version](https://poser.pugx.org/egobude/conti/v/unstable)](https://packagist.org/packages/egobude/conti)
[![Total Downloads](https://poser.pugx.org/egobude/conti/downloads)](https://packagist.org/packages/egobude/conti)
[![License](https://poser.pugx.org/egobude/conti/license)](https://packagist.org/packages/egobude/conti)
[![Monthly Downloads](https://poser.pugx.org/egobude/conti/d/monthly)](https://packagist.org/packages/egobude/conti)

conti - Utility for your docker development environment
===================

## Requirements

 * docker (https://docs.docker.com/engine/installation)
 * docker-compose (https://docs.docker.com/compose)
 * composer (https://getcomposer.org)

## How to start

Create a new project: 

```
composer create-project --dev --keep-vcs neos/flow-base-distribution flow-framework
```

Then add `conti` to your composer.json:

```
composer require egobude/conti
```

After `conti` is installed you can create your docker development stack:

```
bin/conti stack:create
```
 
This will create a new `docker-compose.yml` and a `.env` file in your project directory. See [Interact with your stack](#interact-with-your-stack) to get started.
 
## Interact with your stack 

> Not fully implemented

 * `bin/conti stack:up` - Create and start containers
 * `bin/conti stack:down` - Stop and remove containers, networks, images, and volumes
 * `bin/conti stack:exec` - Execute a command in a running container
 * `bin/conti stack:restart` - Restart services
 * `bin/conti stack:logs` - View output from containers
 * `bin/conti stack:deploy` - Deploy your application
 
## Helper commands

> Fully implemented

 * `bin/conti helper:time` - Display current timestamp
