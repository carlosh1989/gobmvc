#!/bin/bash
# -*- ENCODING: UTF-8 -*-
#proyecto=@@nombre_proyecto@@

if [ $1 ] && [ $1 ]; then
   if [ "revizar" = $1 ]; then
		bash ./consola/revizar.sh $2
	fi

	if [ "reparar" = $1 ]; then
		bash ./consola/reparar.sh $2
	fi
else
   echo faltan variables
   echo Ejemplo box revizar traslado	
fi

