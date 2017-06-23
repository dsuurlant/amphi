amphi
=====
A sample API for a cinema organisation.

After installing the usual (Composer, parameters.yml etc), run the following commands one by one to set up the database:

````
bin/console doctrine:schema:update --force
````
````
bin/console hautelook:fixtures:load
````
````
bin/console doctrine:fixtures:load
````