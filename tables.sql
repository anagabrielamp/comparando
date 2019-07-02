CREATE TABLE IF NOT EXISTS Usuarios(

   UsuarioId INT AUTO_INCREMENT,

   Username VARCHAR(20) NOT NULL UNIQUE,

   Password VARCHAR(255) NOT NULL,

   PRIMARY KEY(UsuarioId)

);CREATE TABLE IF NOT EXISTS Categorias(

   CategoriaId INT NOT NULL AUTO_INCREMENT,

   Nombre VARCHAR(40) NOT NULL UNIQUE,

   PRIMARY KEY(CategoriaId)

);CREATE TABLE IF NOT EXISTS Productos(

   ProductoId INT AUTO_INCREMENT,

   Titulo VARCHAR(255) NOT NULL,

   Descripcion VARCHAR(255) NOT NULL,

   Fecha DATETIME NOT NULL,

   UsuarioId INT NOT NULL,

   CategoriaId INT NOT NULL,

   PRIMARY KEY(ProductoId),

   FOREIGN KEY(UsuarioId) REFERENCES Usuarios(UsuarioId),

   FOREIGN KEY(CategoriaId) REFERENCES Categorias(CategoriaId)

);CREATE TABLE IF NOT EXISTS Supermercados(

   SupermercadoId INT AUTO_INCREMENT,

   Nombre VARCHAR(255) NOT NULL,

   Direccion VARCHAR(255) NOT NULL,

   PRIMARY KEY(SupermercadoId)

);CREATE TABLE IF NOT EXISTS Precios(

   PrecioId INT AUTO_INCREMENT,

   Precio DECIMAL,

   Fecha DATETIME NOT NULL,

   ProductoId INT NOT NULL,

   SupermercadoId INT NOT NULL,

   UsuarioId INT NOT NULL,

   PRIMARY KEY(PrecioId),

   FOREIGN KEY(ProductoId) REFERENCES Productos(ProductoId),

   FOREIGN KEY(UsuarioId) REFERENCES Usuarios(UsuarioId),

   FOREIGN KEY(SupermercadoId) REFERENCES Supermercados(SupermercadoId)

);
