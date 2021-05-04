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
Fist clone repository
```bash
git clone https://github.com/filipemansano/php-product-crud.git
```

start a docker-machine and install dependencies
```bash
make build && make install && make migrate
```

Avaliables make commands
command | description
--- | ---
deploy | deploy application on cloud
undeploy | un-deploy application on cloud
bash | enter bash mode on `app` docker-instance
migrate | perform initials database operations (locally)
migrate-remote | perform initials database operations (remote)
build | crete a docker instances
install | install all dependencies

---

## Documentation
Run application and acess [this link](http://localhost:8000/docs/index.html).
