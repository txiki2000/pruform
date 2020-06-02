<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200531215401 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tablahij DROP FOREIGN KEY tablahij_ibfk_1');
        $this->addSql('ALTER TABLE tablahij CHANGE idMae idMae INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE tablahij ADD CONSTRAINT FK_A5016119DF3853D7 FOREIGN KEY (idMae) REFERENCES tablamae (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tablahij DROP FOREIGN KEY FK_A5016119DF3853D7');
        $this->addSql('ALTER TABLE tablahij CHANGE idMae idMae INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE tablahij ADD CONSTRAINT tablahij_ibfk_1 FOREIGN KEY (idMae) REFERENCES tablamae (id) ON DELETE CASCADE');
    }
}
