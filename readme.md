
## Prueba de Webservice PSE - ACH Colombia

Este ensayo muetra un ejemplo de consumo del Webservice PSE - ACH Colombia, desde Laravel 5.5, utilizando el Cliente SOAP nativo de PHP

Este codigo muestra basicamente como hacer un pago, con los datos basicos desde un formulario, y el almacenamiento de la respuesta devuelta por el servicio, para luego ser listado.


## Sugerencias
Por razones de tiempos quedaron estos puntos pendientes:

- Control de usuarios

- Validacion de campos

- Crear una tabla registro de pagadores, de manera que al realizar el pago se puedan recuperar desde su numero de cedula o email.

- Manejo de Errores cuando el servicio no responde.

