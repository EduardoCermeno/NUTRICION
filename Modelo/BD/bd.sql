
CREATE TABLE `tb_usuarios` (
 `Id_usuario` INT (11)   NOT NULL  AUTO_INCREMENT,
 `Nombre` VARCHAR(50) NOT NULL,
 `Apellido_Usuario` VARCHAR(50) NOT NULL,
 `FechaNacimiento_Usuario` Date NOT NULL,
 `Nombre_Usuario` VARCHAR (50) NOT NULL,
 `Clave_Usuario` TEXT NOT NULL,
 `Rol_Usuario` VARCHAR (25) NOT NULL,
 PRIMARY KEY ( `Id_usuario`)
     );
     
 
CREATE TABLE `Tb_Paciente`(
`Id_Paciente` INT (11) NOT NULL AUTO_INCREMENT,
`Id_usuario`INT(11) NOT NULL,
`Nombre_Paciente` VARCHAR(50) NOT NULL,
`Apellido_Paciente` VARCHAR(50) NOT NULL,
`FechaNacimiento_Paciente` DATE NOT NULL,
`Género_Paciente` VARCHAR (25) NOT NULL,
`Etnia_Paciente` VARCHAR (25) NOT NULL,
PRIMARY KEY (`Id_Paciente` ),
CONSTRAINT  `fk_PacienteUsuarios`FOREIGN KEY (`Id_usuario`) REFERENCES `tb_usuarios`(`Id_usuario`)

);





CREATE TABLE `Tb_PadresPaciente`(
`Id_PadresPaciente`INT (11) NOT NULL AUTO_INCREMENT,
`Id_Paciente` INT (11) ,
`NombredelPadre` VARCHAR(50) NOT NULL,
`ApellidoPadre` VARCHAR(50) NOT NULL,
`NombredeMadre` VARCHAR(50) NOT NULL,
`ApellidoMadre` VARCHAR(50) NOT NULL,
`Direccion` TEXT NOT NULL,
PRIMARY KEY (Id_PadresPaciente),
CONSTRAINT `fk_PadresPacientePaciente`FOREIGN KEY (`Id_Paciente`) REFERENCES `Tb_Paciente`(`Id_Paciente`)

) ;  

CREATE TABLE `Tb_Antropometia`(
`Id_Antropometria` INT (11) NOT NULL AUTO_INCREMENT, 
`Id_Paciente` INT (11) NOT NULL,
`Altura` VARCHAR (25) NOT NULL,
`Peso` VARCHAR (25) NOT NULL,
`Edad` varchar (25) NOT NULL,
`Sexo` varchar (25) NOT NULL,
`Peso Ideal` varchar (25) NOT NULL,
`PorcentajePI` varchar (25) NOT NULL,
`IMC` varchar (25) NOT NULL,
`MCM` varchar (25) NOT NULL,
`ASC` varchar (25) NOT NULL,
`ACM` varchar (25) NOT NULL,
`EstadoNutricional` varchar (50) NOT NULL,
PRIMARY KEY (`Id_Antropometria`),
CONSTRAINT `fk_AntropometiaPaciente`FOREIGN KEY (`Id_Paciente`) REFERENCES `Tb_Paciente`(`Id_Pacientea`)
);


CREATE TABLE `Tb_FechaCita`(
`Id_FechaCita` int (11) NOT NULL,
`FechaCita`DATETIME NOT NULL,
`StatusCita` VARCHAR (25) NOT NULL,
PRIMARY KEY (`Id_FechaCita`)
);
    

CREATE TABLE `Tb_Citas`(
`Id_Citas`INT (11) NOT NULL, 
`Id_FechaCita` int (11),
`Id_Paciente` INT (11),
`Fecha Citas` int (11),
`Nombre` VARCHAR(50) NOT NULL,
`Direccion` VARCHAR(50) NOT NULL, 
`Area` VARCHAR(50) NOT NULL,
PRIMARY KEY ( `Id_Citas`),
CONSTRAINT fk_CitasFechaCita  FOREIGN KEY (`Id_FechaCita`) REFERENCES  `Tb_FechaCita`(`Id_FechaCita`),
CONSTRAINT fk_CitasPaciente  FOREIGN KEY (`Id_Paciente`) REFERENCES  `Tb_Paciente`(`Id_Paciente`)


);
