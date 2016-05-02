<?php
$servername = "localhost";
$username = "virtualt_g3";
$password = "Ghjkl76543";
$dbname = "virtualt_grupo3";

//create conection
$conn = new mysqli($servername, $username, $password, $dbname);
// check conection
if($conn->connect_error){
	die("connection failed: ".$conn->connect_error);
}
//TABLA ADMINISTRADOR

$sql = "CREATE TABLE IF NOT EXISTS Administradores(
ID_ADMINISTRADOR 		int(10)  		unsigned 		NOT NULL AUTO_INCREMENT PRIMARY KEY,
nombre_administrador 	varchar(255)					NOT NULL,
contrasenia_adm			varchar(255)					NOT NULL
)ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci";

//TABLA DOCENTES


$sql = "CREATE TABLE IF NOT EXISTS Docentes (
id_usuario 					int(10) 		unsigned NOT NULL 	AUTO_INCREMENT PRIMARY KEY,
nombre_usuario 				varchar(255)  			 NOT NULL,
contrasenia_usuario			varchar(255)			 NOT NULL,	
apellido_usuario 			varchar(255) 			 NOT NULL,
correo_usuario 				varchar(255)  			 NOT NULL,
fecha_nacimiento_usuario 	date 					 NOT NULL,
telefono_usuario 			varchar(100) 			 NOT NULL,
estado_usuario 				char(1) 			     NOT NULL,
titulo_profesional 			varchar(255) 			 NOT NULL,
url_hoja_de_vida 			varchar(255),
id_usuario_consulta			int(10)			unsigned,
id_area_consulta			int(10)			unsigned,
FOREIGN KEY (`id_usuario_consulta`) REFERENCES `Docentes` (`id_usuario`),
FOREIGN KEY (`id_area_consulta`) REFERENCES `Areas` (`id_area`)
)ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE =utf8_unicode_ci";

// TABLA AREAS

$sql = "CREATE TABLE IF NOT EXISTS Areas (
id_area 				int(10) 		unsigned 		NOT NULL AUTO_INCREMENT PRIMARY KEY,
nombre_area 			varchar(255) 					NOT NULL,
id_area_pertenece 		int(10) 		unsigned,
id_usuario_consulta		int(10)			unsigned,
FOREIGN KEY (`id_area_pertenece`) REFERENCES `Areas` (`id_area`),
FOREIGN KEY (`id_usuario_consulta`) REFERENCES `Docentes` (`id_usuario`)
)ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE =utf8_unicode_ci";



//TABLA EVENTOS





//TABLA INSTITUCION

$sql = "CREATE TABLE IF NOT EXISTS Instituciones(
   ID_INSTITUCION       int(10)                         not null AUTO_INCREMENT PRIMARY KEY,
   NOMBRE_INSTITUCION   varchar(255)                    not null,
   TELEFONO_INSTITUCION varchar(255)                    not null,
   CORREO_INSTITUCION   varchar(255)                    not null,
   ESTADO_INSTITUCION   boolean                     	not null
)ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci";


//TABLA LUGARES

$sql = "CREATE TABLE IF NOT EXISTS Lugares(
   ID_LUGAR             int(10)                       not null AUTO_INCREMENT PRIMARY KEY,
   LUG_ID_LUGAR         int(10)                       ,
   NOMBRE_LUGAR         varchar(255)                  not null,
   TIPO_LUGAR           varchar(50)                     not null,
   id_lugar_pertence	int(10)				unsigned,
   FOREIGN KEY ('id_lugar_pertence') REFERENCES 'Lugares'('ID_LUGAR')
)ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci";


//TABLA OFERTA DE EMPLEO

$sql = "CREATE TABLE IF NOT EXISTS Oferta_empleo(
   ID_PUBLICACION      int(10)                        not null AUTO_INCREMENT PRIMARY KEY,
   ID_LUGAR             int(10)                       not null,
   TITULO_PUBLICACION   varchar(300)                  not null,
   CONTACTO_PUBLICACION varchar(300)                  not null,
   CONTENIDO_PUBLICACION varchar(300)                 ,
   FECHA_INICIO         date                          ,
   FECHA_CIERRE         date                          ,
   URL                  varchar(200)                  ,
   ID_AREA              int(10)                       not null,
   ID_USUARIO           int(10)                       not null,
   id_lugar_oferta		int(10)			unsigned,
   id_area_pertenece	int(10)			unsigned,
   id_usuario_publica	int(10)			unsigned,
   FOREIGN KEY ('id_lugar_oferta') REFERENCES 'Lugares'('ID_LUGAR'),
   FOREIGN KEY ('id_area_pertenece') REFERENCES 'Areas'('id_area'),
   FOREIGN KEY ('id_usuario_publica') REFERENCES 'Publicadores_universidad'('id_usuario')
)ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci";


