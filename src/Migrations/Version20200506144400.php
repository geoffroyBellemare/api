<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200506144400 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP INDEX FK_8D93D649A024058E_idx, ADD UNIQUE INDEX UNIQ_8D93D649A024058E (image_profile_id)');
        $this->addSql('ALTER TABLE user DROP secondary_id');
        $this->addSql('ALTER TABLE image DROP INDEX FK_C53D045FF675F31B, ADD UNIQUE INDEX UNIQ_C53D045FF675F31B (author_id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE image DROP INDEX UNIQ_C53D045FF675F31B, ADD INDEX FK_C53D045FF675F31B (author_id)');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FF675F31B');
        $this->addSql('ALTER TABLE user DROP INDEX UNIQ_8D93D649A024058E, ADD INDEX FK_8D93D649A024058E_idx (image_profile_id)');
        $this->addSql('ALTER TABLE user ADD secondary_id VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
