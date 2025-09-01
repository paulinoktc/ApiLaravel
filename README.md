<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

# API Gestión de Clientes y Contratos

Esta API se encarga de gestionar registros de **clientes (CRUD)** y asignarles **contratos**.
Un cliente puede tener más de un contrato. La autenticación se realiza mediante **Laravel Sanctum**.

---

## Requisitos

* Laravel 12 o superior
* Laravel Sanctum
* PHP 8.4.11

---

## API Endpoints

### Clientes

| Método | Ruta                  | Descripción            |
| ------ | --------------------- | ---------------------- |
| GET    | /api/v1/clientes      | Listar clientes        |
| GET    | /api/v1/clientes/{id} | Obtener cliente por ID |
| POST   | /api/v1/clientes      | Crear cliente          |
| PUT    | /api/v1/clientes/{id} | Actualizar cliente     |
| DELETE | /api/v1/clientes/{id} | Eliminar cliente       |

#### Ejemplos de respuestas

**Listar clientes (200 OK):**

```json
[
  {
    "id": 1,
    "name": "Juan Pérez",
    "email": "juan@example.com",
    "phone": "1234567890"
  }
]
```

**Obtener cliente por ID (200 OK):**

```json
{
  "id": 1,
  "name": "Juan Pérez",
  "email": "juan@example.com",
  "phone": "1234567890"
}
```

**Crear cliente (POST)**

```json
{
  "name": "Carlos Gómez",
  "email": "carlos@example.com",
  "phone": "9876543210"
}
```

**Respuesta 201:**

```json
{
  "message": "Cliente creado exitosamente",
  "data": { ... }
}
```

**Actualizar cliente (PUT)**

```json
{
  "name": "Carlos Gómez Editado"
}
```

**Respuesta 200:**

```json
{
  "message": "Cliente actualizado correctamente",
  "data": { ... }
}
```

**Eliminar cliente (DELETE)**

```json
{
  "message": "Cliente eliminado"
}
```

---

### Contratos

| Método | Ruta                            | Descripción                    |
| ------ | ------------------------------- | ------------------------------ |
| GET    | /api/v1/clientes/{id}/contratos | Listar contratos de un cliente |
| POST   | /api/v1/contratos               | Crear contrato                 |

**Crear contrato (POST)**

```json
{
  "cliente_id": 1,
  "monto": 5000,
  "fecha_inicio": "2025-09-01"
}
```

---

## Notas

* Todas las rutas están protegidas con **Bearer Token**.
* Las respuestas de error siguen este formato:

```json
{
  "message": "El correo ya se encuentra registrado",
  "errors": {
    "email": ["El correo ya se encuentra registrado"]
  }
}
```
