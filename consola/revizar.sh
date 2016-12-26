	#!/bin/bash

# -*- ENCODING: UTF-8 -*-

#proyecto=@@nombre_proyecto@@

./vendor/bin/phpcs --colors ./app/controller/$1.controller.php
./vendor/bin/phpcs ./app/controller/$1.controller.php --report=diff
#./vendor/bin/phpmd --reportfile ./app/controller/$1.controller.php