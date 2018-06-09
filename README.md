# Mugar_InvoiceType

Agrega la elección del tipo de factura en el checkout. 

[![Build Status](https://travis-ci.org/mug-ar/module-invoice-type.svg?branch=master)](https://travis-ci.org//mug-ar/module-invoice-type)

## Getting Started

### Prerequisitos

Para arrancar, se requiere una instalación funcionando de Magento 2

```
php bin/magento setup:install --admin-user sampleuser --admin-firstname John --admin-lastname Doe --admin-email user@example.com --admin-password secret123
```

### Instalación

Para instalar el módulo, se necesita agregarlo como dependencia en el archivo composer.json de Magento.

O bien editando composer.json

```
{
  "require": {
    "mugar/module-invoice-type": "@stable
  }
}
```

o corriendo composer require

```
php composer.phar require mugar/module-invoice-type
```

Luego de instalar, se debe activar vía Magento CLI

```
php bin/magento module:enable Mugar_InvoiceType
```

## Ejecutando los tests

TBD - Explicá como ejecutar los tests automatizados para este sistema

### Detalle de los tests

TBD - Explicá lo que prueban estos tests y por qué

```
Dar ejemplo
```

### Y estilos de código

TBD - Explicá lo que prueban estos tests y por qué

```
Dar ejemplo
```

### Otras necesidades específicas del proyecto

TBD - Explicá si se utilizan otras herramientas. Explicá como configurar todo.

```
Dar un ejemplo
```

## Deployment

TBD - Agregá notas adicionales de como hacer un deploy a un sistema productivo

## Magento 2

### Componentes

TBD - Explicá como hiciste tu módulo. Usaste Plugins u Observers? Dónde está el punto de entrada del módulo?.

### Extensiones

TBD - Explicá como extender tu módulo.

```
Da un ejemplo
```

### Configuraciones

TBD - Dá una visión general de las configuraciones.

| Section | Group | Field | Description | 
| ------ | ----- | ----- | ----------- |
| web | default | cms_home_page | Select the CMS Home Page |
| web | default| cms_no_route | Select the 404 Page |
| web | default | cms_no_cookies | Select the No Cookies Page |

## Versioning

Usamos [SemVer](http://semver.org/) para el versionado. Para las versiones disponibles, mirá los [tags de este repositorio](https://github.com/mug-ar/module-invoice-type/tags). 

## Autores

Revisá la lista de [contribuyentes](https://github.com/mug-ar/module-invoice-type/contributors) que participaron de este proyecto.