//TABLA PUBLICADORES UNIVERSIDAD

$sql = "CREATE TABLE IF NOT EXISTS Publicadores_universidad(
   ID_USUARIO           int(10)                        not null AUTO_INCREMENT PRIMARY KEY,
   ID_INSTITUCION       int(10)                        not null,
   NOMBRE_USUARIO       varchar(255)                   not null,
   APELLIDO_USUARIO     varchar(255)                   not null,
   contrasenia_usuario	varchar(255)				   not null,	
   CORREO_USUARIO       varchar(255)                   not null,
   FECHA_NACIMIENTO_USUARIO date                       not null,
   TELEFONO_USUARIO     varchar(255)                   not null,
   ESTADO_USUARIO       boolean                     not null,
   CARGO_LABORAL        varchar(300)                   not null,
   id_institucion_pertenece	int(10)		unsigned,
   FOREIGN KEY ('id_institucion_pertenece') REFERENCES 'Instituciones'('ID_INSTITUCION')
)ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci";

//TABLE EVENTOS

$sql = "CREATE TABLE IF NOT EXISTS Eventos(
   ID_PUBLICACION      int(10)          unsigned       not null AUTO_INCREMENT PRIMARY KEY,
   ID_LUGAR             char(10)                       not null,
   TITULO_PUBLICACION   varchar(300)                   not null,
   CONTACTO_PUBLICACION varchar(300)                   not null,
   CONTENIDO_PUBLICACION varchar(300)                  ,
   FECHA_INICIO         date                           ,
   FECHA_CIERRE         date                           ,
   URL                  varchar(200)                   ,
   HORA_INICIO_EVENTO   time                           not null,
   HORA_FIN_EVENTO      time,
   id_usuario_publica	int(10)			unsigned	   not null,
   id_area_pertenece	int(10)			unsigned	   not null,
   id_lugar_realizado	int(10)			unsigned	   not null,
   FOREIGN KEY ('id_usuario_publica') REFERENCES 'Publicadores_universidad'('ID_USUARIO'),
   FOREIGN KEY ('id_area_pertenece') REFERENCES 'Areas'('id_area'),
   FOREIGN KEY ('id_lugar_realizado') REFERENCES 'Lugares'('ID_LUGAR')                        
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci";


//TABLA REVISTAS

$sql = "CREATE TABLE IF NOT EXISTS Revistas(
   ID_PUBLICACION      int(10)                         not null AUTO_INCREMENT PRIMARY KEY,
   TITULO_PUBLICACION   varchar(300)                   not null,
   CONTACTO_PUBLICACION varchar(300)                   not null,
   CATEGORIA_REVISTA    int(1)                         not null,
   CONTENIDO_PUBLICACION varchar(300)                  ,
   FECHA_INICIO         date                           ,
   FECHA_CIERRE         date                           ,
   URL                  varchar(200)                  /* ,
   id_area_pertenece	int(10)			unsigned,
   id_usuario_publica	int(10)			unsigned,
   FOREIGN KEY ('id_area_pertenece') REFERENCES 'Areas' ('id_area'),
   FOREIGN KEY ('id_usuario_publica') REFERENCES 'Publicadores_universidad' ('ID_USUARIO')
   */
)ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci";



/*
$sql = "CREATE DOMAIN ESTADO_A_I as char(10)
check (@column is null or (@column in ('A', 'I')))";

$sql = "CREATE DOMAIN LUGAR_C_P as char(10)
check (@column is null or (@column in ('C', 'P')))";
*/
/*
//TABLA AREA_DOCENTE

$sql = "CREATE TABLE IF NOT EXISTS Areas_Docentes (
id_usuario_consulta 				int(10) 		unsigned 		NOT NULL AUTO_INCREMENT PRIMARY KEY,
id_area		int(10) 		unsigned,
FOREIGN KEY (`id_usuario_consulta`) REFERENCES `Areas_Docentes` (`id_usuario`),
FOREIGN KEY (`id_area`) REFERENCES `Areas_Docentes` (`id_area`)
)ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE =utf8_unicode_ci";
*/


if ($conn -> query($sql) === TRUE) {
	//echo "table x remove";
	echo "Tablas creadas y conexion establecida";
	//echo "Datos insertados";
}else{
		echo "Error al crear tabla: ". $conn->error;
}

$conn->close();
?>