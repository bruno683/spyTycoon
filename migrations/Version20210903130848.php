<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210903130848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agents_skills (agents_id INT NOT NULL, skills_id INT NOT NULL, INDEX IDX_5088E440709770DC (agents_id), INDEX IDX_5088E4407FF61858 (skills_id), PRIMARY KEY(agents_id, skills_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agents_skills ADD CONSTRAINT FK_5088E440709770DC FOREIGN KEY (agents_id) REFERENCES agents (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agents_skills ADD CONSTRAINT FK_5088E4407FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hide_outs ADD missions_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hide_outs ADD CONSTRAINT FK_E0B5F31D17C042CF FOREIGN KEY (missions_id) REFERENCES missions (id)');
        $this->addSql('CREATE INDEX IDX_E0B5F31D17C042CF ON hide_outs (missions_id)');
        $this->addSql('ALTER TABLE missions DROP FOREIGN KEY FK_34F1D47E5585C142');
        $this->addSql('ALTER TABLE missions DROP FOREIGN KEY FK_34F1D47E55B6F7DB');
        $this->addSql('DROP INDEX UNIQ_34F1D47E55B6F7DB ON missions');
        $this->addSql('DROP INDEX UNIQ_34F1D47E5585C142 ON missions');
        $this->addSql('ALTER TABLE missions DROP hide_out_id, DROP skill_id');
        $this->addSql('ALTER TABLE skills DROP FOREIGN KEY FK_D5311670709770DC');
        $this->addSql('DROP INDEX IDX_D5311670709770DC ON skills');
        $this->addSql('ALTER TABLE skills CHANGE agents_id missions_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE skills ADD CONSTRAINT FK_D531167017C042CF FOREIGN KEY (missions_id) REFERENCES missions (id)');
        $this->addSql('CREATE INDEX IDX_D531167017C042CF ON skills (missions_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE agents_skills');
        $this->addSql('ALTER TABLE hide_outs DROP FOREIGN KEY FK_E0B5F31D17C042CF');
        $this->addSql('DROP INDEX IDX_E0B5F31D17C042CF ON hide_outs');
        $this->addSql('ALTER TABLE hide_outs DROP missions_id');
        $this->addSql('ALTER TABLE missions ADD hide_out_id INT DEFAULT NULL, ADD skill_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE missions ADD CONSTRAINT FK_34F1D47E5585C142 FOREIGN KEY (skill_id) REFERENCES skills (id)');
        $this->addSql('ALTER TABLE missions ADD CONSTRAINT FK_34F1D47E55B6F7DB FOREIGN KEY (hide_out_id) REFERENCES hide_outs (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_34F1D47E55B6F7DB ON missions (hide_out_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_34F1D47E5585C142 ON missions (skill_id)');
        $this->addSql('ALTER TABLE skills DROP FOREIGN KEY FK_D531167017C042CF');
        $this->addSql('DROP INDEX IDX_D531167017C042CF ON skills');
        $this->addSql('ALTER TABLE skills CHANGE missions_id agents_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE skills ADD CONSTRAINT FK_D5311670709770DC FOREIGN KEY (agents_id) REFERENCES agents (id)');
        $this->addSql('CREATE INDEX IDX_D5311670709770DC ON skills (agents_id)');
    }
}
