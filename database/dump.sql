create table `utilisateur` (     
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,    
    name VARCHAR(100) UNIQUE,     
    password VARCHAR(256),     
    mail VARCHAR(50) NULL,     
    is_admin BOOLEAN NULL 
); 
