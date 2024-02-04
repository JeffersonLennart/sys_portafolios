
# Proyecto Semestral del Curso de Ingeniería de Software I 


## Descripción del Proyecto

El Proceso de revisión de portafolios docentes en el Departamento Academico de Ingenieria Informatica (DAII) de la Universidad Nacional de San Antonio Abad del Cusco (UNSAAC) desempeña un papel crucial en el marco de la acreditación establecido por la comisión de Acreditación ICACIT. En cumplimiento del criterio 6 referente al (CUERPO DE PROFESORES) se requiere la evaluación detallada de los portafolios presentados por los docentes cada semestre. Estos portafolios estructurados en dos formatos específicos para asignaturas teóricas y prácticas, contiene la experiencia académica y la contribución del docente.
El Presente trabajo propone el desarrollo de un Sistema de Información web que optimice y sistematice este proceso, el sistema se presenta como un aliado estratégico para el departamento simplificando la presentación de portafolios, coordinando las revisiones y generando informes detallados sobre el desempeño de los docentes, mediante este sistema no solo se busca agilizar los procedimientos administrativos sino también mejorar la calidad en las revisiones de portafolios.
El Sistema abordará aspectos esenciales del proceso como la gestión de usuario, la programación de revisiones semestrales, la evaluación de portafolios y la generación de informes finales, diseñando una estructura modular y eficiente, empleando tecnologías modernas y framework web que permita una implementación sólida y escalable, con el fin de brindar una solución que contribuya al departamento académico DAII de la UNSAAC.


## Integrantes

Sistema desarrollado por:
- Campos Segovia Jefferson Lennart (Responsable del Grupo)
- Ccasani Huaman Wilman                      
- Ccala Huamani Cristhian				
- Cespedes Vilca Angel Luis                    
- Espirilla Machaca Joseph Ode          
- Huaman Quispe Andy Marcelo			
- Levita Quispe Luis Alvino		
- Quispe Clemente Saman			
- Quispe Quispe Jhon Alberth                            
- Valencia Ñaupa Marko Leonel 

## Requerimientos funcionales del sistema

- **Autenticación:** Sistema de autenticación para docentes, revisores y administradores.
- **Gestión de Docentes:** Registro, actualización y eliminación de información personal y académica de los docentes.
- **Gestión de Portafolios:** Creación, actualización y eliminación de portafolios
- **Gestión de Carga Académica:** Registro, actualización y eliminación de la carga académica de cada docente para cada semestre, visualización clara de la carga académica actual para cada docente y para el departamento en general.
- **Revisión de Portafolios:** Interfaz para los revisores para evaluar los portafolios asignados, registro de observaciones y faltas encontradas durante la revisión, notificación a los docentes sobre los resultados de la revisión.
- **Generación de Informes:** Creación de informes automáticos al finalizar cada revisión.
- **Notificaciones:** Sistema de notificaciones para alertar sobre fechas importantes y resultados de revisiones.

## Arquitectura funcional del sistema 

- **Módulo de Autenticación y Autorización:** Gestiona el registro de autenticación y autorización de usuario, define roles y permisos correspondientes.
- **Módulo Registro de Docentes:** Accesible para Administrador(presidente) interactúa con la base de datos para almacenar la información del docente.
- **Módulo de Actualización de Docentes:** Permite la modificación de la información de los docentes, requiere autenticación y permisos de actualización.
- **Módulo de Eliminación de Docente:** Permite la eliminación de registros de docentes, requiere autenticación y permisos de eliminación.
- **Módulo Creación de Portafolios:** Accesible para docentes, permite la creación de nuevos portafolios asociados a asignaturas.
- **Módulo Actualización de Portafolios:** Permite a los docentes actualizar la información en los portafolios existentes.
- **Módulo Eliminación de Portafolios:** Permite a los docentes eliminar portafolios no deseados.
- **Módulo Registro Carga Académica:** Accesible para el Administrador(presidente), registrar la carga académica de los docentes para el semestre.
- **Modulo Actualizacion Carga Académica:** Permite la modificación de la carga académica asignada a los docentes.
- **Módulo Eliminación Carga Académica:** Permite la eliminación de registros de carga académica.
- **Módulo Visualización de Carga Académica:** Permite a los docentes y al administrador visualizar la carga académica asignada.
- **Modulo de Evaluacion de Carga Académica:** Accesible para los revisores asignados, permite a los revisores evaluar su cumplimiento con los portafolios.
- **Módulo de Registro de Observaciones:** Permite a los revisores registrar observaciones sobre los portafolios.
- **Módulo para la Generación de Informes:** Accesible para el Administrador(Presidente), genera informes basados en los resultados de las revisiones.

## Arquitectura Tecnica del sistema

### Capa de presentación:
- Presentación de portafolios y resultados de revisiones.
- Formularios de carga y actualización de portafolios.
- Comunicación con el back-end a través de servicios web RESTful.
### Capa de Lógica:
- Gestión de usuarios, docentes y revisiones.
- Lógica de negocios relacionada con la carga de portafolios y evaluación.
### Capa de Datos:
- Modelo de base de datos relacional para almacenar información de docentes, portafolios y revisiones

## Diseño de la base de datos

### Diagrama

![Ejemplo de imagen](/public/images/readme/bd.jpg)

### Código en MySQL

```sql
-- Tabla de Usuarios (users)
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
```