# Prueba técnica IT - Programador/a Fullstack

- Tarea: desarrollar una API de consulta de la API pública de StackOverflow
- Tiempo de realización de la tarea: ~2 horas.

### Decisiones tomadas

- Entre Symfony, Laravel o Yii2 tomé la decisión de utilizar Yii2 por ser el framework mas compacto de los tres.  
- En el enpoint de stackexchange, parámetro site indica de que sitio se quieren sacar las preguntas. En nuestro caso lo he hardcodeado a StackOverflow ya que en la tarea figura sólo este.
- A parte de los filtros `Tagged`, `Todate` y `Fromdate` añadí campos `Page` (para poder recorrer los registros mas allá de la primera página) y `Token` (para poder limitar los accesos tanto a "mi" api como frecuencia de peticiones a stackexchange mediante `RateLimitInterface`).
- Las peticiones a la API de StackExchange se intenta cachear para limitar peticiones.
- Los datos de StackExchange, siempre y cuando el JSON que ha venido es válido, se consideran correctos y se muestran.     

### Instalación con docker  

> composer update

> docker-compose up -d

lo cual debería de publicar el endpoint http://localhost:8000/questions
pasando los siguientes parametros GET
- `token` (requerido): tokens válidos son `100-token` y `101-token` (tokens de usuarios por defecto de Yii2).
- `tagged` (requerido): tag o tags (separados por `;`) por los que se quieren filtrar las preguntas
- `fromdate` (opcional): unix timestamp de fecha a partir de cuando se quiere ver las preguntas  
- `todate` (opcional): unix timestamp de fecha hasta cuando se quiere ver las preguntas.
- `page` (opcional): página actual.

Ejemplo de URL de consulta: http://localhost:8000/?token=101-token&tagged=php 