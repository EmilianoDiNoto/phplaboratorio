DROP DATABASE IF EXISTS youtube_permisos;
CREATE DATABASE youtube_permisos CHARACTER SET utf8mb4 
DEFAULT COLLATE utf8mb4_general_ci;
USE youtube_permisos;

CREATE TABLE usuarios(
  ID SERIAL PRIMARY KEY,
  EMAIL VARCHAR(100) NOT NULL UNIQUE,
  CLAVE VARCHAR(40) NOT NULL,
  NIVEL ENUM('user','admin')
)ENGINE=innoDB;

INSERT INTO usuarios
  (EMAIL, CLAVE, NIVEL)
VALUES 
  ('user@email.com', SHA1('1234'), 'user' ),
  ('guest@email.com', SHA1('1234'), 'user' ),
  ('admin@email.com', SHA1('4321'), 'admin' );

  CREATE TABLE videos_youtube (
    id INT AUTO_INCREMENT PRIMARY KEY,    -- Identificador único para cada video
    url_video VARCHAR(255) NOT NULL,       -- Campo para almacenar el enlace del video
    estado TINYINT(1) NOT NULL DEFAULT 1,  -- 1 = habilitado, 0 = deshabilitado
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Fecha de creación del registro
);


INSERT INTO videos_youtube (url_video, estado)
VALUES ('https://www.youtube.com/watch?v=dQw4w9WgXcQ', 1);