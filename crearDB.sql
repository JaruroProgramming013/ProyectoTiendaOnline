create table if not exists PJJ_Usuario
                        (
                        ID          smallint auto_increment,
                        Nombre      varchar(20)  not null,
                        Contrasenha varchar(255) not null,
                        constraint ID_UNIQUE
                        unique (ID),
                        constraint Nombre_UNIQUE
                        unique (Nombre)
                        );


create table if not exists PJJ_Producto
(
    ID              mediumint auto_increment primary key,
    Nombre          varchar(20)   not null,
    Descripcion     varchar(100)  null,
    Precio          decimal(5, 2) not null,
    TipoPeriferico  varchar(20)   not null,
    Marca           varchar(30)   not null,
    CantidadStock   smallint      not null,
    Imagen varchar(100)  null,
    constraint ID_UNIQUE
        unique (ID),
    constraint Nombre_UNIQUE
	unique (Nombre)
);

create table if not exists PJJ_Valoracion
(
    Numero     smallint auto_increment
        primary key,
    IDUsuario  smallint     not null,
    IDProducto mediumint    not null,
    Puntuacion tinyint      not null,
    Texto      varchar(100) null,
    constraint PJJ_Valoracion_ibfk_1
        foreign key (IDUsuario) references PJJ_Usuario (ID)
            on update cascade,
    constraint PJJ_Valoracion_ibfk_2
        foreign key (IDProducto) references PJJ_Producto (ID)
            on update cascade,
    constraint Puntuacion
        check (`Puntuacion` between 0 and 5)
);

create index if not exists IDProducto
    on PJJ_Valoracion (IDProducto);

create index if not exists IDUsuario
    on PJJ_Valoracion (IDUsuario);





