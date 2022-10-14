create table `utilisateur` (     
    id_utilisateur int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,    
    name VARCHAR(100) UNIQUE,     
    password VARCHAR(256),     
    mail VARCHAR(50) NULL    
   
); 
