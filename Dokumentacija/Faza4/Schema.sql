Use cenkaros;

CREATE TABLE Artikal
(
	idArtikla            INTEGER NOT NULL,
	naziv                VARCHAR(50) NOT NULL,
	jedinicaMere         VARCHAR(5) NOT NULL,
	tags                 VARCHAR(400) NOT NULL
);

ALTER TABLE Artikal
ADD CONSTRAINT XPKArtikal PRIMARY KEY (idArtikla);

CREATE TABLE Korisnik
(
	idKorisnik           INTEGER NOT NULL,
	kIme                 VARCHAR(50) NOT NULL,
	sifra                CHAR(64) NOT NULL,
	email                VARCHAR(50) NOT NULL,
	tipKorisnika         TINYINT NOT NULL
);

ALTER TABLE Korisnik
ADD CONSTRAINT XPKKorisnik PRIMARY KEY (idKorisnik);

CREATE TABLE Lista
(
	idListe              INTEGER NOT NULL,
	naziv                VARCHAR(50) NOT NULL,
	idKorisnik           INTEGER NOT NULL
);

ALTER TABLE Lista
ADD CONSTRAINT XPKLista PRIMARY KEY (idListe);

CREATE TABLE Prodaje
(
	cena                 DECIMAL(10,2) NOT NULL,
	idRadnje             INTEGER NOT NULL,
	idArtikla            INTEGER NOT NULL
);

ALTER TABLE Prodaje
ADD CONSTRAINT XPKProdaje PRIMARY KEY (idRadnje,idArtikla);

CREATE TABLE Radnja
(
	idRadnje             INTEGER NOT NULL,
	naziv                VARCHAR(50) NOT NULL,
	sirina               DECIMAL(11,8) NOT NULL,
	duzina               DECIMAL(11,8) NOT NULL,
	pib                  VARCHAR(20) NOT NULL,
	radniDani            TINYINT NOT NULL,
	radnoVreme           VARCHAR(100) NOT NULL,
	idPredstavnika       INTEGER NOT NULL
);

ALTER TABLE Radnja
ADD CONSTRAINT XPKRadnja PRIMARY KEY (idRadnje);

CREATE TABLE Sadrzi
(
	kolicina             DECIMAL(10,2) NOT NULL,
	idListe              INTEGER NOT NULL,
	idArtikla            INTEGER NOT NULL
);

ALTER TABLE Sadrzi
ADD CONSTRAINT XPKSadrzi PRIMARY KEY (idListe,idArtikla);

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
