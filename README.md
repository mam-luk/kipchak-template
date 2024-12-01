<img src="https://raw.githubusercontent.com/mam-luk/kipchak/master/.mamluk/logo.svg" />

# Kipchak Starter Template

This is a starter project based on the Kipchak (https://github.com/mam-luk/kipchak) API Development Kit (ADK) - 
which is a set of components added on top of Slim Framework (https://www.slimframework.com/) to 
help build APIs rapidly. Learn more about why Kipchak on https://github.com/mam-luk/kipchak.

This template demonstrates all the features of Kipchak which are configurable largely via YAML files in 
the config folder, and it lays out a foundation for an opinionated way of using Slim. It does not restrict
any anything within Slim, and you can still use it as a vanilla Slim application.

## Install and Get Started
Run this command from the directory in which you want to install your new Kipchak API.

```
composer create-project mamluk/kipchak-template [api-name] -s dev
```

Replace ```[api-name]``` with the desired directory name for your new application.

## Some Philosophy for the Philosophware Engineers
The Kipchak template is structured with some assumptions about how APIs should be developed. These are
based around understanding definitions of certain common concepts like Entities, Models, etc. Our definitions
are spelled out here. We'll deal with these in the order in which a request flows through Kipchak.

* Routes - These are the first port of entry into your api. Specified in the ```routes``` directory, 
these should be versioned and generally call a controller, with or without invoking some middleware. They 
determine the URL and HTTP verb of an endpoint in your API.

* Middlewares - Middleware is general, re-usable functionality you want to apply to one or more routes 
before they reach the controller or just before a response is served. Global middlewares can be configured 
in the ```middlewares``` directory.

* Controllers - These are where you decide how to process an HTTP request. These should also be 
versioned alongside the routes so breaking changes to your API contracts can be managed consistently. Controllers
will usually receive an HTTP request, pass it to a Data Transfer Object to ensure that it meets the requirements
for the request, then pass the DTO to the model, which may invoke some business logic and entities before passing the response
back to the client. Controllers will also contain PHP attriubutes which formulate part of your OpenAPI specification.
* Models - This is where you write your business logic - what happens between the database or a third party API and 
your API.

* Entities - These are representations of your database schema in code. If you use Doctrine for an RBDMS, you
will specify Doctrine entities here. If you are using Couchbase, you would have an object representation of what 
will get stored in a CouchDB document.

* Data Transfer Objects - These are effectively what represent the data transferred to and from your API to
HTTP clients or any other systems external to your API. These must be versioned, and are the first step to ensuring that any data that comes with the 
request matches what you expect. These must also be versioned, as they are ultimately what form the API contract.

* Dependencies - Dependencies are common libraries or classes that you might want to use throughout your API.
You inject them as dependencies into the service container so they are created only once during the request / response
lifecycle, saving memory, cpu and valuable milliseconds. Explaining what a service / IO / dpendency container is is not part 
of the scope of this documentation, but if you don't know what it is, <a href="http://fabien.potencier.org/do-you-need-a-dependency-injection-container.html" target="_blank">this article</a> can help.

## Understanding how Kipchak bootstraps

### The Layout of the Land


## Kipchak provided database and cache clients
* Memcached (based on Symfony Cache)
* Apache CouchDB (3.2+)
* MySQL or a MySQL drop-in (Percona, MariaDB, etc.) (based on Doctrine)

## Understanding Config

## Kipchak Provided Dependencies

## Kipchak Provided Middlewares

## Injecting your own dependencies

## Writing your own Middlewares

## Is your API a BFF? Managing state

### To Do

* ~~OAuth verification~~
* ~~Key based Auth~~
* ~~OAuth Cache JWKS~~
* ~~Global Enabelment for JWKS and Keys (goes in Kipchak)~~ 
* ~~CouchDB Client~~
* ~~Memcached Client~~
* ~~MySQL Client~~
* ~~Session Management with CouchDB~~
* ~~Session Management with Memcached~~
* ~~HTTP Client~~
* Add tests
* Add documentation
* Add sample helm / k8s manifest
* ~~Rename config files~~
* ~~Session to use cache pools and db connections~~
* ~~Split out CDB client and CDB session handler~~


### CouchDB
Once the CouchDB Container comes up, you might see some errors in the log. This is because
Couchbase expects a _users database to be created for user management. Let's create this 
so Couchbase is ready to be used. Run the following on your terminal

```
curl -X PUT http://api:api@localhost:5984/_users
curl -X PUT http://api:api@localhost:5984/api
```

You can also create a new database(s) for managing any data your API creates. Let's create a database called 'api':

```
curl -X PUT http://api:api@localhost:5984/api
```

### Session Handling
If you are  building  a Backend for Frontend (BfF) with Kipchak, you will need to enable session handling.
Kipchak supports sessions using either CouchDB or Memcached. This can be configured in config/kipchak.sessions.php.

#### With CouchDB

If you are enabling session management with CouchDB in the kipchak.sessions.php config file in the config folder, you
should also create database to manage these sessions. Please ensure the database name manages the name on https://github.com/mam-luk/kipchak-template/blob/master/config/kipchak.sessions.php#L13.

If this is set to API sessions, run the following in your terminal to create the database:

```
curl -X PUT http://api:api@localhost:5984/api_sessions
```