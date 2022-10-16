create table `utilisateur` (     
    id_utilisateur int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,    
    name VARCHAR(100) UNIQUE,     
    password VARCHAR(256),     
    mail VARCHAR(50) NULL    
   
); 
create table `post` (     
    id_post int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,    
    id_utilisateur INT REFERENCES utilisateur (id_utilisateur),
    text text NOT NULL,     
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur)
); 
create table `com` (     
    id_com int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,    
    -- id_utilisateur INT REFERENCES utilisateur (id_utilisateur),
    id_post INT REFERENCES post ( id_post),
    com text ,   
        
    -- FOREIGN KEY (id_utilisateur) REFERENCES utilisateur (id_utilisateur),
    FOREIGN KEY (id_post) REFERENCES post (id_post)

); 
