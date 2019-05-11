create table konyvtarHU.Kategoria
(
    id int auto_increment
        primary key,
    kategoria_neve varchar(250) null,
    constraint Kategoria_kategoria_neve_uindex
        unique (kategoria_neve)
);

create table konyvtarHU.Kolcsonzo
(
    id int auto_increment
        primary key,
    kolcsonzo_neve varchar(250) null
);

create table konyvtarHU.Konyv
(
    id int auto_increment
        primary key,
    cim varchar(251) null,
    isbn varchar(13) null,
    borito_url varchar(1000) null,
    tartalom varchar(1000) null,
    constraint Konyv_isbn_uindex
        unique (isbn)
);

create table konyvtarHU.Kategoria_Konyv
(
    id int auto_increment
        primary key,
    konyv_id int null,
    kategoria_id int null,
    constraint Kategoria_Konyv_Kategoria_id_fk
        foreign key (kategoria_id) references konyvtarHU.Kategoria (id)
            on update cascade on delete cascade,
    constraint Kategoria_Konyv_Konyv_id_fk
        foreign key (konyv_id) references konyvtarHU.Konyv (id)
            on update cascade on delete cascade
);

create table konyvtarHU.Kolcsonzes
(
    id int auto_increment
        primary key,
    konyv_id int null,
    kolcsonzo_id int null,
    tol date null,
    ig date null,
    constraint Kolcsonzes_Kolcsonzo_id_fk
        foreign key (kolcsonzo_id) references konyvtarHU.Kolcsonzo (id)
            on delete cascade,
    constraint Kolcsonzes_Konyv_id_fk
        foreign key (konyv_id) references konyvtarHU.Konyv (id)
            on delete cascade
);

create table konyvtarHU.Szerzo
(
    id int auto_increment
        primary key,
    szerzo_neve varchar(250) null,
    constraint Szerzo_szerzo_neve_uindex
        unique (szerzo_neve)
);

create table konyvtarHU.Szerzo_Konyv
(
    id int auto_increment
        primary key,
    konyv_id int null,
    szerzo_id int null,
    constraint Szerzo_Konyv_Konyv_id_fk
        foreign key (konyv_id) references konyvtarHU.Konyv (id)
            on update cascade on delete cascade,
    constraint Szerzo_Konyv_Szerzo_id_fk
        foreign key (szerzo_id) references konyvtarHU.Szerzo (id)
            on update cascade on delete cascade
);

create table konyvtarHU.felhasznalo
(
    id int auto_increment
        primary key,
    felhasznalo_neve varchar(250) null,
    jelszo varchar(50) null,
    admin tinyint(1) null,
    kolcsonzo_id int null,
    constraint felhasznalo_fehasznalo_neve_uindex
        unique (felhasznalo_neve),
    constraint felhasznalo_Kolcsonzo_id_fk
        foreign key (kolcsonzo_id) references konyvtarHU.Kolcsonzo (id)
            on delete cascade
);

create table konyvtarHU.`groups`
(
    id mediumint unsigned auto_increment
        primary key,
    name varchar(20) not null,
    description varchar(100) not null
)
    charset=utf8;

create table konyvtarHU.login_attempts
(
    id int(11) unsigned auto_increment
        primary key,
    ip_address varchar(45) not null,
    login varchar(100) not null,
    time int(11) unsigned null
)
    charset=utf8;

create table konyvtarHU.users
(
    id int(11) unsigned auto_increment
        primary key,
    ip_address varchar(45) not null,
    username varchar(100) null,
    password varchar(255) not null,
    email varchar(254) not null,
    activation_selector varchar(255) null,
    activation_code varchar(255) null,
    forgotten_password_selector varchar(255) null,
    forgotten_password_code varchar(255) null,
    forgotten_password_time int(11) unsigned null,
    remember_selector varchar(255) null,
    remember_code varchar(255) null,
    created_on int(11) unsigned not null,
    last_login int(11) unsigned null,
    active tinyint(1) unsigned null,
    first_name varchar(50) null,
    last_name varchar(50) null,
    company varchar(100) null,
    phone varchar(20) null,
    constraint uc_activation_selector
        unique (activation_selector),
    constraint uc_email
        unique (email),
    constraint uc_forgotten_password_selector
        unique (forgotten_password_selector),
    constraint uc_remember_selector
        unique (remember_selector)
)
    charset=utf8;

create table konyvtarHU.users_groups
(
    id int(11) unsigned auto_increment
        primary key,
    user_id int(11) unsigned not null,
    group_id mediumint unsigned not null,
    constraint uc_users_groups
        unique (user_id, group_id),
    constraint fk_users_groups_groups1
        foreign key (group_id) references konyvtarHU.`groups` (id)
            on delete cascade,
    constraint fk_users_groups_users1
        foreign key (user_id) references konyvtarHU.users (id)
            on delete cascade
)
    charset=utf8;

create index fk_users_groups_groups1_idx
    on konyvtarHU.users_groups (group_id);

create index fk_users_groups_users1_idx
    on konyvtarHU.users_groups (user_id);

