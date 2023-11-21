<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231117143156 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe ADD teacher_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF9641807E1D FOREIGN KEY (teacher_id) REFERENCES teacher (id)');
        $this->addSql('CREATE INDEX IDX_8F87BF9641807E1D ON classe (teacher_id)');
        $this->addSql('ALTER TABLE student ADD classe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF338F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B723AF338F5EA509 ON student (classe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY FK_8F87BF9641807E1D');
        $this->addSql('DROP INDEX IDX_8F87BF9641807E1D ON classe');
        $this->addSql('ALTER TABLE classe DROP teacher_id');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF338F5EA509');
        $this->addSql('DROP INDEX UNIQ_B723AF338F5EA509 ON student');
        $this->addSql('ALTER TABLE student DROP classe_id');
    }
}
