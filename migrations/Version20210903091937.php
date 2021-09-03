<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210903091937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE missions DROP FOREIGN KEY FK_34F1D47E5585C142');
        $this->addSql('ALTER TABLE missions DROP FOREIGN KEY FK_34F1D47E55B6F7DB');
        $this->addSql('DROP INDEX UNIQ_34F1D47E55B6F7DB ON missions');
        $this->addSql('DROP INDEX UNIQ_34F1D47E5585C142 ON missions');
        $this->addSql('ALTER TABLE missions DROP hide_out_id, DROP skill_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE missions ADD hide_out_id INT DEFAULT NULL, ADD skill_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE missions ADD CONSTRAINT FK_34F1D47E5585C142 FOREIGN KEY (skill_id) REFERENCES skills (id)');
        $this->addSql('ALTER TABLE missions ADD CONSTRAINT FK_34F1D47E55B6F7DB FOREIGN KEY (hide_out_id) REFERENCES hide_outs (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_34F1D47E55B6F7DB ON missions (hide_out_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_34F1D47E5585C142 ON missions (skill_id)');
    }
}
