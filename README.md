<img src="https://raw.githubusercontent.com/mam-luk/kipchak/master/.mamluk/logo.svg" />

# Kipchak Starter Template

This is a starter project based on the Kipchak (https://github.com/mam-luk/kipchak) tookit - 
which is a set of components added on top of Slim Framework (https://www.slimframework.com/) - to 
help build APIs quickly. Learn more about why Kipchak on https://github.com/mam-luk/kipchak.

This template demonstrates all the features of Kipchack which configurable largely via YAML files under 
the config folder, and it lays out a foundation for an opinionated way of using Slim. It does not restrict
any anything within Slim, and you can still use it as a vanilla Slim application.

## Install and Get Started
Run this command from the directory in which you want to install your new Kipchak template.

```
composer create-project mamluk/kipchak-template [api-name]
```

Replace [api-name] with the desired directory name for your new application.

## Understanding how Kipchak bootstraps

## Kipchak provided database and cache clients
* Memached (based on Symfony Cache)
* Apache CouchDB (3.2+)
* MySQL or a drop-in (Percona, MariaDB, etc.) (Based on Doctrine)


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


### OpenAPI
```
vendor/bin/openapi api -o openapi.yaml
```
