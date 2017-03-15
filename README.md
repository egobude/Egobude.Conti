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

`composer require egobude/conti`

## Create a new project

> Not fully implemented

 * `bin/conti project:create flow` (flow.neos.io)
 * `bin/conti project:create neos` (neos.io)
 * `bin/conti project:create symfony` (symfony.com)
 * `bin/conti project:create shopware` (shopware.com)
 * `bin/conti project:create wordpress` (wordpress.com)
 
## Interact with your stack 

> Fully implemented

 * `bin/conti stack:up` - Create and start containers
 * `bin/conti stack:down` - Stop and remove containers, networks, images, and volumes
 * `bin/conti stack:exec` - Execute a command in a running container
 * `bin/conti stack:restart` - Restart services
 
## Helper commands

> Fully implemented

 * `bin/conti helper:time` - Display current timestamp
