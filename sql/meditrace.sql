-- ============================================================
--  MediTrace — Base de données complète
--  Mots de passe par défaut (voir COMPTES_DEMO.txt) :
--    admin@hopital.com       / admin123
--    dr.kpossou@hopital.com  / medecin123
--    inf.glele@hopital.com   / infirmier123
--    patient@test.com        / patient123
-- ============================================================

CREATE DATABASE IF NOT EXISTS meditrace
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE meditrace;

-- Suppression dans le bon ordre (FK)
DROP TABLE IF EXISTS paiements;
DROP TABLE IF EXISTS factures;
DROP TABLE IF EXISTS ordonnances;
DROP TABLE IF EXISTS examens;
DROP TABLE IF EXISTS constantes_vitales;
DROP TABLE IF EXISTS soins;
DROP TABLE IF EXISTS urgences;
DROP TABLE IF EXISTS hospitalisations;
DROP TABLE IF EXISTS consultations;
DROP TABLE IF EXISTS rendez_vous;
DROP TABLE IF EXISTS demandes_consultation;
DROP TABLE IF EXISTS demandes_sortie;
DROP TABLE IF EXISTS chambres;
DROP TABLE IF EXISTS personnel;
DROP TABLE IF EXISTS patients;
DROP TABLE IF EXISTS utilisateurs;

