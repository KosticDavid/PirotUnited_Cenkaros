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
('Dugotrajno mleko IMLEK 2,8%mm 500ml', 'kom', 'mleko,milk,2.8,500ml,dugotrajno'),
('Krompir beli', 'kg', 'krompir,povrce,beli'),
('Krompir crveni', 'kg', 'krompir,povrce,crveni'),
('Kupus mladi', 'kg', 'kupus,povrce'),
('Paradajz', 'kg', 'paradajz,povrce'),
('Krastavac', 'kg', 'krastavac,povrce'),
('Ananas', 'kg', 'ananas,voce'),
('Banane', 'kg', 'banana,banane,voce'),
('Avokado', 'kom', 'avokado,voce'),
('Jabuke ajdared', 'kg', 'jabuka, jabuke, ajdared, voce'),
('Jabuke greni smit', 'kg', 'jabuka, jabuke,greni,smit,voce'),
('Kajsija', 'kg', 'kajsija,voce'),
('Limun', 'kg', 'limun,voce'),
('Jogurt IMLEK Moja kravica 2,8% 1kg DC', 'kom', 'jogurt, imlek, moja, kravica, 2.8, DC'),
('Jogurt IMLEK Moja kravica 2,8% 1kg TT', 'kom', 'jogurt, imlek, moja, kravica, 2.8, TT'),
('Jogurt IMLEK Moja kravica 2,8% 180g', 'kom', 'jogurt, imlek, moja, kravica, 2.8, 180g'),
('Jogurt IMLEK Balans+ 200g','kom','jogurt, imlek, balans, 200g'),
('Kisela pavlaka FARMA ORGANICA organska 20%mm 150g','kom','kisela,pavlaka,farma,ogranica,organska,20,150g'),
('MEGGLE pavlaka za kuvanje light 200ml','kom','meggle, pavlaka,kuvanje, light, 200ml'),
('Jaja klasa S 10kom','kom','jaja,klasa,s,10kom,10'),
('Jaja klasa M 30kom','kom','jaja,klasa,m,30,kom'),
('Brasno DANUBIUS heljdin mešani hleb 1kg','kg','brasno,danubius,heljda, heljdin, mesani, hleb'),
('Brašno FIDELINKA meko T-400 1kg','kg','brasno,fidelinka, meko,t-400'),
('Kečap HEINZ 1kg','kom','kecap,heinz'),
('Kečap POLIMARK blagi pvc 500g','kom','kecap, polimark, blagi, pvc'),
('Čokoladno mleko IMLEK 0,1%mm 250ml','kom','melko,cokoladno,imlek,0.1,250ml,david'),
('Ulje DIJAMANT 1l','kom','ulje,dijamant,1l')
('Pašteta ARGETA kokošija 95g','kom','pasteta,argeta,kokošija, kokosija, 95g'),
('Svinjski file 1kg','kg','svinjski,file,meso'),
('Juneća plećka bez kostiju 1kg','kg','junetina,juneca,plecka,bez,kostiju'),
('Pileće grudi 1kg','kg','piletina,meso,pilece,file'),
('Čokolada MILKA Dark almond 85g','kom','cokolada,milka,dark,almond')
('Čokolada MILKA celi lešnici 100g','kom','cokolada,milka,celi,lesnici,lesnik');


INSERT INTO `korisnik` (`kIme`, `sifra`, `email`, `tipKorisnika`) VALUES
('admin', '3b612c75a7b5048a435fb6ec81e52ff92d6d795a8b5a9c17070f6a63c97a53b2', 'admin@cenkaros.rs', 0),
('milan', '1992454a9df037017a906a1a1ac1a6bf8f44f398c2a2ef8488323f2c31c877a9', 'milan@cenkaros.rs', 2),
('david', '06036e2343750e3a5b0aa55724748fb0c6659214ae087a852c20d5e743151d67', 'david@cenkaros.rs', 2),
('milena', 'f11527506b83b2db947fed25b28c4ca551785e343c663cb219a56253b5ba73d6', 'milena@cenkaros.rs', 2),
('gigatron11', '775af32a470b4762f3bdc9cca85c87dc337b393348283c938b1187e927962f8f', 'g11@gigatronshop.com', 1),
('tehnomanija.terazije6', 'b117d6cc7c774495573978f7e7cf7eafcdf08e11ce04b8b8481898dd9d1825c3', 'terazije6@tehnomanija.rs', 1),
('idea.golsvordijeva', '8fa00e3ba1c561fd0fb00dcfb2a629303d0ea4d64371ea2df0c4c9cc4290be3f', 'golsvordijeva@idea.rs', 1),
('maxi.njegoseva', 'c415b2d8d3d198c6becaf17f8c94723b2f970152e63c3dd95c5e5be90a38bc57', 'njegoseva@maxi.rs', 1),
('univerexport.juzni.bulevar','5327bcc3c5c21f7c5d25b78dcfde29ecd42c460d6ad3abcc1408b73c72db1633','univerexport.juzni.bulevar@cenkaros.rs','1'),
('tempo.nehruova','f593cad69da5b1518a6f8c819c410d041fd5be28e2e4d65f6edde30f3553be52','tempo.nehruova@cenkaros.rs','1'),
('idea.decanska','9eeefaa8165d671aaa5b042082ae39baac422a4addf3f48e8ff5815e4f6e61fb','idea.decanska@cenkaros.rs','1');

