
CREATE TABLE

CREATE TABLE `berkas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tanggal` DATE DEFAULT NULL,
  `nama` VARCHAR(50) DEFAULT NULL,
  `satker` VARCHAR(50) DEFAULT NULL,
  `file_ext` VARCHAR(30) DEFAULT NULL,
  `file_size` INT(11) DEFAULT NULL,
  `location` VARCHAR(30) DEFAULT NULL,
  `Status` VARCHAR(15) DEFAULT 'Menunggu',
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1
ALTER TABLE berkas
ALTER `status` SET DEFAULT 'Menunggu';