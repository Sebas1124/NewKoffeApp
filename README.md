### KOFFE SHOP ###

## Instalar nuestro aplicativo ##

* Clonamos el repositorio en nuestro equipo mediante el comando *git clone https://github.com/Sebas1124/NewKoffeApp.git*

* Para instalar el aplicativo debemos contar con NodeJs y Composer previamente instalados en nuestro Equipo

* Una vez en nuestra carpeta del proyecto, abrimos una ventana de comandos en la raiz de nuesto aplicativo y ejecutamos los siguientes comandos

* *npm install* esto para instalar todos los modulos y dependencias de nuestro aplicativo.

* Posteriormente ejecutamos el comando *Composer install* para instalar los servicios del FrameWork

* Una ves configurado esto, configuramos nuestra base de datos, **OJO MUY IMPORTANTE** dentro de nuestro File System, en nuestra carpeta Database encontramos la Base de datos con todos los productos agregados, con sus respectivas imagenes, Es importante Importar esa base de datos dentro de nuestro motor de base de datos en mi caso utilice Xampp *Pasos para Crear bd*

*-1 Vamos a nuestro Localhost y en las bases de datos creamos una nueva ingresamos el nombre koffe, una vez creada buscamos donde dice Importar y seleccionamos el archivo KoffeDB.sql

*PD: dentro de la carpeta database hay otra que se llama Migrations, ahí encontremos la estructura con la cual se creó la base de datos, podemos migrar nuestra Base de datos por medio de comandos pero esto generaría un error al ejecutarla ya que no encontraria las imagenes o los productos que previamente ya están creados Unicamente la dejo ahí para validar conocimientos*

## Ejecutar nuestro Aplicativo ##

Una vez lista la instalación de nuestro aplicativo, vamos a abrir nuestra consola de comandos y ejecutamos *Php artisan serve* esto lanzará nuestro Aplicativo de forma virtual y ya podrán visualizar todo el contenido esto estará corriendo en el puerto 8000, es decir Localhost:8000

## Contenido del aplicativo ##

Se entrega aplicativo completo, desde Manejo de usuarios hasta Modulo de ventas, cumpliendo con los requerimientos impuestos al momento de presentar la Prueba Tecnica

**INCLUYE METODO DE PAGO EN MODO PRUEBA MERCADOPAGO**

* Para usar el metodo de pago debemos utilizar una tarjeta de prueba que MERCADOPAGO nos provee en este caso pueden utilizar estas:

https://www.mercadopago.com.co/developers/es/docs/checkout-pro/additional-content/test-cards

**ES IMPORTANTE USAR EL CORREO DE @TESTUSER YA QUE SE ENCUENTRA EN MODO PRUEBA**

* Mastercard	5254 1336 7440 3564	ccv:123	 Fecha: 11/25  nombre: APRO CC: 123456789 email: test_user_55873468@testuser.com

* Visa	4013 5406 8274 6260	ccv:123	 Fecha: 11/25  nombre: APRO CC: 123456789 email: test_user_55873468@testuser.com

* American Express	3743 781877 55283	1234	11/25	ccv:123	 Fecha: 11/25  nombre: APRO CC: 123456789 email: 
test_user_55873468@testuser.com


### NOTA ###

Debido a la ultima actualizacion de Laravel, este ya utiliza Vite como motor de procesado, esto lo hace un poco más eficiente a la hora de cargar nuestras aplicaciones, pero esto añade un paso, solo si es necesario y se lanza un error apenas entrar al aplicativo, la solucion es en la terminal dentro de la carpeta raiz, debemos ejecuar el comando "Npm run dev" Esto solucionará el error y te permitirá navegar sin problemas

## FIn ###

Posteriormente procedo a informar que contiene este aplicativo

-Modulo de usuarios
-Modulo de productos
-Modulo de ventas y detalles de ventas
-Modulo de carrito de compras
-APIRestFull de MercadoPago en modo test para realizar pruebas de compra utilizando el metodo de pago mencionado
-Diseño y estructura totalmete CSS no se utilizó ningun tipo de plantilla, unicamente en el dashboard admin Utilizando ADMINLTE3


### Disfruta de este repo es totalmente libre de modificaciones ### 

La idea es seguir aprendiendo cada diá más! Just Be Fun :)

Visita mi portafolio www.sebasportafolio.com