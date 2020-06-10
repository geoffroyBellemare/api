<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200329123935 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE command_item DROP FOREIGN KEY FK_BEB18B938D9F6D38');
        $this->addSql('DROP INDEX IDX_BEB18B938D9F6D38 ON command_item');
        $this->addSql('ALTER TABLE command_item CHANGE order_id command_id INT NOT NULL');
        $this->addSql('ALTER TABLE command_item ADD CONSTRAINT FK_BEB18B9333E1689A FOREIGN KEY (command_id) REFERENCES command (id)');
        $this->addSql('CREATE INDEX IDX_BEB18B9333E1689A ON command_item (command_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE command_item DROP FOREIGN KEY FK_BEB18B9333E1689A');
        $this->addSql('DROP INDEX IDX_BEB18B9333E1689A ON command_item');
        $this->addSql('ALTER TABLE command_item CHANGE command_id order_id INT NOT NULL');
        $this->addSql('ALTER TABLE command_item ADD CONSTRAINT FK_BEB18B938D9F6D38 FOREIGN KEY (order_id) REFERENCES command (id)');
        $this->addSql('CREATE INDEX IDX_BEB18B938D9F6D38 ON command_item (order_id)');
    }
}
