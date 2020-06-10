<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200605004347 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE command_item DROP FOREIGN KEY FK_BEB18B939E45C554');
        $this->addSql('ALTER TABLE command_item CHANGE prestation_id prestation_id INT NOT NULL');
        $this->addSql('ALTER TABLE command_item ADD CONSTRAINT FK_BEB18B939E45C554 FOREIGN KEY (prestation_id) REFERENCES prestation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE shopping_cart_item DROP FOREIGN KEY FK_E59A1DF49E45C554');
        $this->addSql('ALTER TABLE shopping_cart_item CHANGE prestation_id prestation_id INT NOT NULL');
        $this->addSql('ALTER TABLE shopping_cart_item ADD CONSTRAINT FK_E59A1DF49E45C554 FOREIGN KEY (prestation_id) REFERENCES prestation (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE command_item DROP FOREIGN KEY FK_BEB18B939E45C554');
        $this->addSql('ALTER TABLE command_item CHANGE prestation_id prestation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE command_item ADD CONSTRAINT FK_BEB18B939E45C554 FOREIGN KEY (prestation_id) REFERENCES prestation (id)');
        $this->addSql('ALTER TABLE shopping_cart_item DROP FOREIGN KEY FK_E59A1DF49E45C554');
        $this->addSql('ALTER TABLE shopping_cart_item CHANGE prestation_id prestation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE shopping_cart_item ADD CONSTRAINT FK_E59A1DF49E45C554 FOREIGN KEY (prestation_id) REFERENCES prestation (id)');
    }
}
