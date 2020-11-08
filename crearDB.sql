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