INSERT INTO `radnja` (`naziv`, `sirina`, `duzina`, `pib`, `radniDani`, `radnoVreme`, `idPredstavnika`) VALUES
('Gigatron-Beograd-Zira SC', '44.80836707395374','20.48234544603801', '102778428', '1111111', '09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:00-19:00', 5),
('Tehnomanija-Terazije 6', '44.81447680991798','20.460148017724418', '100416234', '1111111', '09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:`-21:00;09:00-21:00;09:00-21:00', 6),
('Idea-Golsvordijeva', '44.803166100882784','20.476502325764987', '012345678', '1111111', '09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00', 7),
('Maxi Njegoseva', '44.80227755930551','20.470938114778413', '123456789', '1111111', '09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00', 8),
('Univerexport-Juzni Bulevar','44.7934749201873','20.481693684982847','648573069','1111111','07:00-23:00;07:00-23:00;07:00-23:00;07:00-23:00;07:00-23:00;09:00-21:00;09:00-21:00','9')
('Tempo-Nehruova 61','44.80496912561569','20.37989961381936','9574836482','1111111','07:00-23:00;07:00-23:00;07:00-23:00;07:00-23:00;07:00-23:00;09:00-21:00;09:00-21:00','10'),
('Idea-Decanska','44.81428213392496', '20.462540369638393','8345967584','1111111','09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00;09:00-21:00','11');

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
('69.99', 4, 6),
('45.00', 3, 7),
('45.99', 4, 7),
('48.00', 5, 7),
('49.99', 6, 7),
('45.00', 7, 7),
('55.00', 3, 8),
('55.99', 4, 8),
('58.00', 5, 8),
('59.99', 6, 8),
('55.00', 7, 8),
('35.00', 3, 9),
('35.99', 4, 9),
('38.00', 5, 9),
('39.99', 6, 9),
('35.00', 7, 9),
('85.00', 3, 10),
('85.99', 4, 10),
('88.00', 5, 10),
('89.99', 6, 10),
('75.00', 7, 10),
('75.00', 3, 11),
('75.99', 4, 11),
('78.00', 5, 11),
('79.99', 6, 11),
('75.00', 7, 11),
('285.00', 3, 12),
('285.99', 4, 12),
('288.00', 5, 12),
('121.00', 3, 13),
('112.99', 4, 13),
('114.00', 5, 13),
('99.99', 6, 13),
('112.99', 7, 13),
('285.00', 3, 14),
('275.99', 4, 14),
('288.00', 5, 14),
('189.99', 6, 14),
('285.00', 7, 14),
('85.00', 3, 15),
('85.99', 4, 15),
('88.00', 5, 15),
('89.99', 6, 15),
('85.00', 7, 15),
('65.00', 3, 16),
('65.99', 4, 16),
('68.00', 5, 16),
('69.99', 6, 16),
('65.00', 7, 16),
('222.00', 3, 17),
('235.99', 4, 17),
('212.00', 5, 17),
('205.99', 6, 17),
('222.00', 7, 17),
('85.00', 3, 18),
('125.99', 4, 18),
('128.00', 5, 18),
('129.99', 6, 18),
('85.00', 7, 18),
('99.00', 3, 19),
('100.99', 4, 19),
('101.00', 5, 19),
('105.99', 6, 19),
('99.00', 7, 19),
('100.00', 3, 20),
('111.99', 4, 20),
('121.00', 5, 20),
('99.99', 6, 20),
('100.00', 7, 20),
('45.00','3','21')
('41.00','4','21')
('39.00','5','21')
('35.99','6','21')
('45.00','7','21')
('131.00','3','22')
('130.00','4','22')
('133.00','5','22')
('132.00','6','22')
('131.00','7','22')
('65.00','3','23')
('60.00','4','23')
('63.99','5','23')
('61.99','6','23')
('65.00','7','23')
('134.00','3','24')
('129.99','4','24')
('135.00','5','24')
('128.99','6','24')
('134.00','7','24')
('139.00','3','25')
('128.00','4','25')
('119.00','5','25')
('132.99','6','25')
('139.00','7','25')
('235.00','3','26')
('229.99','4','26')
('231.00','5','26')
('232.00','6','26')
('235.00','7','26')
('77.99','3','27')
('68.99','4','27')
('76.00','5','27')
('75.00','6','27')
('77.99','7','27')
('55.00','3','28')
('67.00','4','28')
('53.00','5','28')
('57.99','6','28')
('55.00','7','28')
('189.99','3','29')
('185.99','4','29')
('186.99','5','29')
('190.00','6','29')
('189.99','7','29')
('89.99','3','30')
('79.00','4','30')
('78.99','5','30')
('88.00','6','30')
('89.99','7','30')
('55.00','3','31')
('49.99','4','31')
('45.99','5','31')
('52.00','6','31')
('55.00','7','31')
('141.00','3','32')
('154.00','4','32')
('145.00','5','32')
('139.99','6','32')
('141.00','7','32')
('99.99','3','33')
('98.00','4','33')
('101.00','5','33')
('105.00','6','33')
('99.99','7','33')
('556.00','3','34')
('554.99','4','34')
('579.00','5','34')
('647.00','6','34')
('556.00','7','34')
('787.99','3','35')
('755.00','4','35')
('724.99','5','35')
('764.00','6','35')
('787.99','7','35')
('450.00','3','36')
('455.00','4','36')
('456.99','5','36')
('476.99','6','36')
('450.00','7','36')
('121.00','3','37')
('105.99','4','37')
('118.99','5','37')
('119.99','6','37')
('121.00','7','37')
('112.99','3','38')
('121.00','4','38')
('107.99','5','38')
('105.00','6','38')
('112.99','7','38');







INSERT INTO `sadrzi` (`kolicina`, `idListe`, `idArtikla`) VALUES
('1.00', 1, 1),
('1.00', 1, 3),
('1.00', 2, 4),
('1.00', 2, 5),
('1.00', 2, 6),
('3.00', 3, 2);