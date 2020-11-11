CREATE TABLE tasks
(id INT (11) PRIMARY KEY AUTO_INCREMENT,
task VARCHAR (50),
class VARCHAR(50),
due_date DATE,
 descrip VARCHAR(255)
);


ALTER TABLE tasks
ADD del_taskId INT(11) NOT NULL;


ALTER TABLE tasks
ADD FOREIGN KEY (id) REFERENCES deleted_tasks(id_deleted);

