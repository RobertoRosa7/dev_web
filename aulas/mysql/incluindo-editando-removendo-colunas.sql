/* # Manipulação de colunas
 ALTER TABLE
 */

/* # ADD - permite a inclusão de uma nova coluna na tabela
# CHANGE - permite alterar nome de uma coluna e suas propriedades como o tipo de dados
# DROP - permite a remoção da coluna */

/* # Adicionar nova coluna
ALTER TABLE `tb_cursos` ADD COLUMN `carga_horaria` VARCHAR(5) NOT NULL;

# Modificar o tipo de dados
ALTER TABLE `tb_cursos` CHANGE `carga_horaria` `carga_horaria` INT NOT NULL;

# Excluir uma coluna da tabela
ALTER TABLE `tb_cursos` DROP `carga_horaria`;

*/