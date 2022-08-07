# Kipchak template

This is a starter project based on the Kipchak (https://github.com/mam-luk/kipchak) tookit - 
which is a set of components added on top of Slim Framework (https://www.slimframework.com/) - to 
help build APIs quickly. Learn more about why Kipchak on https://github.com/mam-luk/kipchak.

This template demonstrates all the features of Kipchack which configurable largely via YAML files under 
the config folder, and it lays out a foundation for an opinionated way of using Slim. It does not restrict
any anything within Slim, and you can still use it as a vanilla Slim application.

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

* ~~OAuth verification~~
* ~~Key based Auth~~
* ~~OAuth Cache JWKS~~
* ~~Global Enabelment for JWKS and Keys (goes in Kipchak)~~ 
* ~~CouchDB Client~~
* ~~Memcached Client~~
* MySQL Client
* ~~Session Management with CouchDB~~
* ~~Session Management with Memcached~~
* ~~HTTP Client~~
* Add tests
* Add documentation
* Add sample helm / k8s
* ~~Rename config files~~
* ~~Session to use cache pools and db connections~~
* split out CDB client and CDB session handler


### CouchDB
Once the CouchDB server is up, create a database for the API:
```
curl -X PUT http://api:api@localhost:5984/_users
curl -X PUT http://api:api@localhost:5984/api
```

### Session Handling

#### With CouchDB
Once the CouchDB server is up, create a database for the API:

```
curl -X PUT http://api:api@localhost:5984/api_sessions
```