CREATE TABLE tasks
(task_num INT (11) PRIMARY KEY AUTO_INCREMENT,
task VARCHAR (50),
class VARCHAR(50),
due_date DATE,
descrip VARCHAR(255),
id int,
FOREIGN KEY (id) REFERENCES users(id)
);


-- ALTER TABLE tasks
-- ADD del_taskId INT(11) NOT NULL;


-- ALTER TABLE tasks
-- ADD FOREIGN KEY (id) REFERENCES deleted_tasks(id_deleted);

