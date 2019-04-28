create table Kategoria
(
    id             int auto_increment
        primary key,
    kategoria_neve varchar(250) null,
    constraint Kategoria_kategoria_neve_uindex
        unique (kategoria_neve)
);

create table Kolcsonzo
(
    id             int auto_increment
        primary key,
    kolcsonzo_neve varchar(250) null
);

create table Konyv
(
    id         int auto_increment
        primary key,
    cim        varchar(251)  null,
    isbn       varchar(13)   null,
    borito_url varchar(1000) null,
    tartalom   varchar(1000) null,
    constraint Konyv_isbn_uindex
        unique (isbn)
);

create table Kategoria_Konyv
(
    id           int auto_increment
        primary key,
    konyv_id     int null,
    kategoria_id int null,
    constraint Kategoria_Konyv_Kategoria_id_fk
        foreign key (kategoria_id) references Kategoria (id)
            on update cascade on delete cascade,
    constraint Kategoria_Konyv_Konyv_id_fk
        foreign key (konyv_id) references Konyv (id)
            on update cascade on delete cascade
);

create table Kolcsonzes
(
    id           int auto_increment
        primary key,
    konyv_id     int  null,
    kolcsonzo_id int  null,
    tol          date null,
    ig           date null,
    constraint Kolcsonzes_Kolcsonzo_id_fk
        foreign key (kolcsonzo_id) references Kolcsonzo (id)
            on delete cascade,
    constraint Kolcsonzes_Konyv_id_fk
        foreign key (konyv_id) references Konyv (id)
            on delete cascade
);

create table Szerzo
(
    id          int auto_increment
        primary key,
    szerzo_neve varchar(250) null,
    constraint Szerzo_szerzo_neve_uindex
        unique (szerzo_neve)
);

create table Szerzo_Konyv
(
    id        int auto_increment
        primary key,
    konyv_id  int null,
    szerzo_id int null,
    constraint Szerzo_Konyv_Konyv_id_fk
        foreign key (konyv_id) references Konyv (id)
            on update cascade on delete cascade,
    constraint Szerzo_Konyv_Szerzo_id_fk
        foreign key (szerzo_id) references Szerzo (id)
            on update cascade on delete cascade
);

create table felhasznalo
(
    id               int auto_increment
        primary key,
    felhasznalo_neve varchar(250) null,
    jelszo           varchar(50)  null,
    admin            tinyint(1)   null,
    kolcsonzo_id     int          null,
    constraint felhasznalo_fehasznalo_neve_uindex
        unique (felhasznalo_neve),
    constraint felhasznalo_Kolcsonzo_id_fk
        foreign key (kolcsonzo_id) references Kolcsonzo (id)
            on delete cascade
);


