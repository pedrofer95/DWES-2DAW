alter table compra modify fecha_compra datetime;

alter table producto modify nombre varchar(200);
alter table producto modify id_producto varchar(15);
alter table producto modify id_categoria varchar(25);

alter table almacena modify id_producto varchar(15);

alter table categoria modify id_categoria varchar(25);
alter table categoria modify nombre varchar(100);


drop table usuarios;
CREATE TABLE usuarios (
  dni varchar(9),
  usuario varchar(30) NOT NULL,
  contraseña varchar(30) NOT NULL,
  PRIMARY KEY (dni),
  FOREIGN KEY (dni) REFERENCES cliente (nif) ON DELETE CASCADE);