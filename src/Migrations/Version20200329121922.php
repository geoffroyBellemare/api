<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200329121922 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE command_item (id INT AUTO_INCREMENT NOT NULL, prestation_id INT DEFAULT NULL, order_id INT NOT NULL, quantity INT NOT NULL, start_time DATETIME NOT NULL, end_time DATETIME NOT NULL, UNIQUE INDEX UNIQ_BEB18B939E45C554 (prestation_id), INDEX IDX_BEB18B938D9F6D38 (order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE command_item ADD CONSTRAINT FK_BEB18B939E45C554 FOREIGN KEY (prestation_id) REFERENCES prestation (id)');
        $this->addSql('ALTER TABLE command_item ADD CONSTRAINT FK_BEB18B938D9F6D38 FOREIGN KEY (order_id) REFERENCES command (id)');
        $this->addSql('ALTER TABLE command ADD customer_id INT NOT NULL, ADD total_price DOUBLE PRECISION DEFAULT \'0\' NOT NULL, ADD created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE name state VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD49395C3F3 FOREIGN KEY (customer_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8ECAEAD49395C3F3 ON command (customer_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE command_item');
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD49395C3F3');
        $this->addSql('DROP INDEX UNIQ_8ECAEAD49395C3F3 ON command');
        $this->addSql('ALTER TABLE command DROP customer_id, DROP total_price, DROP created, CHANGE state name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
