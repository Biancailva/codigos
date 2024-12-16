
CREATE DATABASE `agenda` ;
USE `agenda`;

CREATE TABLE  `cliente` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nome` varchar(100) NOT NULL,
	`cpf` int(100) NOT NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,
	PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `cliente` (`id`, `nome`, `cpf`, `created`, `modified`);
																		

CREATE TABLE `servico` (
  `id` int(11)AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  `cliente_id` int(11) NOT NULL DEFAULT 0,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__cliente` (`cliente_id`) USING BTREE,
  CONSTRAINT `FK__cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `servico` (`id`, `tipo`, `cliente_id`, `created`, `modified`);


CREATE TABLE  `users` (
  `id` int(11) AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `username`, `password`, `tipo`, `created`, `modified`) VALUES
	(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMINISTRADOR', '2023-08-30 19:29:27', '2023-08-31 02:25:06'),
	(2, 'bruno', '21232f297a57a5a743894a0e4a801fc3', 'ADMINISTRADOR', '2023-08-31 02:24:48', '2023-08-31 02:24:48'),
	(3, 'root', '21232f297a57a5a743894a0e4a801fc3', 'ADMINISTRADOR', '2023-09-06 18:21:55', '2023-09-06 18:21:55'),
	(4, 'ifma', '21232f297a57a5a743894a0e4a801fc3', 'ADMINISTRADOR', '2023-09-06 18:24:09', '2023-09-06 18:24:09');
