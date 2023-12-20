# ApiGateway-MicroUsersService

Ejecutar: php artisan jwt:secret

asegurarse que exista en el archivo .env:
JWT_SECRET=your_generated_secret_key

copiar el JWT_SECRET y asegurarse en pegar en cada uno de los microservicios
para que funcione la misma autenticacion en todo los servicios
