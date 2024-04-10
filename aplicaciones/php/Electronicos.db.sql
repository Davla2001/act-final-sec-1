BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "proveedor" (
	"id_proveedor"	INTEGER NOT NULL UNIQUE,
	"nom_proveedor"	TEXT,
	"telefono"	TEXT,
	"direccion"	TEXT,
	"email"	TEXT,
	PRIMARY KEY("id_proveedor" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "producto" (
	"id_producto"	INTEGER NOT NULL UNIQUE,
	"nom_producto"	TEXT,
	"marca"	TEXT,
	"categoria"	TEXT,
	"stock"	INTEGER,
	"precio_compra"	REAL,
	"precio_venta"	REAL,
	PRIMARY KEY("id_producto" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "pedido" (
	"id_pedido"	INTEGER NOT NULL UNIQUE,
	"fecha_pedido"	TEXT,
	"id_producto"	INTEGER,
	"id_proveedor"	INTEGER,
	"cantidad_solicitada"	INTEGER,
	"estado"	TEXT,
	"fecha_surtido"	TEXT,
	"costo_pedido"	REAL,
	FOREIGN KEY("id_proveedor") REFERENCES "proveedor"("id_proveedor"),
	FOREIGN KEY("id_producto") REFERENCES "producto"("id_producto"),
	PRIMARY KEY("id_pedido" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "venta" (
	"id_venta"	INTEGER NOT NULL UNIQUE,
	"fecha_venta"	TEXT,
	"id_producto"	INTEGER,
	"cantidad"	INTEGER,
	"precio_unitario"	INTEGER,
	PRIMARY KEY("id_venta" AUTOINCREMENT)
);
INSERT INTO "proveedor" VALUES (1,'Sheyla','9381084806','Calle 20, Col. Santa Rita, cd. del carmen, Campeche, Mexico','shey_studios@mail.com');
INSERT INTO "proveedor" VALUES (2,'Dav Techno','9381833771','Calle Juan Escutia, Col. Manigua, cd. del carmen, Campeche, Mexico','techno_dav@mail.com');
INSERT INTO "proveedor" VALUES (3,'Ninive','9381850839','Calle popocatepetl, Col. Volcanes, cd. del carmen, Campeche, Mexico','nini_sc@mail.com');
INSERT INTO "proveedor" VALUES (4,'TechSupply','9382023456','Av. Tecnológica, Col. Innovación, Tijuana, Baja California, México','techsupply@example.com');
INSERT INTO "proveedor" VALUES (5,'Gadgets&More','9383336789','Calle 30, Col. Techie, Monterrey, Nuevo León, México','gadgetsandmore@mail.com');
INSERT INTO "proveedor" VALUES (6,'MicroByte','9384045678','Av. de las Computadoras, Col. Digital, Mérida, Yucatán, México','microbyte@mail.com');
INSERT INTO "proveedor" VALUES (7,'Innovatech','9385557890','Calle 10, Col. Futurista, Ciudad de México, Ciudad de México, México','innovatech@example.com');
INSERT INTO "proveedor" VALUES (8,'SmartTech','9386067890','Av. de la Tecnología, Col. High-Tech, Puebla, Puebla, México','smarttech@mail.com');
INSERT INTO "proveedor" VALUES (9,'ElectroGizmo','9387078901','Av. de la Electrónica, Col. Geek, Guadalajara, Jalisco, México','electrogizmo@example.com');
INSERT INTO "producto" VALUES (1,'Mouse Ultra-thin','Ticker','Computacion',15,80.46,149.9);
INSERT INTO "producto" VALUES (2,'Earbunds','Xiaomi','Audifonos',15,300.0,399.9);
INSERT INTO "producto" VALUES (3,'audifonos','KZ','Audifonos',15,300.0,399.9);
INSERT INTO "producto" VALUES (4,'Teclado','Logitech','computacion',15,300.0,399.9);
INSERT INTO "producto" VALUES (5,'Onikuma K19','Onikuma','Audifonos',15,300.0,376.09);
INSERT INTO "producto" VALUES (6,'Onikuma K20','Onikuma','Audifonos',15,300.0,398.0);
INSERT INTO "producto" VALUES (7,'Cable Xlr 100M','Steelpro','Cables',15,760.0,949.9);
INSERT INTO "producto" VALUES (8,'HDMI 5MTS','GIO','cables',15,127.2,159.9);
INSERT INTO "producto" VALUES (9,'Joystick Xbox','Xbox','Controles',15,300.0,399.9);
INSERT INTO "producto" VALUES (10,'Free wolf K3','Tecnovacion','computacion',10,458.49,899.9);
INSERT INTO "producto" VALUES (11,'Bocina BOC241','1Hora','Bocinas',16,359.2,429.89);
INSERT INTO "pedido" VALUES (1,'2024-04-01',1,1,10,'En proceso',NULL,850.0);
INSERT INTO "pedido" VALUES (2,'2024-04-02',3,2,5,'Entregado','2024-04-03',1500.0);
INSERT INTO "pedido" VALUES (3,'2024-04-03',6,3,8,'En espera',NULL,2000.0);
INSERT INTO "pedido" VALUES (4,'2024-04-04',8,4,12,'En proceso',NULL,1800.0);
INSERT INTO "pedido" VALUES (5,'2024-04-05',9,5,6,'Entregado','2024-04-06',950.0);
INSERT INTO "pedido" VALUES (6,'2024-04-06',10,6,15,'En espera',NULL,1800.0);
COMMIT;
