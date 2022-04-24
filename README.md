# ProgWeb
grupo8
El gerente de la cadena de hoteles Sweet Dreams requiere que los 
clientes puedan cotizar en línea el servicio que desea tomar teniendo 
en cuenta los siguientes criterios: 
El hotel ofrece los siguientes servicios:
Tabla 1: Espacios por día Vs. Costo
*Espacios Costo
Habitación sencilla $50.000
Habitación doble $75.000
Habitación triple $100.000
Suit $300.000
Eventos $3.000.000 
* Se pueden incluir más servicios.

El hotel ofrece los siguientes descuentos por tiempo de uso de servicios
Tabla 2: Descuentos por tiempo Vs Porcentaje de descuento
*Descuentos por 
tiempo
Porcentaje de descuento
Diario O%
Semanal 5%
Mensual 10%
Bimensual 15%
Semestral 20%
Anual 30%
* No se ofrecen servicios de más de un año.

Adicional al tiempo de uso de servicios indicado anteriormente, se 
ofrece un plan de descuentos según el número de servicios.
Tabla 3: Número de servicios Vs descuentos. 
No. de servicios cotizados Descuento
1 0%
2 6%
3 12%
4 18%
5 o más servicios 20%

Existen 2 tipos de clientes: nuevos o antiguos. Si el cliente es nuevo no 
aplica a más descuentos. Pero, si el cliente es antiguo tendrá un 
descuento adicional del 17% en la facturación de servicios del hotel.
Para completar el costo del servicio se debe aplicar Impuesto Sobre 
las Ventas (IVA): 19%

Se debe integrar los requerimientos en el sitio web elegido en la Fase 
3, usando PHP, de acuerdo con los siguientes criterios:

Tenga en cuenta la maquetación realizada en la a fase 3. En la división 
2 integrar un enlace de cotización de servicios, en seguida del menú de 
las sucursales. Al clicar en el enlace despliega un formulario en la 
división 3, para que el usuario elija las variables de la cotización así:
1. Selección los servicios a tomar través de una lista de 
opciones(checkbox).
2. Selección de periodo tiempo que tomara para los servicios.
3. Selección del tipo de cliente (nuevo, antiguo). 
El script en PHP debe retornar el valor a pagar de acuerdo a las tablas 
de valores de los espacios tomados del hotel.