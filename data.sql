# Teljes db legeneralashoz innen

create table Kategoria
(
    id             int auto_increment
        primary key,
    kategoria_neve varchar(250) null
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
    borito_url varchar(250)  null,
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
        foreign key (kategoria_id) references Kategoria (id),
    constraint Kategoria_Konyv_Konyv_id_fk
        foreign key (konyv_id) references Konyv (id)
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
        foreign key (kolcsonzo_id) references Kolcsonzo (id),
    constraint Kolcsonzes_Konyv_id_fk
        foreign key (konyv_id) references Konyv (id)
);

create table Szerzo
(
    id          int auto_increment
        primary key,
    szerzo_neve varchar(250) null
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
    id              int auto_increment
        primary key,
    fehasznalo_neve varchar(250) null,
    jelszo          varchar(50)  null,
    constraint felhasznalo_fehasznalo_neve_uindex
        unique (fehasznalo_neve)
);






# Teljes db legeneralashoz idáig

# ==========================================================

# Magamnak emlekeztetok
INSERT INTO konyvtar.Szerzo_Konyv (id, konyv_id, szerzo_id)
VALUES (null,
        (SELECT id FROM konyvtar.Konyv WHERE cim = 'Harry Potter'),
        (SELECT id FROM konyvtar.Szerzo WHERE szerzo_neve = 'J.K.Rowling'));


select *
from Szerzo sz,
     Konyv k
         INNER JOIN Szerzo_Konyv SK on k.id = SK.konyv_id;

select Szerzo_Konyv.id, szerzo_neve,cim
from Szerzo
         INNER JOIN Szerzo_Konyv ON Szerzo.id = Szerzo_Konyv.szerzo_id
         INNER JOIN Konyv ON Szerzo_Konyv.konyv_id = Konyv.id;


# Kategoria a konyvekhez
select Konyv.cim, Kategoria.kategoria_neve
from  Konyv INNER JOIN  Kategoria_Konyv KK on Konyv.id = KK.konyv_id LEFT JOIN Kategoria ON KK.kategoria_id = Kategoria.id;


INSERT INTO Kategoria_Konyv (id, konyv_id, kategoria_id)
VALUES (null,
        (SELECT id FROM Konyv WHERE cim = 'Random Könyv'),
        (SELECT id FROM Kategoria WHERE kategoria_neve  = 'Horror'));


# Na EZ Már Jó

INSERT INTO konyvtar.Szerzo_Konyv (id, konyv_id, szerzo_id)
VALUES (null,
        (SELECT id FROM konyvtar.Konyv WHERE cim = 'Harry Potter'),
        (SELECT id FROM konyvtar.Szerzo WHERE szerzo_neve = 'J.K.Rowling'));



select szerzo_neve,cim,isbn
from Szerzo
         INNER JOIN Szerzo_Konyv SK on Szerzo.id = SK.szerzo_id
         INNER JOIN Konyv K on SK.konyv_id = K.id;

# Kivalasztani a szerzoket akkik a Nem Random koknyvet irtak peldaul

select szerzo_neve
from Szerzo
         INNER JOIN Szerzo_Konyv SK on Szerzo.id = SK.szerzo_id
         INNER JOIN Konyv K on SK.konyv_id = K.id WHERE cim='Nem Random';


# Kolcsonzest lefojtatni

INSERT INTO Kolcsonzes(id, konyv_id, kolcsonzo_id, tol, ig)
VALUES (null, (SELECT id FROM Konyv WHERE cim = 'Random Könyv'),
        (SELECT id FROM Kolcsonzo WHERE kolcsonzo_neve = 'Marton Janos'), '2019.11.11', '2019.11.21');

# Eleg egyszeru metodus sztem
select distinct kolcsonzo_neve,cim,isbn,tol,ig
from Kolcsonzes, Konyv,Kolcsonzo WHERE Kolcsonzes.konyv_id = Konyv.id AND Kolcsonzes.kolcsonzo_id =Kolcsonzo.id ;

