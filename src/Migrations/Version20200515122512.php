<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200515122512 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE shopping_cart ADD executing_command_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE shopping_cart ADD CONSTRAINT FK_72AAD4F6C11C79CF FOREIGN KEY (executing_command_id) REFERENCES command (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_72AAD4F6C11C79CF ON shopping_cart (executing_command_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE shopping_cart DROP FOREIGN KEY FK_72AAD4F6C11C79CF');
        $this->addSql('DROP INDEX IDX_72AAD4F6C11C79CF ON shopping_cart');
        $this->addSql('ALTER TABLE shopping_cart DROP executing_command_id');
    }
}
