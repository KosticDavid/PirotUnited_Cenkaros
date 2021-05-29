DROP DATABASE IF EXISTS cenkaros;
CREATE DATABASE cenkaros;
Use cenkaros;

CREATE TABLE Artikal
(
	idArtikla            INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	naziv                VARCHAR(50) NOT NULL,
	jedinicaMere         VARCHAR(5) NOT NULL,
	tags                 VARCHAR(400) NOT NULL
);

CREATE TABLE Korisnik
(
	idKorisnik           INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	kIme                 VARCHAR(50) NOT NULL,
	sifra                CHAR(64) NOT NULL,
	email                VARCHAR(50) NOT NULL,
	tipKorisnika         TINYINT NOT NULL
);

CREATE TABLE Lista
(
	idListe              INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	naziv                VARCHAR(50) NOT NULL,
	idKorisnik           INTEGER NOT NULL
);

CREATE TABLE Prodaje
(
	idProdaje            INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	cena                 DECIMAL(10,2) NOT NULL,
	idRadnje             INTEGER NOT NULL,
	idArtikla            INTEGER NOT NULL
);

CREATE TABLE Radnja
(
	idRadnje             INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	naziv                VARCHAR(50) NOT NULL,
	sirina               DECIMAL(18,15) NOT NULL,
	duzina               DECIMAL(18,15) NOT NULL,
	pib                  VARCHAR(20) NOT NULL,
	radniDani            CHAR(7) NOT NULL,
	radnoVreme           VARCHAR(100) NOT NULL,
	idPredstavnika       INTEGER NOT NULL
);

CREATE TABLE Sadrzi
(
	idSadrzi             INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	kolicina             DECIMAL(10,2) NOT NULL,
	idListe              INTEGER NOT NULL,
	idArtikla            INTEGER NOT NULL
);

ALTER TABLE Lista
ADD CONSTRAINT R_1 FOREIGN KEY (idKorisnik) REFERENCES Korisnik (idKorisnik);

ALTER TABLE Prodaje
ADD CONSTRAINT R_5 FOREIGN KEY (idRadnje) REFERENCES Radnja (idRadnje);

ALTER TABLE Prodaje
ADD CONSTRAINT R_6 FOREIGN KEY (idArtikla) REFERENCES Artikal (idArtikla);

ALTER TABLE Radnja
ADD CONSTRAINT R_4 FOREIGN KEY (idPredstavnika) REFERENCES Korisnik (idKorisnik);

ALTER TABLE Sadrzi
ADD CONSTRAINT R_2 FOREIGN KEY (idListe) REFERENCES Lista (idListe);

ALTER TABLE Sadrzi
ADD CONSTRAINT R_3 FOREIGN KEY (idArtikla) REFERENCES Artikal (idArtikla);

INSERT INTO `artikal` (`naziv`, `jedinicaMere`, `tags`) VALUES
('Samsung Galaxy Buds Pro - Crne', 'kom', 'samsung,galaxy,buds,pro,slusalice,bezicne,wireless,bluetooth,headphones,crne,black'),
('iPhone 11 Pro Max 64GB Space gray', 'kom', 'apple,iphone,11,pro,max,64gb,space,grey,gray,siva,ajfon,telefon,epl,tamno,tamnosiva,4gb,6.5in,ios13,phone,mobilni,smart,nanosim'),
('Tesla Monitor 24MT600BF 24\"', 'kom', 'tesla,monitor,display,24in,75hz,fullhd,vga,hdmi,va'),
('Dugotrajno mleko IMLEK 2,8%mm 1l', 'kom', 'mleko,milk,2.8,1l,dugotrajno'),
('Dugotrajno mleko IMLEK 2,8%mm 1,5l', 'kom', 'mleko,milk,2.8,1.5l,dugotrajno'),
('Dugotrajno mleko IMLEK 2,8%mm 500ml', 'kom', 'mleko,milk,2.8,500ml,dugotrajno');

INSERT INTO `korisnik` (`kIme`, `sifra`, `email`, `tipKorisnika`) VALUES
('admin', '3b612c75a7b5048a435fb6ec81e52ff92d6d795a8b5a9c17070f6a63c97a53b2', 'admin@cenkaros.rs', 0),
('milan', '1992454a9df037017a906a1a1ac1a6bf8f44f398c2a2ef8488323f2c31c877a9', 'milan@cenkaros.rs', 2),
('david', '06036e2343750e3a5b0aa55724748fb0c6659214ae087a852c20d5e743151d67', 'david@cenkaros.rs', 2),
('milena', 'f11527506b83b2db947fed25b28c4ca551785e343c663cb219a56253b5ba73d6', 'milena@cenkaros.rs', 2),
('gigatron11', '775af32a470b4762f3bdc9cca85c87dc337b393348283c938b1187e927962f8f', 'g11@gigatronshop.com', 1),
('tehnomanija.terazije6', 'b117d6cc7c774495573978f7e7cf7eafcdf08e11ce04b8b8481898dd9d1825c3', 'terazije6@tehnomanija.rs', 1),
('idea.golsvordijeva', '8fa00e3ba1c561fd0fb00dcfb2a629303d0ea4d64371ea2df0c4c9cc4290be3f', 'golsvordijeva@idea.rs', 1),
('maxi.njegoseva', 'c415b2d8d3d198c6becaf17f8c94723b2f970152e63c3dd95c5e5be90a38bc57', 'njegoseva@maxi.rs', 1);

INSERT INTO `radnja` (`naziv`, `sirina`, `duzina`, `pib`, `radniDani`, `radnoVreme`, `idPredstavnika`) VALUES
('Gigatron-Beograd-Zira SC', '44.80836707395374','20.48234544603801', '102778428', 127, '09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:00-19:00', 5),
('Tehnomanija-Terazije 6', '44.81447680991798','20.460148017724418', '100416234', 127, '09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:`-21:00;09:00-21:00;09:00-21:00', 6),
('Idea-Golsvordijeva', '44.803166100882784','20.476502325764987', '012345678', 127, '09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00', 7),
('Maxi Njegoseva', '44.80227755930551','20.470938114778413', '123456789', 127, '09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00', 8);

INSERT INTO `lista` (`naziv`, `idKorisnik`) VALUES
('Lista1', 2),
('Lista2', 3),
('Lista3', 4);

INSERT INTO `prodaje` (`cena`, `idRadnje`, `idArtikla`) VALUES
('29999.00', 1, 1),
('149900.00', 1, 2),
('12999.00', 1, 3),
('28331.00', 2, 1),
('142990.00', 2, 2),
('12268.00', 2, 3),
('89.99', 3, 4),
('148.99', 3, 5),
('69.99', 3, 6),
('89.99', 4, 4),
('148.99', 4, 5),
('69.99', 4, 6);

INSERT INTO `sadrzi` (`kolicina`, `idListe`, `idArtikla`) VALUES
('1.00', 1, 1),
('1.00', 1, 3),
('1.00', 2, 4),
('1.00', 2, 5),
('1.00', 2, 6),
('3.00', 3, 2);
