CREATE TABLE tb_usuario (
  id int UNSIGNED NOT NULL AUTO_INCREMENT,
  nome varchar(100) NOT NULL,
  nascimento date,
  sexo varchar(1),
  cidade varchar(100),
  uf varchar(2),
  pais varchar(50),
  email varchar(100) NOT NULL,
  telefone varchar(15) default NULL,
  senha varchar(20) NOT NULL default '',
  PRIMARY KEY  (id),
  UNIQUE(email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE tb_categoria (
  id int UNSIGNED NOT NULL AUTO_INCREMENT,
  nome varchar(30) NOT NULL,
  PRIMARY KEY  (id),
  UNIQUE(nome)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE tb_marca (
  id int UNSIGNED NOT NULL AUTO_INCREMENT,
  nome varchar(50) NOT NULL,
  PRIMARY KEY  (id),
  UNIQUE(nome)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE tb_anuncio (
  id int NOT NULL AUTO_INCREMENT,
  id_categoria int UNSIGNED NOT NULL,
  id_usuario int UNSIGNED NOT NULL,
  id_marca int UNSIGNED NOT NULL,
  descricao text NOT NULL,
  destaque varchar(50) NOT NULL,
  preco float NOT NULL,
  foto blob,
  PRIMARY KEY (id),
  CONSTRAINT fk_anuncio_marca FOREIGN KEY (id_marca) REFERENCES tb_marca(id),
  CONSTRAINT fk_anuncio_categoria FOREIGN KEY (id_categoria) REFERENCES tb_categoria(id),
  CONSTRAINT fk_anuncio_usuario FOREIGN KEY (id_usuario) REFERENCES tb_usuario(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


#  Foreign keys para a tabela tb_anuncio
# Caso precise separadamente
ALTER TABLE tb_anuncio
ADD CONSTRAINT fk_anuncio_marca FOREIGN KEY (id_marca) REFERENCES tb_marca(id),
ADD CONSTRAINT fk_anuncio_categoria FOREIGN KEY (id_categoria) REFERENCES tb_categoria(id),
ADD CONSTRAINT fk_anuncio_usuario FOREIGN KEY (id_usuario) REFERENCES tb_usuario(id);