-- ----------------------------
-- Utilisateurs (auth)
-- ----------------------------
CREATE TABLE utilisateurs (
  id            INT AUTO_INCREMENT PRIMARY KEY,
  nom           VARCHAR(100) NOT NULL,
  email         VARCHAR(150) NOT NULL UNIQUE,
  mot_de_passe  VARCHAR(255) NOT NULL,
  role          ENUM('administrateur','medecin','infirmier','patient') NOT NULL,
  cree_le       DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ----------------------------
-- Patients
-- ----------------------------
CREATE TABLE patients (
  id              INT AUTO_INCREMENT PRIMARY KEY,
  user_id         INT NULL,
  nom             VARCHAR(100) NOT NULL,
  prenom          VARCHAR(100) NOT NULL,
  date_naissance  DATE NULL,
  sexe            ENUM('M','F') DEFAULT 'M',
  email           VARCHAR(150) NULL,
  telephone       VARCHAR(30) NULL,
  adresse         VARCHAR(255) NULL,
  groupe_sanguin  VARCHAR(5) NULL,
  contact_urgence VARCHAR(150) NULL,
  cree_le         DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES utilisateurs(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- ----------------------------
-- Personnel
-- ----------------------------
CREATE TABLE personnel (
  id        INT AUTO_INCREMENT PRIMARY KEY,
  nom       VARCHAR(100) NOT NULL,
  prenom    VARCHAR(100) NOT NULL,
  fonction  VARCHAR(80),
  service   VARCHAR(80),
  email     VARCHAR(150),
  telephone VARCHAR(30),
  cree_le   DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ----------------------------
-- Chambres
-- ----------------------------
CREATE TABLE chambres (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  numero     VARCHAR(20) NOT NULL,
  type       VARCHAR(40),
  capacite   INT DEFAULT 1,
  occupee    TINYINT(1) DEFAULT 0,
  patient_id INT NULL,
  FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- ----------------------------
-- Rendez-vous
-- ----------------------------
CREATE TABLE rendez_vous (
  id          INT AUTO_INCREMENT PRIMARY KEY,
  patient_id  INT NOT NULL,
  medecin_id  INT NULL,
  date_rdv    DATETIME NOT NULL,
  motif       VARCHAR(255),
  statut      ENUM('prevu','effectue','annule') DEFAULT 'prevu',
  cree_le     DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE,
  FOREIGN KEY (medecin_id) REFERENCES personnel(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- ----------------------------
-- Consultations / diagnostics
-- ----------------------------
CREATE TABLE consultations (
  id                 INT AUTO_INCREMENT PRIMARY KEY,
  patient_id         INT NOT NULL,
  medecin_id         INT NULL,
  date_consultation  DATETIME DEFAULT CURRENT_TIMESTAMP,
  type_diagnostic    VARCHAR(80) NULL,
  diagnostic         TEXT,
  observations       TEXT,
  FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE,
  FOREIGN KEY (medecin_id) REFERENCES personnel(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- ----------------------------
-- Hospitalisations
-- ----------------------------
CREATE TABLE hospitalisations (
  id              INT AUTO_INCREMENT PRIMARY KEY,
  patient_id      INT NOT NULL,
  medecin_id      INT NULL,
  chambre_id      INT NULL,
  date_admission  DATETIME NOT NULL,
  date_sortie     DATETIME NULL,
  motif           VARCHAR(255),
  diagnostic      TEXT,
  statut          ENUM('en_cours','sortie','transferee') DEFAULT 'en_cours',
  FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE,
  FOREIGN KEY (medecin_id) REFERENCES personnel(id) ON DELETE SET NULL,
  FOREIGN KEY (chambre_id) REFERENCES chambres(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- ----------------------------
-- Ordonnances / prescriptions
-- ----------------------------
CREATE TABLE ordonnances (
  id              INT AUTO_INCREMENT PRIMARY KEY,
  consultation_id INT NULL,
  patient_id      INT NOT NULL,
  medecin_id      INT NULL,
  contenu         TEXT,
  date_emission   DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (consultation_id) REFERENCES consultations(id) ON DELETE SET NULL,
  FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE,
  FOREIGN KEY (medecin_id) REFERENCES personnel(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- ----------------------------
-- Examens demandés (labo, imagerie, ECG…)
-- ----------------------------
CREATE TABLE examens (
  id           INT AUTO_INCREMENT PRIMARY KEY,
  patient_id   INT NOT NULL,
  medecin_id   INT NULL,
  type_examen  VARCHAR(120),
  indications  TEXT,
  resultat     TEXT,
  date_demande DATETIME DEFAULT CURRENT_TIMESTAMP,
  date_examen  DATE NULL,
  statut       ENUM('demande','realise','interprete') DEFAULT 'demande',
  FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE,
  FOREIGN KEY (medecin_id) REFERENCES personnel(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- ----------------------------
-- Constantes vitales (infirmier)
-- ----------------------------
CREATE TABLE constantes_vitales (
  id                INT AUTO_INCREMENT PRIMARY KEY,
  patient_id        INT NOT NULL,
  infirmier_id      INT NULL,
  temperature       DECIMAL(4,1),
  tension_systole   INT,
  tension_diastole  INT,
  pouls             INT,
  saturation        INT,
  glycemie          DECIMAL(5,2),
  poids             DECIMAL(5,2),
  respiratoire      INT,
  observations      TEXT,
  date_mesure       DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE,
  FOREIGN KEY (infirmier_id) REFERENCES personnel(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- ----------------------------
-- Soins / surveillance (infirmier)
-- ----------------------------
CREATE TABLE soins (
  id            INT AUTO_INCREMENT PRIMARY KEY,
  patient_id    INT NOT NULL,
  infirmier_id  INT NULL,
  type_soin     VARCHAR(120),
  description   TEXT,
  observation   TEXT,
  date_soin     DATETIME DEFAULT CURRENT_TIMESTAMP,
  prochain_soin DATETIME NULL,
  FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE,
  FOREIGN KEY (infirmier_id) REFERENCES personnel(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- ----------------------------
-- Urgences signalées (infirmier)
-- ----------------------------
CREATE TABLE urgences (
  id            INT AUTO_INCREMENT PRIMARY KEY,
  patient_id    INT NOT NULL,
  infirmier_id  INT NULL,
  medecin_id    INT NULL,
  niveau        ENUM('faible','moyen','eleve','critique') DEFAULT 'moyen',
  description   TEXT,
  action        TEXT,
  cree_le       DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE,
  FOREIGN KEY (infirmier_id) REFERENCES personnel(id) ON DELETE SET NULL,
  FOREIGN KEY (medecin_id) REFERENCES personnel(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- ----------------------------
-- Demandes patient (consultation / sortie)
-- ----------------------------
CREATE TABLE demandes_consultation (
  id          INT AUTO_INCREMENT PRIMARY KEY,
  patient_id  INT NOT NULL,
  service     VARCHAR(120),
  motif       TEXT,
  statut      ENUM('en_attente','acceptee','refusee') DEFAULT 'en_attente',
  cree_le     DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE demandes_sortie (
  id           INT AUTO_INCREMENT PRIMARY KEY,
  patient_id   INT NOT NULL,
  date_sortie  DATETIME NOT NULL,
  motif        TEXT,
  statut       ENUM('en_attente','acceptee','refusee') DEFAULT 'en_attente',
  cree_le      DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ----------------------------
-- Factures / paiements
-- ----------------------------
CREATE TABLE factures (
  id              INT AUTO_INCREMENT PRIMARY KEY,
  patient_id      INT NOT NULL,
  type_prestation VARCHAR(120),
  description     TEXT,
  montant         DECIMAL(10,2) NOT NULL DEFAULT 0,
  payee           TINYINT(1) DEFAULT 0,
  date_emission   DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE paiements (
  id            INT AUTO_INCREMENT PRIMARY KEY,
  facture_id    INT NOT NULL,
  montant       DECIMAL(10,2) NOT NULL,
  mode_paiement VARCHAR(40),
  reference     VARCHAR(120),
  date_paiement DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (facture_id) REFERENCES factures(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ============================================================
--  Comptes de démonstration
--  Hashes générés avec password_hash('xxx', PASSWORD_DEFAULT)
-- ============================================================
-- admin123 / medecin123 / infirmier123 / patient123
INSERT INTO utilisateurs (nom, email, mot_de_passe, role) VALUES
 ('Admin Principal',  'admin@hopital.com',      '$2y$10$Z4UoPQ4.bx3W4j3qJp8uAuZ5Lz5Q2tN3yW8mYqYP3jR7L1mC2yH6e', 'administrateur'),
 ('Dr Kpossou',       'dr.kpossou@hopital.com', '$2y$10$abc4l.0eGsl0Y9DqgfV8E.X1Fz8FJ4zG3oG3hQ7nK0hH3mJj6oR4S', 'medecin'),
 ('Infirmiere Glele', 'inf.glele@hopital.com',  '$2y$10$xyzPlACehoLDeRINTERNAL2Z9Lhh0v7mP4kJ1pCqzC4s5nE1bF8aOe', 'infirmier'),
 ('Jean Adande',      'patient@test.com',       '$2y$10$paTienTplaceHOLDerINternal3X8Lhh1u8mQ5lK2qDqzD5t6oF2cG9b', 'patient');

-- IMPORTANT : les hashes ci-dessus sont des PLACEHOLDERS.
-- Allez sur index.php?p=connexion/seed pour réinitialiser avec les vrais hashes.

INSERT INTO patients (nom, prenom, date_naissance, sexe, telephone, adresse, email) VALUES
 ('Adande',  'Jean',  '1990-05-12', 'M', '+229 97 00 00 01', 'Cotonou',    'patient@test.com'),
 ('Houessou','Marie', '1985-09-23', 'F', '+229 97 00 00 02', 'Porto-Novo', NULL),
 ('Sossou',  'Paul',  '2001-02-08', 'M', '+229 97 00 00 03', 'Calavi',     NULL);

INSERT INTO personnel (nom, prenom, fonction, service, email) VALUES
 ('Kpossou', 'Hyppolite', 'Médecin',    'Cardiologie', 'dr.kpossou@hopital.com'),
 ('Glele',   'Adjoa',     'Infirmière', 'Urgences',    'inf.glele@hopital.com');

INSERT INTO chambres (numero, type, capacite, occupee) VALUES
 ('101', 'Standard', 2, 0),
 ('102', 'Standard', 2, 1),
 ('201', 'VIP',      1, 0),
 ('202', 'VIP',      1, 0);
