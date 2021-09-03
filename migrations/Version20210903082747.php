<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210903082747 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agents (id INT AUTO_INCREMENT NOT NULL, missions_id INT DEFAULT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, birth_date DATETIME NOT NULL, name_code VARCHAR(255) NOT NULL, nationality VARCHAR(255) NOT NULL, INDEX IDX_9596AB6E17C042CF (missions_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contacts (id INT AUTO_INCREMENT NOT NULL, missions_id INT DEFAULT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, birth_date DATETIME NOT NULL, code_name VARCHAR(255) NOT NULL, nationality VARCHAR(255) NOT NULL, INDEX IDX_3340157317C042CF (missions_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hide_outs (id INT AUTO_INCREMENT NOT NULL, code INT NOT NULL, adress VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE missions (id INT AUTO_INCREMENT NOT NULL, hide_out_id INT DEFAULT NULL, skill_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, code_name VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, type VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, UNIQUE INDEX UNIQ_34F1D47E55B6F7DB (hide_out_id), UNIQUE INDEX UNIQ_34F1D47E5585C142 (skill_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, agents_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_D5311670709770DC (agents_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE targets (id INT AUTO_INCREMENT NOT NULL, missions_id INT DEFAULT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, birth_date DATETIME NOT NULL, code_name VARCHAR(255) NOT NULL, nationality VARCHAR(255) NOT NULL, INDEX IDX_AF431E1317C042CF (missions_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agents ADD CONSTRAINT FK_9596AB6E17C042CF FOREIGN KEY (missions_id) REFERENCES missions (id)');
        $this->addSql('ALTER TABLE contacts ADD CONSTRAINT FK_3340157317C042CF FOREIGN KEY (missions_id) REFERENCES missions (id)');
        $this->addSql('ALTER TABLE missions ADD CONSTRAINT FK_34F1D47E55B6F7DB FOREIGN KEY (hide_out_id) REFERENCES hide_outs (id)');
        $this->addSql('ALTER TABLE missions ADD CONSTRAINT FK_34F1D47E5585C142 FOREIGN KEY (skill_id) REFERENCES skills (id)');
        $this->addSql('ALTER TABLE skills ADD CONSTRAINT FK_D5311670709770DC FOREIGN KEY (agents_id) REFERENCES agents (id)');
        $this->addSql('ALTER TABLE targets ADD CONSTRAINT FK_AF431E1317C042CF FOREIGN KEY (missions_id) REFERENCES missions (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skills DROP FOREIGN KEY FK_D5311670709770DC');
        $this->addSql('ALTER TABLE missions DROP FOREIGN KEY FK_34F1D47E55B6F7DB');
        $this->addSql('ALTER TABLE agents DROP FOREIGN KEY FK_9596AB6E17C042CF');
        $this->addSql('ALTER TABLE contacts DROP FOREIGN KEY FK_3340157317C042CF');
        $this->addSql('ALTER TABLE targets DROP FOREIGN KEY FK_AF431E1317C042CF');
        $this->addSql('ALTER TABLE missions DROP FOREIGN KEY FK_34F1D47E5585C142');
        $this->addSql('DROP TABLE agents');
        $this->addSql('DROP TABLE contacts');
        $this->addSql('DROP TABLE hide_outs');
        $this->addSql('DROP TABLE missions');
        $this->addSql('DROP TABLE skills');
        $this->addSql('DROP TABLE targets');
    }
}
