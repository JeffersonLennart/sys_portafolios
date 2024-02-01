<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## Proyecto

Descripcion del proyecto

## Integrantes

Sistema desarrollado por:
- Campos Segovia Jefferson Lennart		
- Ccasani Huaman Wilman                      
- Ccala Huamani Cristhian				
- Cespedes Vilca Angel Luis                    
- Espirilla Machaca Joseph Ode          
- Huaman Quispe Andy Marcelo			
- Levita Quispe Luis Alvino		
- Quispe Clemente Saman			
- Quispe Quispe Jhon Alberth                            
- Valencia Ñaupa Marko Leonel 

## Diagramas

Requerimientos funcionales del sistema

Autenticación: Sistema de autenticación para docentes, revisores y administradores.
Gestión de Docentes: Registro, actualización y eliminación de información personal y académica de los docentes.
Gestión de Portafolios: Creación, actualización y eliminación de portafolios
Gestión de Carga Académica: Registro, actualización y eliminación de la carga académica de cada docente para cada semestre, visualización clara de la carga académica actual para cada docente y para el departamento en general.
Revisión de Portafolios: Interfaz para los revisores para evaluar los portafolios asignados, registro de observaciones y faltas encontradas durante la revisión, notificación a los docentes sobre los resultados de la revisión.

Arquitectura funcional del sistema 

Módulo de Autenticación y Autorización: Gestiona el registro de autenticación y autorización de usuario, define roles y permisos correspondientes.
Módulo Registro de Docentes: Accesible para Administrador(presidente) interactúa con la base de datos para almacenar la información del docente.
Módulo de Actualización de Docentes: Permite la modificación de la información de los docentes, requiere autenticación y permisos de actualización.
Módulo de Eliminación de Docente: Permite la eliminación de registros de docentes, requiere autenticación y permisos de eliminación.
Módulo Creación de Portafolios: Accesible para docentes, permite la creación de nuevos portafolios asociados a asignaturas.
Módulo Actualización de Portafolios: Permite a los docentes actualizar la información en los portafolios existentes.
Módulo Eliminación de Portafolios: Permite a los docentes eliminar portafolios no deseados.
Módulo Registro Carga Académica:Accesible para el Administrador(presidente), registrar la carga académica de los docentes para el semestre.
Modulo Actualizacion Carga Académica: Permite la modificación de la carga académica asignada a los docentes.
Módulo Eliminación Carga Académica: Permite la eliminación de registros de carga académica.
Módulo Visualización de Carga Académica: Permite a los docentes y al administrador visualizar la carga académica asignada.
Modulo de Evaluacion de Carga Académica: Accesible para los revisores asignados, permite a los revisores evaluar su cumplimiento con los portafolios.
Módulo de Registro de Observaciones: Permite a los revisores registrar observaciones sobre los portafolios.
Módulo para la Generación de Informes: Accesible para el Administrador(Presidente), genera informes basados en los resultados de las revisiones.

Arquitectura Tecnica del sistema

Capa de presentación:
- Presentación de portafolios y resultados de revisiones.
- Formularios de carga y actualización de portafolios.
- Comunicación con el back-end a través de servicios web RESTful.
Capa de Lógica:
- Gestión de usuarios, docentes y revisiones.
- Lógica de negocios relacionada con la carga de portafolios y evaluación.
Capa de Datos:
- Modelo de base de datos relacional para almacenar información de docentes, portafolios y revisiones

Base de Datos

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username NVARCHAR(25) NOT NULL,
    password NVARCHAR(30) NOT NULL,
    role NVARCHAR(50) NOT NULL,
    email NVARCHAR(30),
    activo BIT DEFAULT 1,
    nombre_completo NVARCHAR(100),
    telefono NVARCHAR(20),
    codigo NVARCHAR(10),
    categoria NVARCHAR(30),
    grado_academico NVARCHAR(30)
);

-- Tabla de Revisores (que son también Docentes y Users)
CREATE TABLE revisores (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT UNIQUE,
    es_presidente BIT DEFAULT 0,
    FOREIGN KEY (id) REFERENCES users(id)
);

-- Tabla de Docentes
CREATE TABLE docentes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT UNIQUE,	    
    FOREIGN KEY (user_id) REFERENCES users(id)    
);

-- Tabla de Semestres
CREATE TABLE semestres (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre NVARCHAR(20) NOT NULL,
    fecha_inicio DATE,
    fecha_fin DATE,
    estado NVARCHAR(20)
);

-- Tabla Asignación revisores
CREATE TABLE asignacion_revisores (
    id INT PRIMARY KEY AUTO_INCREMENT,
    docente_id INT UNIQUE,	
    revisor_id INT,
    semestre_id INT,
    FOREIGN KEY (docente_id) REFERENCES docentes(id),
    FOREIGN KEY (revisor_id) REFERENCES revisores(id),
    FOREIGN KEY (semestre_id) REFERENCES semestres(id)
);

-- Tabla de Asignaturas
CREATE TABLE asignaturas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre NVARCHAR(50) NOT NULL,
    tipo NVARCHAR(20) CHECK (tipo IN ('teorica', 'teorica_practica', 'practica')) NOT NULL,
    codigo NVARCHAR(20),
    escuela NVARCHAR(50),
    categoria NVARCHAR(30),
    creditos INT
);

-- Tabla de Carga Académica
CREATE TABLE carga_academica (
    id INT PRIMARY KEY AUTO_INCREMENT,
    docente_id INT,
    asignatura_id INT,
    semestre_id INT,
    FOREIGN KEY (docente_id) REFERENCES docentes(id),
    FOREIGN KEY (asignatura_id) REFERENCES asignaturas(id),
    FOREIGN KEY (semestre_id) REFERENCES semestres(id)
);

-- Tabla de Portafolios
CREATE TABLE portafolios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    carga_academica_id INT,
    tipo_portafolio NVARCHAR(20) CHECK (tipo_portafolio IN ('teorico', 'practico')) NOT NULL,
    FOREIGN KEY (carga_academica_id) REFERENCES carga_academica(id)
);

-- Tabla de Portafolios Teóricos
CREATE TABLE portafolios_teoricos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    portafolio_id INT,
    punto_1 VARCHAR(1),
    punto_2 VARCHAR(1),
    punto_3 VARCHAR(1),
    punto_4 VARCHAR(1),
    punto_5 VARCHAR(1),
    punto_6 VARCHAR(1),
    FOREIGN KEY (portafolio_id) REFERENCES portafolios(id)
);

-- Tabla de Portafolios Prácticos
CREATE TABLE portafolios_practicos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    portafolio_id INT,
    punto_1 VARCHAR(1),
    punto_2 VARCHAR(1),
    punto_3 VARCHAR(1),
    punto_4 VARCHAR(1),
    punto_5 VARCHAR(1),
    FOREIGN KEY (portafolio_id) REFERENCES portafolios(id)
);

-- Tabla de Revisiones
CREATE TABLE revisiones (
    id INT PRIMARY KEY AUTO_INCREMENT,
    portafolio_id INT,
    revisor_id INT,
    numero_revision INT,
    fecha_revision DATE,
    observaciones TEXT,        
    FOREIGN KEY (portafolio_id) REFERENCES portafolios(id),
    FOREIGN KEY (revisor_id) REFERENCES revisores(id)
);

-- Tabla de Informes
CREATE TABLE informes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    revision_id INT,
    presidente_id INT,
    fecha_informe DATE,
    cumplimiento BIT,
    FOREIGN KEY (revision_id) REFERENCES revisiones(id),
    FOREIGN KEY (presidente_id) REFERENCES revisores(id)
);

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
