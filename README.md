## PHP Larevel Crud
CRUD API with Laravel 8 and Bref framework to deploy app in any cloud system

this application makes use of the following features of the framework

- controller
- model
- migration
- seeder
- factories
- commands
- observer
- validation
- elloquent (orm)

[Repository Pattern](https://medium.com/@renicius.pagotto/entendendo-o-repository-pattern-fcdd0c36b63b) was also used in this project.

for data storage the relational database `MySQL 8` was used

---

## Install and configure


First clone repository
```bash
git clone https://github.com/filipemansano/php-product-crud.git
```

> It's necessary have the [docker](https://www.docker.com/) and [docker-compose](https://docs.docker.com/compose/install/) installed.

now run command below to start a docker-machine and install the dependencies
```bash
make build && make install && make migrate
```

Avaliables `make` commands
command | description
--- | ---
deploy | deploy application on AWS
undeploy | un-deploy application on AWS
bash | enter bash mode on `app` docker-instance
migrate | perform initials database operations (locally)
migrate-remote | perform initials database operations (remote)
build | crete a docker containers
install | install all dependencies
test | execute all tests
stop | stop all docker containers

---

## Documentation
Run application and acess [this link](http://localhost:8000/docs/index.html).
