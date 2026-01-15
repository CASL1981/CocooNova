## Reglas Generales para Prompts de Laravel 12

1. Utiliza la estructura de carpetas y clases de Laravel 12: Controllers, Models, Requests, Migrations, Factories, Seeders y Routes.
2. Aplica estándares PSR-12 y buenas prácticas de Laravel (nomenclatura, inyección de dependencias, uso de Eloquent, etc.).
3. Genera código limpio, sin redundancias y con comentarios solo donde aporten claridad.
4. Prioriza el uso de recursos y providers propios de Laravel antes de soluciones externas.
5. Implementa validaciones con FormRequest, manejo de errores con try/catch y utiliza métodos de respuesta HTTP apropiados.
6. Para tests, usa siempre PHPUnit y Laravel TestCase. Plantea ejemplos de pruebas unitarias funcionales.
7. Solicita la documentación en español sólo si el código implementa lógica compleja.
8. Para nuevas funciones, asume siempre compatibilidad con versiones recientes de PHP utilizadas en Laravel 12.
9. Nunca generes credenciales originales, claves secretas ni datos sensibles en la propuesta.
10. De ser posible, aplica estrategias de optimización y seguridad como caching, rate limiting, validación SQL y CSRF.
11. Los nombre de los modelos se deben generar en Singular y PascalCase, las relaciones del modelo hasMany → plural y las belongsTo → singular
12. Los nombres de los controladores se deben generar en Singular, PascalCase y el sufijo "Controller" y los Métodos → camelCase
13. Los nombres de las migraciones y los nombres de los atributos se deben generar en Plural, snake_case
14. Los nombres de las rutas se deben generar en Plural, kebab-case
15. En las migraciones las clves externas deben tener restricciones onDelete ('cascade'), onDelete ('restrict'), onDelete ('set null'), nullable () o onDelete ('no action')