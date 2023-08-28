ALTER TABLE phpmyadmin.filmes ADD CONSTRAINT filmes_FK FOREIGN KEY (categoria_id) REFERENCES phpmyadmin.categorias(id);


