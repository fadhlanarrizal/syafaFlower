CREATE TABLE ongkir
(
id_ongkir int(5) NOT NULL AUTO_INCREMENT,
kota varchar(100),
tarif int(11),
PRIMARY KEY(id_ongkir)
);

INSERT INTO ongkir (kota, tarif)
VALUES ('jakarta', 10000), ('bogor', 12000), ('cirebon', 15000), ('jogja', 20000), ('madiun', 25000), ('malang', 30000);      


CREATE DATABASE buying
(
id_buying int(5) NOT NULL AUTO_INCREMENT,
id_user varchar(100),
id_ongkir int(11),
date_of_buying DATE CURRENT_TIMESTAMP,
total 
PRIMARY KEY(id_ongkir)
);

SELECT * FROM buying;

CREATE TABLE mahasiswa
(
    nim INT(10),
    nama VARCHAR(100),
    alamat VARCHAR(100),
    PRIMARY KEY(nim)
);

CREATE TABLE transaksi
(
    id_transaksi INT(10),
    nim INT(10),
    buku VARCHAR(100),
    PRIMARY KEY(id_transaksi)
);

INSERT INTO mahasiswa 
VALUES 
(21400200,"faqih","bandung"),
(21400201,"ina","jakarta"),
(21400202,"anto","semarang"),
(21400203,"dani","padang"),
(21400204,"jaka","bandung"),
(21400205,"nara","bandung"),
(21400206,"senta","semarang");

INSERT INTO transaksi 
VALUES 
(1,21400200,"Buku Informatika"),
(2,21400202,"Buku Teknik Elektro"),
(3,21400203,"Buku Matematika"),
(4,21400206,"Buku Fisika"),
(5,21400207,"Buku Bahasa Indonesia"),
(6,21400210,"Buku Bahasa Daerah"),
(7,21400211,"Buku Kimia");

SELECT * FROM product_buying;
SELECT * FROM buying;

SELECT *
FROM users
INNER JOIN buying
ON users.id = buying.id_user WHERE users.id=1;

SELECT * FROM buying JOIN users ON buying.id_user = users.id WHERE buying.id_buying=36;