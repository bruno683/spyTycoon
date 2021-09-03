<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210903123132 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE missions DROP FOREIGN KEY FK_34F1D47E5585C142');
        $this->addSql('DROP INDEX IDX_34F1D47E5585C142 ON missions');
        $this->addSql('ALTER TABLE missions DROP skill_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE missions ADD skill_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE missions ADD CONSTRAINT FK_34F1D47E5585C142 FOREIGN KEY (skill_id) REFERENCES skills (id)');
        $this->addSql('CREATE INDEX IDX_34F1D47E5585C142 ON missions (skill_id)');
    }
}
