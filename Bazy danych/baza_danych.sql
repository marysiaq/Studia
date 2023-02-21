create database sklepik;
use sklepik;


create table sklepik.kategorie_produktow 
( id int AUTO_INCREMENT primary key ,
kategoria varchar(20) not null);

create table sklepik.produkt
( id int AUTO_INCREMENT primary key,
 id_kategoria int not null,
 nazwa varchar(80) not null,
 cena decimal(20,2) not null,
 opis text not null,
 sklad text not null,
 ilosc int not null,
 foreign key (id_kategoria) references sklepik.kategorie_produktow(id)); 

 
 create table sklepik.stan_zamowienia
 (id int AUTO_INCREMENT primary key,
 stan varchar(40) not null);
 
 create table sklepik.metody_platnosci
 (id int AUTO_INCREMENT primary key,
 metoda_platnosci varchar(50) not null);
 alter table sklepik.metody_platnosci add column dostepne boolean not null default(true);
 
 create table sklepik.sposoby_dostawy
 (id int AUTO_INCREMENT primary key,
 sposob_dostawy varchar(100) not null,
 cena decimal(10,2) not null);
alter table sklepik.sposoby_dostawy add column dostepne boolean not null default(true);
 
 
 create table sklepik.kody_rabatowe
 (id int AUTO_INCREMENT primary key,
 kod varchar(40) not null,
 znizka_procent int not null
 );
 alter table  sklepik.kody_rabatowe add column czy_aktywny boolean not null default(true);
 
 create table sklepik.zamowione_produkty
 ( id_produktu int  not null,
 id_zamowienia int not null,
 ilosc int not null,
 cena decimal(20,2) not null,
foreign key (id_produktu) references sklepik.produkt(id)
 );
 
 create table sklepik.adresy
( id int AUTO_INCREMENT primary key,
miejscowosc varchar(50) not null,
kod_pocztowy varchar(20) not null,
ulica varchar(50) not null,
numer_budynku varchar(10) not null,
numer_lokalu varchar (10)
);
create table sklepik.uprawnienia_pracownikow
(id int AUTO_INCREMENT primary key,
uprawnienia varchar(40) not null
);
create table sklepik.pracownik
( id int AUTO_INCREMENT primary key,
imie varchar(40) not null,
nazwisko varchar(40) not null,
id_adres int not null unique ,
e_mail varchar(40) not null,
haslo varchar(20) not null,
numer_telefonu varchar(10) not null,
czy_aktywny bool not null default(true),
id_uprawnienia int not null,
foreign key (id_adres) references sklepik.adresy(id),
foreign key (id_uprawnienia) references sklepik.uprawnienia_pracownikow(id)
);
alter table sklepik.pracownik add column id_klienta int;


create table sklepik.klient
( id int AUTO_INCREMENT primary key,
imie varchar(40) not null,
nazwisko varchar(40) not null,
id_adres int not null unique,
e_mail varchar(40) not null,
haslo varchar(20) not null,
numer_telefonu varchar(10) not null,
foreign key (id_adres) references sklepik.adresy(id)
);
alter table sklepik.klient add column usunieto boolean default(false);


alter table sklepik.pracownik add foreign key (id_klienta) references sklepik.klient(id);

create table sklepik.zamowienie
(id int AUTO_INCREMENT primary key,
id_klienta int not null,
id_dostawa int,
id_sposob_platnosci int,
data_zamowienia date,
id_stan int not null default(1),
id_kod_rabatowy int default(1),
koszt_calkowity decimal(20,2),
czy_oplacone bool not null default(false),
foreign key (id_klienta) references sklepik.klient(id),
foreign key (id_dostawa) references sklepik.sposoby_dostawy(id),
foreign key (id_sposob_platnosci) references sklepik.metody_platnosci(id),
foreign key (id_stan) references sklepik.stan_zamowienia(id),
foreign key (id_kod_rabatowy) references sklepik.kody_rabatowe(id)
);
alter table sklepik.zamowienie add column data_zakonczenia date;
alter table sklepik.zamowienie add column data_anulowania date;

alter table sklepik.zamowione_produkty add foreign key (id_zamowienia) references sklepik.zamowienie(id);
alter table sklepik.zamowione_produkty modify column cena decimal(20,2);



insert into sklepik.kody_rabatowe (id,kod,znizka_procent) values (1,"domyslny",0);
insert into sklepik.stan_zamowienia (id,stan) values (1,"koszyk");

 
 
 
 
 
 
 
 

