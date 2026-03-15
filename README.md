# CakePHP-5-Inventory-Tracker

"require": {
    "php": ">=8.2",
    "cakephp/cakephp": "^5.3.0",
    "cakephp/migrations": "^4.0.0",
    "cakephp/plugin-installer": "^2.0",
    "mobiledetect/mobiledetectlib": "^4.8.03"
},
"require-dev": {
    "cakephp/bake": "^3.0.0",
    "cakephp/cakephp-codesniffer": "^5.3",
    "cakephp/debug_kit": "^5.2.0",
    "josegonzalez/dotenv": "^4.0",
    "phpunit/phpunit": "^11.5.3 || ^12.1.3"
},

Running Project:

Once the project is downloaded with XAMPP or equivilent turned on (both Apache and MySQL) the commandline can be used to run migrations, however this project came under errors that I believe are due to errors in the migration software, which means manual setup of the table may be required (please see below), ensure that your database is linked to the system by inspecting app_local.php in the config folder. bin/cake seeds run --force can be used to populate this table. The home page is /Inventory_Tracker/product.

Manual Table Setup:

Table name: product

Fields:(if not specified null = no)
id: int(11) PRIMARY KEY AUTO INCREMENT
name: varchar(50)
quantity: int(11)
price: int(11)
status: varchar(50) default null null allowed
flag: int(11) default null null allowed
last_updated: varchar(50) default null null allowed


Running Testing:

Due to Issues found within Migrations I have not been able to solve in the time scope of this project, the automated tests have been limited (with further development I would like to run post() tests on the system, however this error appears to make the function inoperable). vendor/bin/phpunit --testdox can be used to run the test suite, however all tests may throw back errors, if this occurs use bin/cake bake migration_snapshot CreateProducts, placing the former migration file in a folder outside of the project, before running the tests again.
