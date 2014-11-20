create table `administrador`(
	`cve_admon` int(4) not null,
	`contrasenia_admon` varchar(10) not null,
	 PRIMARY KEY  (`cve_admon`)
) ENGINE=INNODB;

create table `paciente`(
	`num_cta`  int(9) not null,
	`nom_paciente` VARCHAR(30)  not null,
	`ap_pat_paciente` VARCHAR(20) not null,
	`ap_mat_paciente` VARCHAR(20) not null,
	`email`  VARCHAR(30) not null,
	`calle` VARCHAR(30)  not null,
	`num_ext` INT(4) not null,
	`num_int` INT(4) not null,
	`colonia` VARCHAR(30) not null,
	`delegacion` VARCHAR(30) not null,
	`contraseña_pac` VARCHAR(10) not null,
	`cve_admon` INT(4) not null,
	`telefono_pac` INT(4) not null,
	PRIMARY KEY (`num_cta`),
	FOREIGN KEY (`cve_admon`) 
		REFERENCES administrador(`cve_admon`)
		ON DELETE CASCADE ON UPDATE CASCADE 
) ENGINE = INNODB;

create table `medico`(
	`cedula_prof`	INT(8) NOT NULL,
	`nom_medico`	VARCHAR(30) NOT NULL,
	`ap_pat_medico`	VARCHAR(20) NOT NULL,
	`ap_mat_medico`	VARCHAR(20) NOT NULL,
	`email_medico`	VARCHAR(30) NOT NULL,
	`calle_medico`	VARCHAR(30) NOT NULL,
	`num_ext_medico`	INT(4) NOT NULL,
	`num_int_medico`	INT(4),
	`colonia_medico`	VARCHAR(30) NOT NULL,
	`delegacion_medico`	VARCHAR(30) NOT NULL,
	`contrasenia_medico`	VARCHAR(10) NOT NULL,
	`consultorio`	INT(3) NOT NULL,
	`cve_admon`	INT(4) NOT NULL,
	`telefono_medico`	INT(10) NOT NULL,
	`especialidad` 	VARCHAR(30) NOT NULL,
	PRIMARY KEY (`cedula_prof`),
	FOREIGN KEY (`cve_admon`) 
		REFERENCES administrador(`cve_admon`)
		ON DELETE CASCADE ON UPDATE CASCADE 


) ENGINE = INNODB;

create table `horario`(
	`id_horario` INT(2),
	`dia` VARCHAR(10),
	`hora` VARCHAR(5),
	`cedula_prof` INT(8),
	PRIMARY KEY (`id_horario`),
	FOREIGN KEY (`cedula_prof`) 
		REFERENCES medico(`cedula_prof`)
		ON DELETE CASCADE ON UPDATE CASCADE

)ENGINE = INNODB;

create table `cita`(
	`num_cta` INT(9) not null,
	`num_cita` INT(4) not null,
	`diagnostico`  VARCHAR(500),
	`padecimiento` VARCHAR(500),
	`tratamiento`VARCHAR(500),
	`fecha_cita` DATE not null,
	`id_horario` INT(2) not null,
		PRIMARY KEY CLUSTERED (`num_cita`,`num_cta`,`id_horario`),
		FOREIGN KEY (`num_cta`) 
			REFERENCES paciente(`num_cta`)
			 ON DELETE CASCADE ON UPDATE CASCADE,
		FOREIGN KEY (`id_horario`) 
			REFERENCES horario(`id_horario`)
			ON DELETE CASCADE ON UPDATE CASCADE 
)ENGINE = INNODB;
