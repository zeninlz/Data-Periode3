create database dbName;
use dbName;

create table Producten(
 productenCode INT AUTO_INCREMENT PRIMARY KEY,
    naam VARCHAR(255),
    omschrijving TEXT,
    prijs DECIMAL(10, 2)
);
ALTER TABLE Producten
CHANGE COLUMN naam productnaam VARCHAR(255);
create table tafels(
 tafelCode INT AUTO_INCREMENT PRIMARY KEY,
    tafelnr int,
    bijzonderheden TEXT,
    aantalpersonen int
);
select * from tafels;
create table klanten(
klantenCode INT auto_increment primary key ,
naam varchar(255),
achternaam varchar(255),
email varchar (255),
nummer int 
);

create table reseveringen(
reseveringCode INT auto_increment primary key ,
datum date,
tijd time,
klantennaam int, 
tafelnr INT,
fOREIGN KEY (klantennaam) REFERENCES klanten(klantenCode)ON DELETE CASCADE,
fOREIGN KEY (tafelnr) REFERENCES tafels(tafelCode)ON DELETE CASCADE
);

create table bestellingen (
bestellingenCode INT auto_increment primary key ,
reseveringCode int,
productenCode int,
foreign key (reseveringCode) references reseveringen(reseveringCode) on delete cascade,
foreign key (productenCode) references Producten(productenCode) on delete cascade
);

