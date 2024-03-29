DROP TABLE IF EXISTS CoeffRessource CASCADE;
DROP TABLE IF EXISTS Note CASCADE;
DROP TABLE IF EXISTS Ressource CASCADE;
DROP TABLE IF EXISTS Bin CASCADE;
DROP TABLE IF EXISTS EtudiantSemestre CASCADE;
DROP TABLE IF EXISTS Semestre CASCADE;
DROP TABLE IF EXISTS Etudiant CASCADE;

CREATE TABLE Etudiant (
    etudiantId integer PRIMARY KEY,
    codeNip integer,
    rang integer,
    civilite VARCHAR(5),
    nom VARCHAR(50),
    prenom VARCHAR(50),
    cursus VARCHAR(25),
    bac VARCHAR(10),
    specialite VARCHAR(15),
    typeAdmission VARCHAR(15),
    regAdmin VARCHAR(15),
    UNIQUE(etudiantId, codeNip)
);

CREATE TABLE Semestre (
    semestreId SERIAL PRIMARY KEY,
    nomSemestre VARCHAR(5),
    annee integer
);

CREATE TABLE Bin (
    binId SERIAL PRIMARY KEY,
    nomBin VARCHAR(30) UNIQUE,
    semestreId integer REFERENCES Semestre(semestreId)
);

CREATE TABLE Ressource(
    ressourceId SERIAL PRIMARY KEY,
    nomRessource VARCHAR(30) UNIQUE,
    binId integer REFERENCES Bin(binId),
    coef integer
);

CREATE TABLE EtudiantSemestre (
    etudiantSemestreId SERIAL PRIMARY KEY,
    semestreId integer REFERENCES Semestre(semestreId),
    etudiantId integer REFERENCES Etudiant(etudiantId),
    absence integer,
    absenceJustifiee integer,
    ueValidee integer,
    bonus float,
    UNIQUE(semestreId, etudiantId)
);

CREATE TABLE CoeffRessource(
    coeffId SERIAL PRIMARY KEY,
    ressourceId integer REFERENCES Ressource(ressourceId),
    binId integer REFERENCES Bin(binId),
    coeff integer
);



CREATE TABLE Note(
    noteId SERIAL PRIMARY KEY,
    etudiantId integer REFERENCES Etudiant(etudiantId),
    ressourceId integer REFERENCES Ressource(ressourceId),
    note integer,
    UNIQUE(etudiantId, ressourceId)
);