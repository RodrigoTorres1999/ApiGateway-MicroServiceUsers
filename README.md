# ApiGateway-MicroUsersService

Ejecutar: php artisan jwt:secret

asegurarse que exista en el archivo .env:
JWT_SECRET=your_generated_secret_key

copiar el JWT_SECRET y asegurarse en pegar en cada uno de los microservicios
para que funcione la misma autenticacion en todo los servicios


# Modificar Direcciones de Microservicios
- Para cada Microservicio se ejecuta en un controlador
- Cada controlador de microservicios cuenta con BASE_LOCATION_URL el cual almacena 
el dominio o direccion IP donde se encuentra el microservicio
asegurarse de modificarlo segun necesidad para su funcionalidad
