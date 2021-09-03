<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210903113255 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hide_outs ADD missions_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hide_outs ADD CONSTRAINT FK_E0B5F31D17C042CF FOREIGN KEY (missions_id) REFERENCES missions (id)');
        $this->addSql('CREATE INDEX IDX_E0B5F31D17C042CF ON hide_outs (missions_id)');
        $this->addSql('ALTER TABLE missions ADD skill_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE missions ADD CONSTRAINT FK_34F1D47E5585C142 FOREIGN KEY (skill_id) REFERENCES skills (id)');
        $this->addSql('CREATE INDEX IDX_34F1D47E5585C142 ON missions (skill_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hide_outs DROP FOREIGN KEY FK_E0B5F31D17C042CF');
        $this->addSql('DROP INDEX IDX_E0B5F31D17C042CF ON hide_outs');
        $this->addSql('ALTER TABLE hide_outs DROP missions_id');
        $this->addSql('ALTER TABLE missions DROP FOREIGN KEY FK_34F1D47E5585C142');
        $this->addSql('DROP INDEX IDX_34F1D47E5585C142 ON missions');
        $this->addSql('ALTER TABLE missions DROP skill_id');
    }
}
