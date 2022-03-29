<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220329194918 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, name VARCHAR(128) NOT NULL, created_on DATETIME NOT NULL, start_date DATE NOT NULL, estimated_end_date DATE DEFAULT NULL, UNIQUE INDEX UNIQ_2FB3D0EE9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section (id INT AUTO_INCREMENT NOT NULL, project_id_id INT NOT NULL, position INT NOT NULL, name VARCHAR(128) NOT NULL, added_on DATETIME NOT NULL, UNIQUE INDEX UNIQ_2D737AEF6C1197C9 (project_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, tag_name VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_task (tag_id INT NOT NULL, task_id INT NOT NULL, INDEX IDX_BC716493BAD26311 (tag_id), INDEX IDX_BC7164938DB60186 (task_id), PRIMARY KEY(tag_id, task_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task (id INT AUTO_INCREMENT NOT NULL, section_id_id INT NOT NULL, libelle VARCHAR(128) NOT NULL, date_butoir DATE NOT NULL, url LONGTEXT DEFAULT NULL, note LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_527EDB25E813F933 (section_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(64) NOT NULL, last_name VARCHAR(64) NOT NULL, email VARCHAR(128) NOT NULL, password LONGTEXT NOT NULL, created_on DATETIME NOT NULL, modified_on DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEF6C1197C9 FOREIGN KEY (project_id_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE tag_task ADD CONSTRAINT FK_BC716493BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_task ADD CONSTRAINT FK_BC7164938DB60186 FOREIGN KEY (task_id) REFERENCES task (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25E813F933 FOREIGN KEY (section_id_id) REFERENCES section (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEF6C1197C9');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB25E813F933');
        $this->addSql('ALTER TABLE tag_task DROP FOREIGN KEY FK_BC716493BAD26311');
        $this->addSql('ALTER TABLE tag_task DROP FOREIGN KEY FK_BC7164938DB60186');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE9D86650F');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE section');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE tag_task');
        $this->addSql('DROP TABLE task');
        $this->addSql('DROP TABLE user');
    }
}
