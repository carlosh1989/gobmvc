	#!/bin/bash

# -*- ENCODING: UTF-8 -*-

#proyecto=@@nombre_proyecto@@

./vendor/bin/phpcbf --colors ./app/controller/$1.controller.php
./vendor/bin/php-cs-fixer fix ./app/controller/$1.controller.php
