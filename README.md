# Consideraciones de instalación y funcionamiento

## Instalación Wampserver Windows 10
- Dirigirse a [![Instalación Wamp](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://www.wampserver.com/en/php-addons/)
- Instalar WampServer
- Una vez instalado, dirigirse a la ruta "../wamp64/www" y clonar este repositorio (https://github.com/LemosGustavo/salas.git)
- Se crea automáticamente la carpeta salas.

## Configuración Wampserver
Una vez realizada la instalación, se va a configurar el entorno de localhost para que funcione el proyecto.
- Verificar que el estado de la aplicación wampserver se encuentre en verde o en su defecto que esté en funcionamiento MySQL y Apache.
- Click izquierdo sobre el icono verde de wampserver. Se despliega un menú en el que se va a seleccionar "Your VirtualHosts-> VirtualHost Management".
- Una vez en "VirtualHost Management", en el primer campo colocamos "testing.salas.com.ar" y en el segundo, la ruta donde se clonó el repositorio, pero teniendo en cuenta lo siguiente "../wamp64/www/salas/public/". El tercer campo lo dejamos en blanco.
- Click en "Start the creation of the VirtualHost(May take a while...)"
- Se creó una ruta de host, donde está nuestro proyecto y lo podemos llamar por el navegador (http://testing.salas.com.ar/)
- Ahora, click izquierdo sobre el icono de wampserver y seleccionar "Restart all services"
- En el caso de que no se pueda acceder, crear un "alias" en apache.

### [SI NO FUNCIONA EL PROYECTO CON LA RUTA ANTERIOR, REALIZAR ESTO]
Se va a crear un alias del proyecto, donde se toma la ruta del mismo que está de manera local en nuestra máquina.
- Nuevamente, click izquierdo sobre el ícono de wampserver, esta vez seleccionar "Apache-> Alias directories-> Add an alias".
- Se abre un prompt. La primer opción que nos muestra colocamos el nombre del proyecto "salas". En la segunda opción colocar que nos pide la ruta, colocar donde se encuntra el proyecto "../wamp64/www/salas/public/"
- Reiniciar todos los servicios nuevamente "Restart all services".
- Listo!

**Este Proyecto está desarrollado con CodeIgniter 4 y con la plantilla AdminLte 3. Utiliza por base de datos MySQL**

# Readme CI4
# CodeIgniter 4 Development

[![Build Status](https://github.com/codeigniter4/CodeIgniter4/workflows/PHPUnit/badge.svg)](https://github.com/codeigniter4/CodeIgniter4/actions?query=workflow%3A%22PHPUnit%22)
[![Coverage Status](https://coveralls.io/repos/github/codeigniter4/CodeIgniter4/badge.svg?branch=develop)](https://coveralls.io/github/codeigniter4/CodeIgniter4?branch=develop)
[![Downloads](https://poser.pugx.org/codeigniter4/framework/downloads)](https://packagist.org/packages/codeigniter4/framework)
[![GitHub release (latest by date)](https://img.shields.io/github/v/release/codeigniter4/CodeIgniter4)](https://packagist.org/packages/codeigniter4/framework)
[![GitHub stars](https://img.shields.io/github/stars/codeigniter4/CodeIgniter4)](https://packagist.org/packages/codeigniter4/framework)
[![GitHub license](https://img.shields.io/github/license/codeigniter4/CodeIgniter4)](https://github.com/codeigniter4/CodeIgniter4/blob/develop/LICENSE)
[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/codeigniter4/CodeIgniter4/pulls)
<br>

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](http://codeigniter.com).

This repository holds the source code for CodeIgniter 4 only.
Version 4 is a complete rewrite to bring the quality and the code into a more modern version,
while still keeping as many of the things intact that has made people love the framework over the years.

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

### Documentation

The [User Guide](https://codeigniter4.github.io/userguide/) is the primary documentation for CodeIgniter 4.

The current **in-progress** User Guide can be found [here](https://codeigniter4.github.io/CodeIgniter4/).
As with the rest of the framework, it is a work in progress, and will see changes over time to structure, explanations, etc.

You might also be interested in the [API documentation](https://codeigniter4.github.io/api/) for the framework components.

## Important Change with index.php

index.php is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

CodeIgniter is developed completely on a volunteer basis. As such, please give up to 7 days
for your issues to be reviewed. If you haven't heard from one of the team in that time period,
feel free to leave a comment on the issue so that it gets brought back to our attention.

We use GitHub issues to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

If you raise an issue here that pertains to support or a feature request, it will
be closed! If you are not sure if you have found a bug, raise a thread on the forum first -
someone else may have encountered the same thing.

Before raising a new GitHub issue, please check that your bug hasn't already
been reported or fixed.

We use pull requests (PRs) for CONTRIBUTIONS to the repository.
We are looking for contributions that address one of the reported bugs or
approved work packages.

Do not use a PR as a form of feature request.
Unsolicited contributions will only be considered if they fit nicely
into the framework roadmap.
Remember that some components that were part of CodeIgniter 3 are being moved
to optional packages, with their own repository.

## Contributing

We **are** accepting contributions from the community!

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/contributing/README.md).

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:


- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- xml (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)

## Running CodeIgniter Tests

Information on running the CodeIgniter test suite can be found in the [README.md](tests/README.md) file in the tests directory.
